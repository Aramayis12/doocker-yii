<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CongratulationMessages */

$this->title = 'Create Congratulation Messages';
$this->params['breadcrumbs'][] = ['label' => 'Congratulation Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="congratulation-messages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
