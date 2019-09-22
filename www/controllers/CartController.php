<?php

namespace app\controllers;

use \yii\web\Controller;
use app\models\Product;
use app\models\Cart;

class CartController extends Controller
{
    // public $layout = 'product';

    public function beforeAction($action)
    {
        if($action->id =='remove-item')
        {
          $this->enableCsrfValidation = false;
        }

        //return true;
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
    	$carts = Cart::find()->select([
            'product_title' => 'product.title', 
            'product_image' => 'product.image', 
            'product_slug' => 'product.slug',
            'cart.*'
            ])->leftJoin('product', 'product.id=cart.product_id')->asArray()->all();

        return $this->render('index', [
            'carts' => $carts
        ]);
    }

    public function actionRemoveItem(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        // Check if ajax
        $request = \Yii::$app->request;

        if ($request->isAjax) {
            $cart_id = $request->post('cart_item_key');

            $cart = Cart::findOne(['id'=>$cart_id]);

            // Check exist of item
            if($cart){
                $response = Cart::find()
                ->where(['id'=>$cart_id])
                ->one()
                ->delete();

                return [
                    'result' => true
                ];
            }
        }

        return [
            'result' => false
        ];
    }

}
