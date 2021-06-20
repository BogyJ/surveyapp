<?php
    namespace App\Core;

    class DatabaseConfiguration {
        private $host;
        private $user;
        private $pass;
        private $dbname;

        public function __construct(string $host, string $user, string $pass, string $dbname) {
            $this->host = $host;
            $this->user = $user;
            $this->pass = $pass;
            $this->dbname = $dbname;
        }

        public function getSourceString(): string {
            return "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
        }

        public function getUser(): string {
            return $this->user;
        }

        public function getPass(): string {
            return $this->pass;
        }

    }
