<?php
    require_once('../establishDatabaseConnection.php');

    $username = $_POST['username'];
    $pass = $_POST['password'];

    $prep = $databaseConnection->getConnection()->prepare('SELECT * FROM user WHERE user.username = ? OR user.email = ?;');
    $res = $prep->execute([$username, $username]);
    $user = NULL;

    if ($res) {
        $user = $prep->fetch(PDO::FETCH_OBJ);

        if (password_verify($pass, $user->password_hash)) {
            $_SESSION['login'] = TRUE;
            $_SESSION['forename'] = $user->forename;
            $_SESSION['surname'] = $user->surname;
            $_SESSION['user_id'] = $user->user_id;
            $_SESSION['teacher'] = 0;
            $_SESSION['admin'] = 0;

            if ($user->is_admin === "1" && $user->is_teacher === "1") {
                $_SESSION['admin'] = 1;
                $_SESSION['teacher'] = 1;
                header('Location: ../admin/admin.php');
            } elseif ($user->is_teacher === "1") {
                $_SESSION['teacher'] = 1;
                header('Location: ../teacher/index.php');
            } else {
                header('Location: ../ucenik.php');
            }
        } else {
            echo 'Korisničko ime ili email ili lozinka nisu tačni.';
        }

        
    }
