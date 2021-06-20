<?php
    namespace App\Controllers;

    class QuestionController extends \App\Core\Role\UserRoleController {
        public function showQuestionForm() {
            $formModel = new \App\Models\FormModel($this->getDatabaseConnection());
        }

        public function createQuestion() {
//            $questionTitle = filter_input(INPUT_POST, 'question-title', FILTER_SANITIZE_STRING);
//            $questionType = filter_input(INPUT_POST, 'question-type', FILTER_SANITIZE_STRING);
//            $answers = filter_input(INPUT_POST, 'answers', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
//
//            $questionModel = new \App\Models\QuestionModel($this->getDatabaseConnection());
//            $questionId = $questionModel->addQuestion([
//                "title" => $questionTitle,
//                "type" => $questionType
//            ]);
//
//            $answerModel = new \App\Models\AnswerModel($this->getDatabaseConnection());
//            foreach ($answers as $answer) {
//                $answerId = $answerModel->addAnswer([
//                    "answer" => $answer,
//                    "question-id" => $questionId
//                ]);
//            }

            $this->set('message', 'Pitanje je evidentirano.');
        }

    }
