<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GiftsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gifts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'in_stock') ?>

    <?= $form->field($model, 'qty') ?>

    <?= $form->field($model, 'sales_qty') ?>

    <?php // echo $form->field($model, 'seller_id') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'image') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
