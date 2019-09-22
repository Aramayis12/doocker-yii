<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\ShippingStatus;
use app\components\PaymentStatus;
use app\components\PayTypeStatus;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <h3>Առաքման տվյալները</h3>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          [
            'attribute' => 'month',
            'format' => 'text',
            'value' => function($model){
              $months = array(
                1 => 'Հունվար',
                2 => 'Փետրվար.',
                3 => 'Մարտ',
                4 => 'Ապրիլ',
                5 => 'Մայիս',
                6 => 'Հունիս',
                7 => 'Հուլիս',
                8 => 'Օգոստոս',
                9 => 'Սեպտեմբեր',
                10 => 'Հոկտեմբեր',
                11 => 'Նոյեմբեր',
                12 => 'ԴԵկտեմբեր'
              );

              return $months[$model->month];
            }
          ],

          'day',
          'time',
          'qty',
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
          [
            'attribute' => 'created_at',
            'format' => 'date',
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
          [
            'attribute' => 'recipient_for',
            'format' => 'html',
            'value' => function($model){
                $a= ['1' => 'Նվեր է', '0' => 'Իր համար է'];
                return  '<b>'.$a[$model->recipient_for].'</b>';
            }
          ],


        ],

    ]) ?>
    <br><br>

    <h3>Պատվիրատուի տվյալները</h3>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'last_name',
            'address_1',
            'city',
            'phone',
            'email:email',
            'interests:ntext',
            'user_id',

            'age',

        ],
    ]) ?>
    <br><br>

    <h3>Ստացողի տվյալները</h3>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'recipient_first_name',
            'recipient_last_name',
            'recipient_address_1',
            'recipient_city',
            'recipient_interests:ntext',
            'recipient_age',
        ],
    ]) ?>

</div>
