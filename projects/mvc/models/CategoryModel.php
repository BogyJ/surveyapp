<?php
    namespace App\Models;

    class CategoryModel {
        private $dbc;

        public function __construct(\App\Core\DatabaseConnection &$dbc) {
            $this->dbc = $dbc;
        }

        public function getAllCategories(): array {
            $sql = 'SELECT * FROM category;';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute();
            $categories = [];

            if ($result) {
                $categories = $prep->fetchAll(\PDO::FETCH_OBJ);
            }

            return $categories;
        }

        public function getByCategoryId(int $categoryId) {
            $sql = 'SELECT * FROM category WHERE category.category_id = ?;';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute([ $categoryId ]);
            $category = NULL;

            if ($result) {
                $category = $prep->fetch(\PDO::FETCH_OBJ);
            }

            return $category;
        }

    }
