<?php
    namespace App\Controllers;

    class MainController extends \App\Core\Controller {

        public function home() {
            $categoryModel = new \App\Models\CategoryModel($this->getDatabaseConnection());
            $categories = $categoryModel->getAll();
            $this->set('categories', $categories);

            $staraVrednost = $this->getSession()->get('neki_kljuc', '/');
            $this->set('podatak', $staraVrednost);
        }

        public function getRegister() { }

        public function postRegister() {
            $email     = \filter_input(INPUT_POST, 'reg-email', FILTER_SANITIZE_EMAIL);
            $forename  = \filter_input(INPUT_POST, 'reg-forename', FILTER_SANITIZE_STRING);
            $surname   = \filter_input(INPUT_POST, 'reg-surname', FILTER_SANITIZE_STRING);
            $username  = \filter_input(INPUT_POST, 'reg-username', FILTER_SANITIZE_STRING);
            $password1 = \filter_input(INPUT_POST, 'reg-password-1', FILTER_SANITIZE_STRING);
            $password2 = \filter_input(INPUT_POST, 'reg-password-2', FILTER_SANITIZE_STRING);

            if ($password1 !== $password2) {
                $this->set('message', 'Doslo je do greske: Niste uneli dva puta istu lozinku.');
                return;
            }

            $userModel = new \App\Models\UserModel($this->getDatabaseConnection());

            $user = $userModel->getByFieldName('email', $email);
            if ($user) {
                $this->set('message', 'Doslo je do greske: Vec postoji korinsik sa tom e-mail adresom.');
                return;
            }

            $user = $userModel->getByFieldName('username', $username);
            if ($user) {
                $this->set('message', 'Doslo je do greske: Vec postoji korinsik sa tim korisnickim imenom.');
                return;
            }

            $passwordHash = \password_hash($password1, PASSWORD_DEFAULT);

            $userId = $userModel->add([
                'forename' => $forename,
                'surname' => $surname,
                'username' => $username,
                'password_hash' => $passwordHash,
                'email' => $email
            ]);

            if (!$userId) {
                $this->set('message', 'Doslo je do greske: nije bilo uspesno registrovanje naloga.');
                return;
            }

            $this->set('message', 'Napravljan je novi nalog. Sada mozete da se prijavite.');
        }

        public function getLogin() { }

        public function postLogin() {
            $username = \filter_input(INPUT_POST, 'login-username', FILTER_SANITIZE_STRING);
            $password = \filter_input(INPUT_POST, 'login-password', FILTER_SANITIZE_STRING);

            $userModel = new \App\Models\UserModel($this->getDatabaseConnection());

            $user = $userModel->getByFieldName('username', $username);  
            if (!$user) {
                $this->set('message', 'Doslo je do greske: ne postoji korsnik sa tim korisnickim imenom.');
                return;
            }

            if (!password_verify($password, $user->password_hash)) {
                sleep(1);
                $this->set('message', 'Doslo je do greske: lozinka nije ispravna.');
                return;
            }

            $this->getSession()->put('user_id', $user->user_id);
            $this->getSession()->save();

            $this->redirect('/user/profile/');

            # $this->set('message', '');
        }

    }

