<?php
    namespace App\Models;

    class FormModel {
        private $dbc;

        public function __construct(\App\Core\DatabaseConnection $dbc) {
            $this->dbc = $dbc;
        }

        public function getFormById(int $formId) {
            $sql = 'SELECT * FROM `survey`.`form` WHERE `form`.`form_id` = ?;';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute([ $formId ]);
            $form = NULL;

            if ($result) {
                $form = $prep->fetch(\PDO::FETCH_OBJ);
            }

            return $form;
        }

        public function getFormsByUserId(int $userId) {
            $sql = 'SELECT * FROM `survey`.`form` WHERE `form`.`user_id` = ?;';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute([ $userId ]);
            $forms = [];

            if ($result) {
                $forms = $prep->fetchAll(\PDO::FETCH_OBJ);
            }

            return $forms;
        }

        public function getFormByShareString(string $shareString) {
            $sql = 'SELECT * FROM `survey`.`form` WHERE `form`.`share_string` = ?;';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute([ $shareString ]);
            $form = null;

            if ($result) {
                $form = $prep->fetch(\PDO::FETCH_OBJ);
            }

            return $form;
        }

        public function addForm(array $fieldValues) {
            $sql = 'INSERT INTO `survey`.`form` (`name`, user_id, share_string, expires_at) VALUES (?, ?, ?, ?)';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute([ $fieldValues["name"], $fieldValues["user-id"], $fieldValues["share-string"], $fieldValues["expires-at"] ]);

            if (!$result) {
                return false;
            }

            return $this->dbc->getConnection()->lastInsertId();
        }

        private function deleteResponseCountFromResponseCountTableByFormId(int $formId) {
            $sql = 'DELETE FROM `survey`.`response_count` WHERE `response_count`.`form_id` = ?';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute([ $formId ]);

            if (!$result) {
                return false;
            }

            return true;
        }

        private function deleteResponseFromResponseTableByFormId(int $formId) {
            $sql = 'DELETE FROM `survey`.`response` WHERE `response`.`form_id` = ?';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute([ $formId ]);

            if (!$result) {
                return false;
            }

            return true;
        }

        private function deleteAnswerFromAnswerTableByQuestionId(int $questionId) {
            $sql = 'DELETE FROM `survey`.`answer` WHERE `answer`.`question_id` = ?';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute([ $questionId ]);

            if (!$result) {
                return false;
            }

            return true;
        }

        private function deleteQuestionFromQuestionTableByFormId(int $formId) {
            $sql = 'DELETE FROM `survey`.`question` WHERE `question`.`form_id` = ?';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute([ $formId ]);

            if (!$result) {
                return false;
            }

            return true;
        }

        public function deleteForm(int $formId, $questions) {
            $this->deleteResponseCountFromResponseCountTableByFormId($formId);
            $this->deleteResponseFromResponseTableByFormId($formId);
            foreach ($questions as $question) {
                $this->deleteAnswerFromAnswerTableByQuestionId(intval($question->question_id));
            }
            $this->deleteQuestionFromQuestionTableByFormId($formId);

            $sql = 'DELETE FROM `survey`.`form` WHERE `form`.`form_id` = ?';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute([ $formId ]);

            if (!$result) {
                return false;
            }

            return true;
        }

    }
