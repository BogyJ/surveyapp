<?php
    namespace App\Core;

    class DatabaseConnection {
        private $configuration;
        private $connection;

        public function __construct(\App\Core\DatabaseConfiguration $configuration) {
            $this->configuration = $configuration;
        }

        public function getConnection(): \PDO {
            if ($this->connection === NULL) {
                $this->connection = new \PDO($this->configuration->getSourceString(), $this->configuration->getUser(), $this->configuration->getPass());
            }

            return $this->connection;
        }

    }
