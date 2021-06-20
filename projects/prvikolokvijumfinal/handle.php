<?php
    require_once 'assets/php/LoadQuestions.php';
    require_once 'assets/php/GenerateTest.php';

    include 'assets/templates/top.php';

    if (!isset($_GET["test"])) {
        header('Location: /');
    }

    session_start();

    $selectedTest = filter_input(INPUT_GET, "test", FILTER_SANITIZE_STRING);

    $_SESSION["selected-test"] = $selectedTest;

    $questions = new LoadQuestions('tests/' . $selectedTest . '.json');
    $questions = $questions->getQuestions();

?>
    <p class="timer">Preostalo vreme: <span id="minutes">15</span>:<span id="seconds">00</span></p>
    <form action="assets/php/check.php/" method="POST" id="form">
        <?php
            foreach ($questions as $question) {
                $test = new GenerateTest($question["id"], $question["question"], $question["answers"], $question["isMultipleAnswerChoice"]);
                echo $test->showTest();
            }

        ?>
        <input type="Submit" value="Prikaži rezultate" name="submit" id="submit-test">
    </form>

    <?php
        echo "
                <footer>
                    <p>Aplikacija za testiranje studenata | Copyright &copy; | All rights reserved</p>
                </footer>
                <script src=\"assets/js/timer.js\"></script>
                </body>
            </html>
        ";
    ?>

