<?php
    session_start();
    
    require_once('DatabaseConfiguration.php');
    require_once('DatabaseConnection.php');

    $databaseConfiguration = new DatabaseConfiguration('localhost', 'root', '', 'elektronski_dnevnik');
    $databaseConnection = new DatabaseConnection($databaseConfiguration);

