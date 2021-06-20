<?php
    namespace App\Models;

    class FormModel {
        private $dbc;

        public function __construct(\App\Core\DatabaseConnection $dbc) {
            $this->dbc = $dbc;
        }

        public function getAllForms(): array {
            $sql = 'SELECT * FROM survey.form;';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute();
            $forms = [];

            if ($result) {
                $forms = $prep->fetchAll(\PDO::FETCH_OBJ);
            }

            return $forms;
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



    }
