<?php

namespace app\controllers;

use \yii\web\Controller;
use app\models\Blogs;
use yii\data\Pagination;

class BlogsController extends Controller
{
    // public $layout = 'product';

    public function actionIndex()
    {

        $query = Blogs::find();
        $countQuery = clone $query;
        $pages = new Pagination([
          'totalCount' => $countQuery->count(),
          'pageSize' => 2
        ]);

        $models = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->all();

        return $this->render('index', [
             'models' => $models,
             'pages' => $pages,
        ]);

    }

    public function actionView($slug){
      return $this->render('view', [
  			'model' => $this->findModelBySlug($slug),
  		]);
    }

    protected function findModelBySlug($slug)
  	{
  		if (($model = Blogs::findOne(['slug' => $slug])) !== null) {
  			return $model;
  		} else {
  			throw new NotFoundHttpException();
  		}
  	}

}
