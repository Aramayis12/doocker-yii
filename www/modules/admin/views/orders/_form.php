<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\ShippingStatus;
use app\components\PaymentStatus;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'month')->textInput() ?>

    <?= $form->field($model, 'day')->textInput() ?>

    <?= $form->field($model, 'time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?php
      $pay_types = ['Առձեռն','իԴրամ','Տերմինալ'];
      echo $form->field($model, 'pay_type')->dropDownList($pay_types);
    ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?php
      $a= ['1' => 'Նվեր է', '0' => 'Իր համար է'];
      echo $form->field($model, 'recipient_for')->dropDownList($a);
    ?>

    <?php
      $a= [
        'AWAITING_ORDER' => 'Պատվերը ընդունված է',
        'ORDER_DISPATCHED' => 'Պատվերը ուղարկվել է',
        'ORDER_DELIVERED' => 'Պատվերը հասել է',
        'ORDER_RETURNED' => 'Պատվերը վերադարձվել է',
        'ORDER_FAILED' => 'Պատվերը չեղարկվել է',
      ];
      echo $form->field($model, 'shipping_status')->dropDownList($a);

    ?>

    <?php
      $a= [
        'AWAITING_PAYMENT' => 'Վճարված չէ',
        'PAYMENT_COMPLETED' => 'Վճարված է',
      ];
      echo $form->field($model, 'payment_status')->dropDownList($a);

    ?>

    <h2>Պատվիրատուի տվյալներ</h2>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'interests')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'age')->textInput([
                                 'type' => 'number'
                            ]) ?>

    <h2>Ստացողի տվյալներ</h2>

    <?= $form->field($model, 'recipient_first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipient_last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipient_address_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipient_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipient_interests')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'recipient_age')->textInput([
                                 'type' => 'number'
                            ]) ?>



    <div class="form-group">
        <?= Html::submitButton('Պահպանել', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
