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
                if (isset($_FILES)) {
                    if ($_FILES["file-upload"]["size"] > 5000000) { // > 5MB
                        $this->set("uploadMessage", "Fajl je preveliki");
                    } else {
                        $fileTmpName = $_FILES["file-upload"]["tmp_name"];
                        $fileName = $_FILES["file-upload"]["name"];
                        $fileArray = explode(".", $fileName);
                        $fileExtension = strtolower(end($fileArray));
                        $newFileName = strval($formId) . "-" . "uploadedimage" . "." . $fileExtension;
                        $fileDestination = "uploads/" . $newFileName;
                        # $fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        # $allowed = [".jpg", ".png", ".jpeg"];

                        # ADD CODE BELOW TO PROTECT APPLICATION FROM REMOTE FILE INCLUSION
                        # if (in_array($fileExtension, $allowed)) { }

                        # MOVE THIS IF STATEMENT INSIDE THE ABOVE IF STATEMENT
                        if (move_uploaded_file($fileTmpName, $fileDestination)) {
                            $this->set("uploadMessage", "Fajl je uploadovan");
                        } else {
                            $this->set("uploadMessage", "");
                        }
                    }

                }
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

            $questionModel = new \App\Models\QuestionModel($this->getDatabaseConnection());


            if (!isset($form->form_id)) {
                $this->set("message", "Anketa ne postoji.");
                return;
            }

            $timestamp = strtotime($form->expires_at);
            if (date("m-d-Y") > date("m-d-Y", $timestamp)) {
                $questions = $questionModel->getQuestionsByFormId($form->form_id);
                $formModel->deleteForm($formId, $questions);
                $this->set("message", "Anketa je istekla.");
                return;
            }

            # show all answers for this form and their statistics

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

            $responseCountModel = new \App\Models\ResponseCountModel($this->getDatabaseConnection());
            if (isset($responseCountModel->getResponseCountsByFormId($formId)->total_responses)) {
                $totalResponses = intval($responseCountModel->getResponseCountsByFormId($formId)->total_responses);
            }

            for ($i = 0; $i < count($answers); $i++) {
                for ($j = 0; $j < count($answers[$i]); $j++) {
                    for ($k = 0; $k < count($matchers); $k++) {
                        if (isset($totalResponses) && $answers[$i][$j]->answer_id === $matchers[$k]["answer-id"] && intval($matchers[$k]["times-selected"]) > 0 && $totalResponses > 0) {
                            # $result = (intval($matchers[$k]["times-selected"]) + 100) / $totalResponses;
                            $result = 100 / $totalResponses;
                            $answers[$i][$j]->percentage = number_format(floatval($result) ,0);
                        }

                        $currentQuestion = $questionModel->getQuestionById($answers[$i][$j]->question_id);
                        $answers[$i][$j]->question = $currentQuestion->title;
                        $answers[$i][$j]->question_type = $currentQuestion->type;

                        if ($currentQuestion->type === "text") {
                            $answers[$i][$j]->answer_value = $responseModel->getAnswerValueByQuestionId($currentQuestion->question_id)->answer_value;
                        }
                    }
                }
            }

            if (isset($totalResponses)) {
                $this->set('totalResponses', $totalResponses);
            }

            $this->set('answers', $answers);
            $this->set('survey', $form);
        }

        public function getSharedForm(string $formShareString) {
            $formModel = new \App\Models\FormModel($this->getDatabaseConnection());
            $questionModel = new \App\Models\QuestionModel($this->getDatabaseConnection());
            $form = $formModel->getFormByShareString($formShareString);

            $timestamp = strtotime($form->expires_at);
            if (date("m-d-Y") > date("m-d-Y", $timestamp)) {
                $questions = $questionModel->getQuestionsByFormId($form->form_id);
                $formModel->deleteForm($form->form_id, $questions);
                $this->set("message", "Anketa je istekla.");
                return;
            }

            if (!isset($formModel->getFormByShareString($formShareString)->form_id)) {
                $this->set("message", "Anketa ne postoji.");
                return;
            }
            $form = $formModel->getFormByShareString($formShareString);

            $questionModel = new \App\Models\QuestionModel($this->getDatabaseConnection());
            $questions = $questionModel->getQuestionsByFormId($form->form_id);

            $answers = [];
            $answerModel = new \App\Models\AnswerModel($this->getDatabaseConnection());
            foreach ($questions as $question) {
                $answers[] = $answerModel->getAnswersByQuestionId($question->question_id);
            }

            # read dir /uploads
            $files = [];
            if ($handle = opendir("uploads/")) {
                while (false !== ($file = readdir($handle))) {
                    if ($file != "." && $file != "..") {
                        $files[] = $file;
                    }
                }
                closedir($handle);
            }

            foreach ($files as $file) {
                if (preg_match("/^({$form->form_id}-)/", $file)) {
                    $image = $file;
                }
            }

            if(isset($image)) {
                $this->set('image', $image);
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
            for ($i = 0; $i < count($questions); $i++) {

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
                    # ANSWER ID = answer-{{ questions[i].question_id }}
                    # ANSWER VALUE = answer-{{ questions[i].question_id }}-text

                    $answerValue = filter_input(INPUT_POST, 'answer-' . $questions[$i]->question_id . '-text', FILTER_SANITIZE_STRING);
                    $answerId = filter_input(INPUT_POST, 'answer-' . $questions[$i]->question_id, FILTER_SANITIZE_STRING);
                    # var_dump($answerValue);

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

            if (isset($totalCounts->total_responses) && $totalCounts !== -1 && $totalCounts->total_responses !== "0") {
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

        public function deleteForm(int $formId) {
            $formModel = new \App\Models\FormModel($this->getDatabaseConnection());

            $questionModel = new \App\Models\QuestionModel($this->getDatabaseConnection());
            $questionIds = $questionModel->getQuestionsByFormId($formId);

            $result = $formModel->deleteForm($formId, $questionIds);

            $message = "Anketa nije izbrisana!";
            if ($result) {
                $message = "Anketa izbrisana!";
            }

            $this->set("message", $message);
        }

    }
