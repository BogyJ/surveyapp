<?php
    require_once 'assets/php/GenerateTest.php';
    require_once 'assets/php/LoadQuestions.php';
    require_once 'assets/php/ValidateResults.php';

    include 'handle.html';

    if (isset($_GET['question-id'])) {
        $questionId = filter_input(INPUT_GET, 'question-id', FILTER_SANITIZE_STRING);
    }

    $loadQuestions = new LoadQuestions('assets/tests/rm.json');
    $questions = $loadQuestions->getQuestions();

    $counter = 0;
    foreach ($questions as $question) {
        if (isset($questionId)) {
            $test = new GenerateTest($question["id"], $question["question"], $question["answers"], count($questions), $question["isMultipleAnswerChoice"]);
            echo $test->render(intval($questionId));

            $answersLength = count($test->getAnswers());
            $validateResults = new ValidateResults($question["isMultipleAnswerChoice"], $question["correctAnswer"], $answersLength);
            $prev = 0;
            $userAnswers = [];

            # Evident user's selected answer
            for ($i=0; $i<$answersLength; $i++) {
                if (isset($_GET['answer-' . strval($i+1)])) {
                    # Multiple answer choice
                    $value = $i+1;
                    $userAnswer = $value + $prev;
                    $prev = $value;
                    $userAnswers[0] = $userAnswer;
                } else if (isset($_GET['answer'])) {
                    $userAnswer = filter_input(INPUT_GET, 'answer', FILTER_SANITIZE_STRING);
                }
            }

            if (isset($userAnswer)) {
                if ($counter === 0) {
                    $results = $validateResults->getResults(strval($userAnswer));
                    if ($results["state"]) {
                        // $results["numberOfCorrectAnswers"];
                        $counter++;
                    }
                }

            }

        }

    }

    include 'bottom.html';

    if (isset($_GET['end'])) {
        echo "Тест је завршен.";
    }
