<?php
namespace App\Models;

    class AnswerModel {
        private $dbc;

        public function __construct(\App\Core\DatabaseConnection $dbc) {
            $this->dbc = $dbc;
        }

        public function getAnswersByQuestionId(int $questionId) {
            $sql = 'SELECT * FROM `survey`.`answer` WHERE `answer`.`question_id` = ?;';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute([ $questionId ]);
            $answers = [];

            if ($result) {
                $answers = $prep->fetchAll(\PDO::FETCH_OBJ);
            }

            return $answers;
        }

        public function addAnswer(array $fieldsValues) {
            $sql = "INSERT INTO `survey`.`answer`(answer, question_id) VALUES(?, ?)";
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = false;
            $result = $prep->execute([ $fieldsValues["answer"], $fieldsValues["question-id"] ]);

            if (!$result) {
                return false;
            }

            return $this->dbc->getConnection()->lastInsertId();
        }

    }
