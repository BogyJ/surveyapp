<?php
    namespace App\Models;

    class QuestionModel {
        private $dbc;

        public function __construct(\App\Core\DatabaseConnection $dbc) {
            $this->dbc = $dbc;
        }

        public function getQuestionById(int $questionId) {
            $sql = 'SELECT * FROM survey.question WHERE question.question_id = ?;';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute([ $questionId ]);
            $question = NULL;

            if ($result) {
                $question = $prep->fetch(\PDO::FETCH_OBJ);
            }

            return $question;
        }

        public function getQuestionsByFormId(int $formId) {
            $sql = 'SELECT * FROM `survey`.`question` WHERE `question`.`form_id` = ?;';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute([ $formId ]);
            $questions = [];

            if ($result) {
                $questions = $prep->fetchAll(\PDO::FETCH_OBJ);
            }

            return $questions;
        }

        public function addQuestion(array $fieldsValues) {
            $sql = "INSERT INTO `survey`.`question`(title, `type`, form_id) VALUES(?, ?, ?)";
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = false;
            $result = $prep->execute([ $fieldsValues["title"], $fieldsValues["type"], $fieldsValues["form-id"] ]);

            if (!$result) {
                return false;
            }

            return $this->dbc->getConnection()->lastInsertId();
        }

    }
