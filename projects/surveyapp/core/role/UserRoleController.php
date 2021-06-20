<?php
    namespace App\Core\Role;

    class UserRoleController extends \App\Core\Controller {
        public function __pre() {
            if (!$_SESSION["loggedIn"]) {
                header('Location: /projects/surveyapp/user/login/');
            }
        }
    }
