<?php
    class GenerateTest {
        private $questionId;
        private $question;
        private $answers;
        private $correct;
        private $length;
        private $isMultipleAnswerChoice;

        public function __construct(int $questionId, string $question, array $answers, int $length, bool $isMultipleAnswerChoice) {
            $this->questionId = $questionId;
            $this->question = $question;
            $this->answers = $answers;
            $this->length = $length;
            $this->isMultipleAnswerChoice = $isMultipleAnswerChoice;
        }

        public function getQuestionId(): int {
            return $this->questionId;
        }

        public function getQuestion(): string {
            return $this->question;
        }

        public function getAnswers(): array {
            return $this->answers;
        }

        public function getCorrectAnswer() {
            return $this->correct;
        }

        public function render(int $questionId) {
            if ($this->questionId !== $questionId) {
                # Test has ended ... Calculate results
                return;
            }
            $dom = new DOMDocument('1.0');

            $question = strval($this->questionId) . '. ' . $this->question;
            $p = $dom->createElement('p', $question);
            $pAttribute = $dom->createAttribute('id');
            $pAttribute->value = 'question';
            $p->appendChild($pAttribute);
            $dom->appendChild($p);

            # $div = $dom->createElement('div');
            # $divAttribute = $dom->createAttribute('id');
            # $divAttribute->value = 'answers';
            # $div->appendChild($divAttribute);

            $form = $dom->createElement('form');
            $formAttribute = $dom->createAttribute('action');
            $formAttribute->value = 'handle.php/';
            $form->appendChild($formAttribute);

            $formAttribute = $dom->createAttribute('id');
            $formAttribute->value = 'answers';
            $form->appendChild($formAttribute);

            $formAttribute = $dom->createAttribute('method');
            $formAttribute->value = 'GET';
            $form->appendChild($formAttribute);

            $counter = 1;
            foreach ($this->answers as $answer) {
                $div = $dom->createElement('div');

                $answer = ' ' . $answer;
                $label = $dom->createElement('label', $answer);
                $labelAttribute = $dom->createAttribute('for');
                $labelAttribute->value = 'answer-' . strval($counter);
                $label->appendChild($labelAttribute);

                $input = $dom->createElement('input');
                $inputAttribute = $dom->createAttribute('id');
                $inputAttribute->value = 'answer-' . strval($counter);
                $input->appendChild($inputAttribute);

                $inputAttribute = $dom->createAttribute('type');
                $inputAttribute->value = 'radio';
                $input->appendChild($inputAttribute);

                if ($this->isMultipleAnswerChoice) {
                    $inputAttribute->value = 'checkbox';
                    $input->appendChild($inputAttribute);

                    $inputAttribute = $dom->createAttribute('name');
                    $inputAttribute->value = 'answer-' . strval($counter);
                    $input->appendChild($inputAttribute);
                } else {
                    $inputAttribute = $dom->createAttribute('name');
                    $inputAttribute->value = 'answer';
                    $input->appendChild($inputAttribute);

                    $inputAttribute = $dom->createAttribute('value');
                    $inputAttribute->value = strval($counter);
                    $input->appendChild($inputAttribute);
                }

                $div->appendChild($input);
                $div->appendChild($label);

                $form->appendChild($div);

                $counter++;
            }

            $inputQuestionId = $dom->createElement('input');
            $inputAttribute = $dom->createAttribute('type');
            $inputAttribute->value = 'hidden';
            $inputQuestionId->appendChild($inputAttribute);

            $inputAttribute = $dom->createAttribute('name');
            $inputAttribute->value = 'question-id';
            $inputQuestionId->appendChild($inputAttribute);

            $inputAttribute = $dom->createAttribute('value');
            $inputAttribute->value = $this->questionId+1;
            $inputQuestionId->appendChild($inputAttribute);

            $form->appendChild($inputQuestionId);

            $submit = $dom->createElement('input');
            $submitAttribute = $dom->createAttribute('type');
            $submitAttribute->value = 'submit';
            $submit->appendChild($submitAttribute);

            $submitAttribute = $dom->createAttribute('value');
            $submitAttribute->value = 'Следеће питање';

            if ($this->length === $questionId) {
                $submitAttribute = $dom->createAttribute('name');
                $submitAttribute->value = 'end';
                $submit->appendChild($submitAttribute);

                $submitAttribute = $dom->createAttribute('value');
                $submitAttribute->value = 'Крај рада';
            }
            $submit->appendChild($submitAttribute);

            $form->appendChild($submit);

            $dom->appendChild($form);

            return $dom->saveHTML();
        }

    }
