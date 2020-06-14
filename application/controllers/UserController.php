<?php

namespace application\controllers;

use application\base\BaseController;

use application\models\Register;

class UserController extends BaseController
{
    public function actionRegister(){

        if (!empty($_POST) && isset($_POST['submit'])){

            $model = new Register($_POST);

            $validate = $model->validate();

            $hash_password = md5($_POST['password']);

            if (empty($validate)){
                Register::register($_POST['first_name'],$_POST['last_name'],$_POST['email'],$hash_password);
            }

            $this->view->render('user/register',[
                'validate' => $validate
            ]);
        }

        $this->view->render('user/register');
        return true;
    }

    public function actionLogin(){

        $this->view->render('user/login');
        return true;
    }

    public function actionGetRegisterDate(){
        Register::getData();
        return true;
    }

}