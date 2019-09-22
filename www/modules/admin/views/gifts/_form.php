<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Seller;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Gifts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gifts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
    $a= ['1' => 'Այո', '0' => 'Ոչ'];
    echo $form->field($model, 'in_stock')->dropDownList($a);
    ?>

    <?= $form->field($model, 'qty')->textInput([
        'type' => 'number'
      ]) ?>

    <?= $form->field($model, 'sales_qty')->textInput([
        'type' => 'number'
      ]) ?>

    <?= $form->field($model, 'seller_id')->dropDownList(
      ArrayHelper::map(
        Seller::find()->all(),'id','name'
      ),['prompt'=>'Ընտրել Վաճառողին']);?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'image')->fileInput()  ?>

    <?php
  		if ($model->image) {
  			echo '<p>' . Html::img(Yii::getAlias('@web/uploads/gift')  . '/' . $model->id . '/' . $model->image, ['width'=>'340px']) . '<p>';
  		}
  	?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
