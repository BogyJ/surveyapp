<?php
namespace App\Models;

class UserLoginModel {
    private $dbc;

    public function __construct(\App\Core\DatabaseConnection $dbc) {
        $this->dbc = $dbc;
    }

    public function addLogin($userId, $ip) {
        $sql = 'INSERT INTO `survey`.`user_login` (`user_id`, `ip_address`) VALUES (?, ?)';
        $prep = $this->dbc->getConnection()->prepare($sql);
        $result = false;
        $result = $prep->execute([ $userId, $ip ]);

        if (!$result) {
            return false;
        }

        return $this->dbc->getConnection()->lastInsertId();
    }

}
