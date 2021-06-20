<?php
    class LoadQuestions {
        private $pathToFile;

        public function __construct(string $pathToFile) {
            $this->pathToFile = $pathToFile;
        }

        public function getQuestions(): array {
            $jsonData = file_get_contents($this->pathToFile);

            return json_decode($jsonData, true)['questions'];
        }


    }
