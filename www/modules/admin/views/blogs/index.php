<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BlogsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Բլոգներ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Ավելացնել Բլոգ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
      				'attribute' => 'cover_image',
      				'format' => 'html',
      				'value' => function($model) {
      					return Html::img(Yii::getAlias('@web/uploads/blog')  . '/' . $model->id . '/' . $model->cover_image, ['width'=>'100']);
      				}
      			],
            'title',
            'public_date',
            // 'text:ntext',
            'slug',
            //'cover_image',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
