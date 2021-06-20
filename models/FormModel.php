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
            $result = false;
            $result = $prep->execute([ $fieldValues["name"], $fieldValues["user-id"], $fieldValues["share-string"], $fieldValues["expires-at"] ]);

            if (!$result) {
                return false;
            }

            return $this->dbc->getConnection()->lastInsertId();
        }

    }
