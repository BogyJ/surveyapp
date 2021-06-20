<?php
    class ValidateResults {
        private $results = [];
        private $selectedAnswer;
        private $isMultipleAnswerChoice;
        private $correctAnswer;
        private $numberOfCorrectAnswers = 0;
        private $percentOfNumberOfCorrectAnswers = 0.0;
        private $numberOfQuestions;

        public function __construct(bool $isMultipleAnswerChoice, $correctAnswer, int $numberOfQuestions) {
            $this->isMultipleAnswerChoice = $isMultipleAnswerChoice;
            $this->correctAnswer = $correctAnswer;
            $this->numberOfQuestions = $numberOfQuestions;
        }

        private function getPercentOfNumberOfCorrectAnswers(): float {
            return $this->percentOfNumberOfCorrectAnswers;
        }

        private function verifyAnswerAndUpdateResults(): array {
            $state = false;

            if ($this->selectedAnswer === $this->correctAnswer) {
                echo "TACAN";
                $state = true;
                $this->numberOfCorrectAnswers++;
            }

            $this->percentOfNumberOfCorrectAnswers = $this->numberOfCorrectAnswers * 100. / $this->numberOfQuestions;

            return [
                "state" => $state,
                "percentage" => $this->percentOfNumberOfCorrectAnswers,
                "numberOfCorrectAnswers" => $this->numberOfCorrectAnswers
            ];
        }

        private function setSelectedAnswer(string $selectedAnswer) {
            $sum = 0;

            if ($this->isMultipleAnswerChoice) {
                for ($i=0; $i<strlen($selectedAnswer); $i++) {
                    $sum += intval($selectedAnswer[$i]);
                }

                $sum = 0;

                for ($i=0; $i<count($this->correctAnswer); $i++) {
                    $sum += $this->correctAnswer[$i];
                }
                $this->correctAnswer = $sum;
            }

            $this->selectedAnswer = $sum | intval($selectedAnswer);
        }

        public function getResults(string $selectedAnswer): array {
            $this->setSelectedAnswer($selectedAnswer);
            $info = $this->verifyAnswerAndUpdateResults();

            return $info;
        }
    }
