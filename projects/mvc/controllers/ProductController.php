<?php
    namespace App\Controllers;

    class ProductController extends \App\Core\Controller {
        public function show(int $categoryId) {
            $productModel = new \App\Models\ProductModel($this->getDatabaseConnection());
            $products = $productModel->getByCategoryId($categoryId);

            $this->set('products', $products);
        }

}
