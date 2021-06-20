<?php
    class GenerateTest {
        private $questionId;
        private $question;
        private $answers;
        private $isMultipleAnswerChoice;

        public function __construct(int $questionId, string $question, array $answers, bool $isMultipleAnswerChoice) {
            $this->questionId = $questionId;
            $this->question = $question;
            $this->answers = $answers;
            $this->isMultipleAnswerChoice = $isMultipleAnswerChoice;
        }

        public function showTest(): string {
            $questionIdString = strval($this->questionId);
            echo "
                <p class=\"question\">{$questionIdString}. {$this->question}</p>
            ";

            $inputType = $this->isMultipleAnswerChoice ? "checkbox" : "radio";

            $answersElements = "";
            $counter = 1;
            foreach ($this->answers as $answer) {
                $counterString = strval($counter);

                $nameType = "check[{$questionIdString}]";
                if ($inputType === "checkbox") {
                    $nameType = "check[{$questionIdString}][]";
                }

                $answersElements .= "
                    <div class=\"answer\">
                        <input type=\"{$inputType}\" name=\"{$nameType}\" value=\"{$counterString}\"> {$answer}
                    </div>
                ";
                $counter++;
            }
            return $answersElements;
        }

    }
