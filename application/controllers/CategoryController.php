<?php

namespace application\controllers;

use application\base\BaseController;
use application\models\Product;

class CategoryController extends BaseController
{

    public function actionIndex(){
        $title = 'Categories';

        $products = Product::getProductsByCategory();

        $this->view->setTitle('Category');
        $this->view->render('category/index',[
            'title' => $title,
            'products' => $products
        ]);

        return true;
    }

}