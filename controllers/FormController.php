<?php
    namespace App\Controllers;

    class FormController extends \App\Core\Controller {
        public function generateRandomString(int $length): string {
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";

            $size = strlen( $chars );
            $str = '';
            for($i = 0; $i < $length; $i++) {
                $str .= $chars[ rand( 0, $size - 1 ) ];
            }

            return $str;
        }

        public function getForm() { }

        public function postForm() {
            $questions = filter_input(INPUT_POST, 'questionTitle', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $answers = filter_input(INPUT_POST, 'answers', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

            $surveyName = filter_input(INPUT_POST, 'survey-name', FILTER_SANITIZE_STRING);
            $expiresAt = filter_input(INPUT_POST, 'expires-at', FILTER_SANITIZE_STRING);

            $formModel = new \App\Models\FormModel($this->getDatabaseConnection());
            $formId = $formModel->addForm([
                "name" => $surveyName,
                "user-id" => $_SESSION["userId"],
                "share-string" => $this->generateRandomString(32),
                "expires-at" => $expiresAt
            ]);

            $questionIds = [];
            for ($i=0; $i<count($questions); $i++) {
                $questionTitle = $questions[$i];

                $questionType = filter_input(INPUT_POST, 'question-type-' . strval($i+1), FILTER_SANITIZE_STRING);

                $questionModel = new \App\Models\QuestionModel($this->getDatabaseConnection());
                $questionIds[] = $questionModel->addQuestion([
                    "title" => $questionTitle,
                    "type" => $questionType,
                    "form-id" => $formId
                ]);
            }

            $counter = 0;
            for ($i=1; $i<=count($answers); $i++) {

                for ($j=0; $j<count($answers[$i]); $j++) {
                    if (isset($questionIds[$counter])) {
                        $answerModel = new \App\Models\AnswerModel($this->getDatabaseConnection());

                        $addedAnswerId = $answerModel->addAnswer([
                            "answer" => $answers[$i][$j],
                            "question-id" => $questionIds[$counter]
                        ]);
                    }
                }

                $counter++;
            }

            if (isset($formId)) {
                $this->set('message', 'Anketa uspešno napravljena.');
            }

        }

        public function showForms() {
            $formModel = new \App\Models\FormModel($this->getDatabaseConnection());
            $forms = $formModel->getFormsByUserId($_SESSION["userId"]);

            $this->set('surveys', $forms);
        }

        public function showFormData(int $formId) {
            $formModel = new \App\Models\FormModel($this->getDatabaseConnection());
            $form = $formModel->getFormById($formId);

            # show all answers for this form and their statistics
            $questionModel = new \App\Models\QuestionModel($this->getDatabaseConnection());
            $questions = $questionModel->getQuestionsByFormId($form->form_id);

            $answerModel = new \App\Models\AnswerModel($this->getDatabaseConnection());
            $answers = [];
            foreach ($questions as $question) {
                $answers[] = $answerModel->getAnswersByQuestionId($question->question_id);
            }

            $responseModel = new \App\Models\ResponseModel($this->getDatabaseConnection());

            $matchers = [];
            for ($i = 0; $i < count($answers); $i++) {
                for ($j = 0; $j < count($answers[$i]); $j++) {
                    $answersNumber = $responseModel->getAnswersNumber($answers[$i][$j]->answer_id);
                    $matchers[] = [
                        "answer-id" => $answers[$i][$j]->answer_id,
                        "times-selected" => $answersNumber->answers_number
                    ];
                }
            }

            # filter matching array in a new one where will be stored percentage of answers coverage

            for ($i = 0; $i < count($answers); $i++) {
                for ($j = 0; $j < count($answers[$i]); $j++) {
                    for ($k = 0; $k < count($matchers); $k++) {
                        if ($answers[$i][$j]->answer_id === $matchers[$k]["answer-id"]) {
                            $answers[$i][$j]->times_selected = $matchers[$k]["times-selected"];
                        } else {
                            $answers[$i][$j]->times_selected = "0";
                        }
                    }
                }
            }

            $this->set('questions', $questions);
            $this->set('answers', $answers);
            $this->set('survey', $form);
        }

        public function getSharedForm(string $formShareString) {
            $formModel = new \App\Models\FormModel($this->getDatabaseConnection());
            $form = $formModel->getFormByShareString($formShareString);

            $questionModel = new \App\Models\QuestionModel($this->getDatabaseConnection());
            $questions = $questionModel->getQuestionsByFormId($form->form_id);

            $answers = [];
            $answerModel = new \App\Models\AnswerModel($this->getDatabaseConnection());
            foreach ($questions as $question) {
                $answers[] = $answerModel->getAnswersByQuestionId($question->question_id);
            }

            $this->set('shareString', $formShareString);
            $this->set('surveyName', $form->name);
            $this->set('questions', $questions);
            $this->set('answers', $answers);

        }

        public function response(string $formShareString) {
            $formModel = new \App\Models\FormModel($this->getDatabaseConnection());
            $form = $formModel->getFormByShareString($formShareString);

            $questionModel = new \App\Models\QuestionModel($this->getDatabaseConnection());
            $questions = $questionModel->getQuestionsByFormId($form->form_id);

            $responseModel = new \App\Models\ResponseModel($this->getDatabaseConnection());
            for ($i=0; $i<count($questions); $i++) {

                if ($questions[$i]->type === 'radio') {
                    $responseId = $responseModel->addResponse([
                        "question-id" => $questions[$i]->question_id,
                        "answer-id" => filter_input(INPUT_POST, 'answer-' . $questions[$i]->question_id, FILTER_SANITIZE_STRING),
                        "form-id" => $form->form_id
                    ]);
                } elseif ($questions[$i]->type === 'checkbox') {
                    $answerIds = filter_input(INPUT_POST, 'answer', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
                    foreach ($answerIds as $answerId) {
                        $responseId = $responseModel->addResponse([
                            "question-id" => $questions[$i]->question_id,
                            "answer-id" => $answerId,
                            "form-id" => $form->form_id
                        ]);
                    }
                } else {
                    # handle text input
                    $answerValue = filter_input(INPUT_POST, 'answer-' . $questions[$i]->question_id . '-text', FILTER_SANITIZE_STRING);
                    $answerId = filter_input(INPUT_POST, 'answer-' . $questions[$i]->question_id, FILTER_SANITIZE_STRING);
                    # ANSWER ID = answer-{{ questions[i].question_id }}
                    # ANSWER VALUE = answer-{{ questions[i].question_id }}-text

                    $responseId = $responseModel->addResponseWithFieldValue([
                        "question-id" => $questions[$i]->question_id,
                        "answer-id" => $answerId,
                        "form-id" => $form->form_id,
                        "answer-value" => $answerValue
                    ]);
                }

            }

            $responseCountModel = new \App\Models\ResponseCountModel($this->getDatabaseConnection());
            $totalCounts = $responseCountModel->getResponseCountsByFormId($form->form_id);

            if ($totalCounts !== -1 && $totalCounts->total_responses !== "0") {
                $responseCountModel->updateCounter([
                    "form-id" => $form->form_id
                ]);
            } else {
                $responseCountId = $responseCountModel->insertCounter([
                    "counter" => 1,
                    "form-id" => $form->form_id
                ]);
            }



        }

    }
