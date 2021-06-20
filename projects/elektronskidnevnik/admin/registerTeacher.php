<?php
    require_once('../establishDatabaseConnection.php');

    if (!isset($_SESSION['teacher']) || $_SESSION['teacher'] !== 1) {
        header('Location: /');
    }

    $forename = $_POST['forename'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if (!isset($forename) || !isset($surname) || !isset($username) || !isset($email) || !isset($pass)) {
        header('Location: /');
    }

    $prep = $databaseConnection->getConnection()->prepare('SELECT * FROM user;');
    $res = $prep->execute();
    $users = [];

    $exists = FALSE;
    if ($res) {
        $users = $prep->fetchAll(PDO::FETCH_OBJ);

        foreach ($users as $user) {
            if ($user->email === $email || $user->username === $username) {
                echo 'Email ili username već postoji!';
                $exists = TRUE;
                break;
            } else {
                $pass = password_hash($pass, PASSWORD_BCRYPT);
                $prep = $databaseConnection->getConnection()->prepare("INSERT INTO user(forename, surname, username, password_hash, email, is_teacher) VALUES(?, ?, ?, ?, ?, ?)");
                $res = $prep->execute([$forename, $surname, $username, $pass, $email, 1]);

                if ($res) {
                    $_SESSION['message'] =  'Nalog za nastavnika je uspešno kreiran.';
                    header('Location: /');
                    break;
                } else {
                    echo 'Došlo je do greške.';
                }
                
            }
        }
    }


