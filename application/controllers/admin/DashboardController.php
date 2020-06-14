<?php

namespace application\controllers\admin;

use application\base\AdminBaseController;

class DashboardController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actionIndex(){

        $this->view->setTitle('Admin Dashboard');
        $this->view->render('admin/dashboard/index');

        return true;
    }
}