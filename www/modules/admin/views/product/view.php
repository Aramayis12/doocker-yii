<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'categoryID',
                'format' => 'text',
                'value' => function($model) {
                    $categoryName = Category::findOne(['id' => $model->categoryID])->categoryName;
                    return $categoryName;
                }
            ],
            'title',
            'description:ntext',
            [
                'attribute' => 'inStock',
                'format' => 'text',
                'value' => function($model) {
                    $response = ($model->inStock ==1)?'Այո':'Ոչ';
                    return $response;
                }
            ],
            [
                'attribute' => 'price',
                'format' => 'text',
                'value' => function($model) {
                    return $model->price . ' ֏';
                }
            ],
            [
                'attribute' => 'original_price',
                'format' => 'text',
                'value' => function($model) {
                    return $model->original_price . ' ֏';
                }
            ]
        ],
    ]) ?>

</div>
