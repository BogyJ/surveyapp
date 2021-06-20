<?php
    class ValidateResults {
        private $questions;
        private $usersSelectedAnswer;
        private $questionId;

        public function __construct(array $questions, int $usersSelectedAnswer, int $questionId) {
            $this->questions = $questions;
            $this->usersSelectedAnswer = $usersSelectedAnswer;
            $this->questionId = $questionId;
        }

        private function verifyAnswersAndUpdateResults() {
            foreach ($this->questions as $question) {
                if ($question["id"] === $this->questionId) {
                    $_SESSION["results"]["attempted"] += 1;
                    if ($question["isMultipleAnswerChoice"]) {
                        $sum = 0;

                        foreach ($question["correctAnswer"] as $value) {
                            $sum += $value;
                        }

                        if ($sum === $this->usersSelectedAnswer) {
                            $_SESSION["results"]["correct"] += 1;
                        }
                    } else {
                        if ($question["correctAnswer"] === $this->usersSelectedAnswer) {
                            $_SESSION["results"]["correct"] += 1;
                        }
                    }
                }
            }

        }

        public function verify() {
            $this->verifyAnswersAndUpdateResults();
        }

        public function getResults(): string {
            $numberOfQuestions = count($this->questions);
            $percentage = ceil($_SESSION["results"]["correct"] * 100. / $numberOfQuestions);

            $html = "
                    <table id=\"table\">
                        <tr>
                            <th colspan=\"2\">Rezultati testa</th>
                        </tr>
                        <tr>
                            <td>Broj pitanja</td>
                            <td>Od {$numberOfQuestions} pitanja, na {$_SESSION["results"]["attempted"]} je odgovoreno</td>
                        </tr>
                        <tr>
                            <td>Rezultat</td>
                            <td>{$percentage}%</td>
                        </tr>
                    </table>
                    <a href=\"/projects/prvikolokvijumfinal/\" class=\"home\">Početna</a>
            ";
            return $html;
        }

    }
