<?php

namespace application\controllers;

use application\base\BaseController;
use application\models\Category;

class SiteController extends BaseController
{
    public function actionDbCon(){
        echo 'ka';
        return true;
    }

    public function actionIndex()
    {
        $categories_list = Category::getCategories();


        $this->view->setTitle('Home');
        $this->view->render('site/index', [
            'categories_list' => $categories_list
        ]);

        return true;
    }

    public function actionContact()
    {
        $this->view->setTitle('Contact');
        $this->view->render('site/contact', []);

        return true;
    }

    public function actionAbout()
    {
        $this->view->setTitle('About');
        $this->view->render('site/about', []);

        return true;
    }


}