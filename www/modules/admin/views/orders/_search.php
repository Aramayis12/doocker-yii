<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrdersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'last_name') ?>

    <?= $form->field($model, 'address_1') ?>

    <?= $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'interests') ?>

    <?php // echo $form->field($model, 'recipient_first_name') ?>

    <?php // echo $form->field($model, 'recipient_last_name') ?>

    <?php // echo $form->field($model, 'recipient_address_1') ?>

    <?php // echo $form->field($model, 'recipient_city') ?>

    <?php // echo $form->field($model, 'recipient_interests') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'month') ?>

    <?php // echo $form->field($model, 'day') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'qty') ?>

    <?php // echo $form->field($model, 'recipient_age') ?>

    <?php // echo $form->field($model, 'recipient_for') ?>

    <?php // echo $form->field($model, 'shipping_status') ?>

    <?php // echo $form->field($model, 'payment_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
