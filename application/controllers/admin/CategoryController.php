<?php

namespace application\controllers\admin;

use application\base\AdminBaseController;

class CategoryController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actionIndex(){

        $this->view->setTitle('Admin Category');
        $this->view->render('admin/category/index');

        return true;
    }

}