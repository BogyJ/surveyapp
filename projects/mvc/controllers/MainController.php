<?php
    namespace App\Controllers;

    class MainController extends \App\Core\Controller {
        public function home() {
            $categoryModel = new \App\Models\CategoryModel($this->getDatabaseConnection());
            $categories = $categoryModel->getAllCategories();

            $this->set('categories', $categories);
        }

    }
