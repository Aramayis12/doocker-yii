<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\ShippingStatus;
use app\components\PaymentStatus;
use app\components\PayTypeStatus;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Պատվերներ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Ավելացնել Պատվեր', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [ 'style' => 'overflow: auto;overflow-y: hidden;' ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'last_name',
            [
              'format' => 'text',
              'label' => 'Առաքման Օրը',
              'value' => function($model){

                // Months
                $months = array(
                  1 => 'Հունվար',2 => 'Փետրվար.', 3 => 'Մարտ',4 => 'Ապրիլ',
                  5 => 'Մայիս',6 => 'Հունիս',7 => 'Հուլիս',8 => 'Օգոստոս',
                  9 => 'Սեպտեմբեր',10 => 'Հոկտեմբեր',11 => 'Նոյեմբեր',12 => 'ԴԵկտեմբեր'
                );

                $date = $model->day . ' '. $months[$model->month]  .' ' . $model->time;
                return $date;;
              }
            ],
            [
              'format' => 'html',
              'attribute' => 'price',
              'value' => function($model){
                return $model->price . ' դր․';
              }
            ],
            [
              'format' => 'html',
              'attribute' => 'pay_type',
              'value' => function($model){
                $text = '';
                if($model->pay_type == 0){
                  $text = PayTypeStatus::CASH;
                } else if($model->pay_type == 1){
                  $text = PayTypeStatus::IDRAM;
                } else if($model->pay_type == 2){
                  $text = PayTypeStatus::TERMINAL;
                }

                return $text;
              }
            ],
            // 'address_1',
            // 'city',
            //'phone',
            //'email:email',
            //'interests:ntext',
            //'recipient_first_name',
            //'recipient_last_name',
            //'recipient_address_1',
            //'recipient_city',
            //'recipient_interests:ntext',
            //'user_id',
            //'month',
            //'day',
            //'time',
            //'created_at',
            //'age',
            //'qty',
            //'recipient_age',
            //'recipient_for',

            [
              'format' => 'html',
              'attribute' => 'shipping_status',
              'value' => function($model){
                $value = '';
                $class = '';

                if($model->shipping_status == 'AWAITING_ORDER'){
                  $class .= 'label-warning';
                  $value = ShippingStatus::AWAITING_ORDER;
                } else if($model->shipping_status == 'ORDER_DISPATCHED'){
                  $class .= 'label-info';
                  $value = ShippingStatus::ORDER_DISPATCHED;
                } else if($model->shipping_status == 'ORDER_DELIVERED'){
                  $class .= 'label-success';
                  $value = ShippingStatus::ORDER_DELIVERED;
                } else if($model->shipping_status == 'ORDER_RETURNED'){
                  $class .= 'label-danger';
                  $value = ShippingStatus::ORDER_RETURNED;
                } else if($model->shipping_status == 'ORDER_FAILED'){
                  $class .= 'label-danger';
                  $value = ShippingStatus::ORDER_FAILED;
                }

                $response = '<span class="label '.$class.'">' .$value . '</span>';
                return $response;
              }
            ],
            [
              'format' => 'html',
              'attribute' => 'payment_status',
              'value' => function($model){
                $value = '';
                $class = '';

                if($model->payment_status == 'AWAITING_PAYMENT'){
                  $class .= 'label-warning';
                  $value = PaymentStatus::AWAITING_PAYMENT;
                } else if($model->payment_status == 'PAYMENT_COMPLETED'){
                  $class .= 'label-success';
                  $value = PaymentStatus::PAYMENT_COMPLETED;
                }

                $response = '<span class="label '.$class.'">' .$value . '</span>';
                return $response;
              }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
