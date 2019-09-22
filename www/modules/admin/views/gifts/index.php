<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GiftsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gifts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gifts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gifts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
      				'attribute' => 'image',
      				'format' => 'html',
      				'value' => function($model) {
      					return Html::img(Yii::getAlias('@web/uploads/gift')  . '/' . $model->id . '/' . $model->image, ['width'=>'100']);
      				}
      			],
            'name',
            'in_stock',
            'qty',
            'sales_qty',
            //'seller_id',
            //'price',
            //'image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
