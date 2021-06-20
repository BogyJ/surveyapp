<?php
    namespace App\Models;

    class ResponseModel {
        private $dbc;

        public function __construct(\App\Core\DatabaseConnection $dbc) {
            $this->dbc = $dbc;
        }

        public function addResponse(array $fieldValues) {
            $sql = 'INSERT INTO `survey`.`response` (`question_id`, `answer_id`, `form_id`) VALUES (?, ?, ?)';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = false;
            $result = $prep->execute([ $fieldValues["question-id"], $fieldValues["answer-id"], $fieldValues["form-id"] ]);

            if (!$result) {
                return false;
            }

            return $this->dbc->getConnection()->lastInsertId();
        }

        public function addResponseWithFieldValue(array $fieldValues) {
            $sql = 'INSERT INTO `survey`.`response` (`question_id`, `answer_id`, `form_id`, `answer_value`) VALUES (?, ?, ?, ?)';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = false;
            $result = $prep->execute([ $fieldValues["question-id"], $fieldValues["answer-id"], $fieldValues["form-id"], $fieldValues["answer-value"] ]);

            if (!$result) {
                return false;
            }

            return $this->dbc->getConnection()->lastInsertId();
        }

        public function getResponsesByFormId(int $formId) {
            $sql = "SELECT * FROM `survey`.`response` WHERE `response`.`form_id` = ?;";
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute([ $formId ]);
            $responses = [];

            if ($result) {
                $responses = $prep->fetchAll(\PDO::FETCH_OBJ);
            }

            return $responses;
        }

        public function getAnswersNumber(int $answerId) {
            $sql = "SELECT COUNT(`response`.`answer_id`) AS answers_number FROM `survey`.`response` WHERE `response`.`answer_id` = ?;";
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute([ $answerId ]);
            $answersNumber = -1;

            if ($result) {
                $answersNumber = $prep->fetch(\PDO::FETCH_OBJ);
            }

            return $answersNumber;
        }

        public function getAnswerValueByQuestionId(int $questionId) {
            $sql = "SELECT `response`.`answer_value` FROM `survey`.`response` WHERE `response`.`answer_value` IS NOT NULL AND `response`.`question_id` = ?;";
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute([ $questionId ]);
            $answerValue = null;

            if ($result) {
                $answerValue = $prep->fetch(\PDO::FETCH_OBJ);
            }

            return $answerValue;
        }

    }
