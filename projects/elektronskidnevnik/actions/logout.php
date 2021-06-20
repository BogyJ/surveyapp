<?php
    require_once('../establishDatabaseConnection.php');

    unset($_SESSION['teacher']);
    unset($_SESSION['login']);
    session_destroy();
    header('Location: /');
    
