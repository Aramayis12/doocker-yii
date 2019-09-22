<?php

namespace app\controllers;

use \yii\web\Controller;
use app\models\Product;
use app\models\Cart;

class ProductController extends Controller
{
    // public $layout = 'product';

    public function actionIndex($slug)
    {
      $request = \Yii::$app->request;
      $cart = new Cart();

      $isCartAdded = false;

      if ($request->isPost) {
        $cart->load($request->post());
        $cart->hash = $_COOKIE['cart_hash'];
        if($cart->save()){
          $isCartAdded = clone($cart);
        }
      }

      $cart->qty = 1;

      $model = Product::find()->where([
        'slug' => $slug
      ])->one();

      $products = $products = Product::find([
        'categoryID' => $model->categoryID
      ])->limit(3)->all();

      return $this->render('index', [
        'model' => $model,
        'products' => $products,
        'cart' => $cart,
        'isCartAdded' => $isCartAdded
      ]);
    }

}
