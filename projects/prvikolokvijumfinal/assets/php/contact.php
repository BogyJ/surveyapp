<?php
    if (!isset($_POST["submit"])) {
        header('Location: /projects/prvikolokvijumfinal/');
    }

    include '../templates/top.php';

    $forename = filter_input(INPUT_POST, "forename", FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);

    echo "<b>Ime:</b> {$forename}<br>";
    echo "<b>Prezime:</b> {$lastname}<br>";
    echo "<b>E-mail:</b> {$email}<br>";
    echo "<b>Poruka:</b> {$message}<br>";

    echo "
            <footer>
                <p>Aplikacija za testiranje studenata | Copyright &copy; | All rights reserved</p>
            </footer>
            </body>
        </html>
    ";
