<?php
    require_once 'LoadQuestions.php';
    require_once 'ValidateResults.php';

    include '../templates/top.php';

    session_start();

    $testName = $_SESSION["selected-test"];
    $_SESSION["results"] = ["attempted" => 0, "correct" => 0];

    $questions = new LoadQuestions('../../tests/' . $testName . '.json');
    $questions = $questions->getQuestions();

    if (isset($_POST["submit"])) {
        if (!empty($_POST["check"])) {
            $selectedAnswers = $_POST["check"];

            foreach ($selectedAnswers as $selectedAnswer) {
                $questionIdToBeChecked = array_search($selectedAnswer, $selectedAnswers);
                $usersSelectedAnswer = $selectedAnswers[$questionIdToBeChecked];

                if (gettype($selectedAnswer) === "array") {
                    $usersSelectedAnswer = 0;
                    foreach ($selectedAnswer as $selectedAnswerCheckbox) {
                        $usersSelectedAnswer += intval($selectedAnswerCheckbox);
                    }
                }
                $validation = new ValidateResults($questions, intval($usersSelectedAnswer), $questionIdToBeChecked);
                $validation->verify();
            }

            if (isset($validation)) {
                $results = $validation->getResults();
                echo $results;
            }

        } else {
            echo "
                <p class=\"score-none\">Osvojili ste 0 bodova.</p>
            ";
        }
    }

    echo "    
            <footer>
                <p>Aplikacija za testiranje studenata | Copyright &copy; | All rights reserved</p>
            </footer>
        </body>
    </html>
    ";

