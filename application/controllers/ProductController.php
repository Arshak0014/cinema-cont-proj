<?php


namespace application\controllers;


use application\base\BaseController;
use application\models\Product;

class ProductController extends BaseController
{

    public function actionIndex(){
        $title = 'All Products';
        $products = Product::getProducts();

        $this->view->setTitle('Products Page');
        $this->view->render('product/index',[
            'products' => $products,
            'title' => $title
        ]);

        return true;
    }

}