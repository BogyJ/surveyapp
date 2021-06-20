<?php
    namespace App\Controllers;

    class MainController extends \App\Core\Controller {
        public function home() {
            $formModel = new \App\Models\FormModel($this->getDatabaseConnection());
            $forms = $formModel->getAllForms();

            $this->set('forms', $forms);
        }

        public function getRegister() { }

        public function postRegister() {
            $userModel = new \App\Models\UserModel($this->getDatabaseConnection());

            $forename = filter_input(INPUT_POST, 'forename', FILTER_SANITIZE_STRING);
            $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password1 = filter_input(INPUT_POST, 'password1', FILTER_SANITIZE_STRING);
            $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

            if ($password1 !== $password2) {
                $this->set('message', 'Došlo je do greške: lozinke se ne poklapaju.');
                return;
            }

            $password_hash = password_hash($password1, PASSWORD_DEFAULT);
            $fields = [
                "forename" => $forename,
                "surname" => $surname,
                "username" => $username,
                "password_hash" => $password_hash,
                "email" => $email
            ];

            $userId = null;
            try {
                $userId = $userModel->addUser($fields);
            } catch (\Exception $e) {
                $this->set('message', $e->getMessage());
            }

            if ($userId) {
                $this->set('message', 'Nalog napravljen. Ulogujte sa svojim novim korisničkim imenom.');
            }
        }

        public function getLogin() { }

        public function postLogin() {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            $userModel = new \App\Models\UserModel($this->getDatabaseConnection());
            $user = $userModel->getByUsername($username);

            if (!$user) {
                $this->set('message', 'Došlo je do greške: nalog sa tim korisničkim imenom ne postoji.');
                return;
            }

            if (!password_verify($password, $user->password_hash)) {
                sleep(1); // secure from brute force attack
                $this->set('message', 'Došlo je do greške: lozinka nije ispravna.');
                return;
            }

            $this->set('username', $username);
            $_SESSION["loggedIn"] = true;
            header('Location: /projects/surveyapp/user/profile/');
        }

        public function getLogout() {
            $_SESSION["loggedIn"] = false;
            header('Location: /projects/surveyapp/');
        }

    }
