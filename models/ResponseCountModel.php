<?php
namespace App\Models;

class ResponseCountModel {
    private $dbc;

    public function __construct(\App\Core\DatabaseConnection $dbc) {
        $this->dbc = $dbc;
    }

    public function getResponseCountsByFormId(int $formId) {
        $sql = "SELECT `response_count`.`counter` AS total_responses FROM `survey`.`response_count` WHERE `response_count`.`form_id` = ?;";
        $prep = $this->dbc->getConnection()->prepare($sql);
        $result = $prep->execute([ $formId ]);
        $totalResponsesByFormId = -1;

        if ($result) {
            $totalResponsesByFormId = $prep->fetch(\PDO::FETCH_OBJ);
        }

        return $totalResponsesByFormId;
    }

    public function updateCounter(array $fieldValues) {
        $sql = 'UPDATE `survey`.`response_count` SET `response_count`.`counter` = `response_count`.`counter` + 1 WHERE `response_count`.`form_id` = ?';
        $prep = $this->dbc->getConnection()->prepare($sql);
        $result = false;
        $result = $prep->execute([ $fieldValues["form-id"] ]);

        if (!$result) {
            return false;
        }

        return true;
    }

    public function insertCounter(array $fieldValues) {
        $sql = 'INSERT INTO `survey`.`response_count` (`counter`, `form_id`) VALUES (?, ?)';
        $prep = $this->dbc->getConnection()->prepare($sql);
        $result = false;
        $result = $prep->execute([ $fieldValues["counter"], $fieldValues["form-id"] ]);

        if (!$result) {
            return false;
        }

        return $this->dbc->getConnection()->lastInsertId();
    }


}
