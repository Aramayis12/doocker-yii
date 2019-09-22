<?php

namespace app\controllers;

use Yii;
use \yii\web\Controller;
use app\models\Product;
use app\models\Orders;
use yii\filters\AccessControl;

class MyAccountController extends Controller
{
    public function behaviors()
    {
       return [
           'access' => [
               'class' => AccessControl::className(),
               'only' => ['index'],
               'rules' => [
                   [
                       'allow' => true,
                       'actions' => ['index'],
                       'roles' => ['@'],
                   ],
               ],
           ],
       ];
    }

    public function actionIndex()
    {
         // $email = Yii::$app->user->identity->email;

         // $product = Product::find()->one();
    	   // $order = Orders::find()->where(['email' => $email])->orderBy(['id'=>SORT_DESC])->one();

         return $this->render('index');
    }

    public function actionOrders()
    {
         $email = Yii::$app->user->identity->email;

         $product = Product::find()->one();
    	   $orders = Orders::find()->where(['email' => $email])->orderBy(['id'=>SORT_DESC])->all();

         return $this->render('order', [
            'product' => $product,
            'orders' => $orders
         ]);
    }

}
