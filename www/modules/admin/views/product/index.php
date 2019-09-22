<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ապրանքներ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Ավելացնել պրոդուկտ', ['create'], ['class' => 'btn btn-success']) ?>
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
      					return Html::img(Yii::getAlias('@web/') . $model->image, ['width'=>'64px']);
      				}
      			],
            'title',
            [
                'attribute' => 'price',
                'format' => 'html',
                'value' => function($model) {
                    return $model->price  . ' ֏' . '<span style="color:green"> (+'.($model->price - $model->original_price).')</span>';
                }
      		],
              [
                'attribute' => 'original_price',
                'format' => 'text',
                'value' => function($model) {
                    return $model->original_price . ' ֏';
                }
            ],
            [
                'attribute' => 'categoryID',
                'format' => 'text',
                'value' => function($model) {
                    $categoryName = Category::findOne(['id' => $model->categoryID])->categoryName;
                    return $categoryName;
                }
            ],
            [
                'attribute' => 'source',
                'format' => 'html',
                'value' => function($model) {
                    return '<a  target="_blank" alt="source" href="'.$model->source.'">open source</a>';
                }
            ],
            [
                'attribute' => 'date_created',
                'format' => 'html',
                'value' => function($model) {
                    $date_created = substr_replace($model->date_created ,"", -3);

                    return date('l jS \of F Y h:i:s A', $date_created);
                }
            ],
            //'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
