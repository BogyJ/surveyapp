<?php
    namespace App\Models;

    class ProductModel {
        private $dbc;

        public function __construct(\App\Core\DatabaseConnection &$dbc) {
            $this->dbc = $dbc;
        }

        public function getAllProducts(): array {
            $sql = 'SELECT * FROM product;';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute();
            $products = [];

            if ($result) {
                $products = $prep->fetchAll(\PDO::FETCH_OBJ);
            }

            return $products;
        }

        public function getByCategoryId(int $categoryId) {
            $sql = 'SELECT * FROM product WHERE product.category_id = ?;';
            $prep = $this->dbc->getConnection()->prepare($sql);
            $result = $prep->execute([ $categoryId ]);
            $products = [];

            if ($result) {
                $products = $prep->fetchAll(\PDO::FETCH_OBJ);
            }

            return $products;
        }

}
