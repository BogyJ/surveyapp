<?php
    namespace App\Models;

    class QuestionModel {
        private $dbc;

        public function __construct(\App\Core\DatabaseConnection $dbc) {
            $this->dbc = $dbc;
        }

        public function getAllQuestions(): array {
            $sql = 'SELECT * FROM surveyapp.question;';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute();
            $questions = [];

            if ($result) {
                $questions = $prep->fetchAll(\PDO::FETCH_OBJ);
            }

            return $questions;
        }

        public function getQuestionById(int $questionId) {
            $sql = 'SELECT * FROM surveyapp.question WHERE question.question_id = ?;';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute([ $questionId ]);
            $question = NULL;

            if ($result) {
                $question = $prep->fetch(\PDO::FETCH_OBJ);
            }

            return $question;
        }

        public function addQuestion(array $fieldsValues) {
            $sql = "INSERT INTO `survey`.`question`(title, type) VALUES(?, ?)";
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = false;
            $result = $prep->execute([ $fieldsValues["title"], $fieldsValues["type"] ]);

            if (!$result) {
                return false;
            }

            return $this->dbc->getConnection()->lastInsertId();
        }

    }
