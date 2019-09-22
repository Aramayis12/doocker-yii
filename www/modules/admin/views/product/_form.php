<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categoryID')->dropDownList(
      ArrayHelper::map(
        Category::find()->all(),'id','categoryName'
      ),['prompt'=>'Ընտրել Կատեգորիան']);?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'status')->dropDownList(['1' => 'Ցույց տալ', '0' => 'Ցույց չտալ']);?>

    <?= $form->field($model, 'description')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ]);?>

    <?php
    $a= ['1' => 'Այո', '0' => 'Ոչ'];
    echo $form->field($model, 'inStock')->dropDownList($a);
    ?>

    <?= $form->field($model, 'original_price')->textInput([
                                 'type' => 'number'
                            ]) ?>

    <?= $form->field($model, 'price')->textInput([
                                 'type' => 'number'
                            ]) ?>

    <?= $form->field($model, 'sales_qty')->textInput([
                                 'type' => 'number'
                            ]) ?>

    <?= $form->field($model, 'views_qty')->textInput([
                                 'type' => 'number'
                            ]) ?>

    <?= $form->field($model, 'image')->fileInput()  ?>

    <?php
      if ($model->image) {
        echo '<p>' . Html::img(Yii::getAlias('@web/') . $model->image, ['width'=>'340px']) . '<p>';
      }
    ?>

    <?= $form->field($model, 'source')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Թարմացնել', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
