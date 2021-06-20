<?php
namespace App\Models;

class ResponseCountModel {
    private $dbc;

    public function __construct(\App\Core\DatabaseConnection $dbc) {
        $this->dbc = $dbc;
    }

    public function getResponseCountsByFormId(int $formId) {
        $sql = "SELECT COUNT(`response_count_id`) AS total_responses FROM `survey`.`response_count` WHERE `response_count`.`form_id` = ?;";
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

    /*
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
    */

}
