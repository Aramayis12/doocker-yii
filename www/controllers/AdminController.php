<?php

namespace app\controllers;

class AdminController extends \yii\web\Controller
{
	public $layout = 'main-admin';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
    	$this->layout = 'login-admin';
    	
        return $this->render('login');
    }

}
