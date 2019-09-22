<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Blogs;
use app\models\BlogsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * BlogsController implements the CRUD actions for Blogs model.
 */
class BlogsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Blogs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlogsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blogs model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    private function runSiteMapGenerate(){
  		// assuming you have file 'yii' in the root directory:
  		chdir('../../'); //folder that contains yii
  		$output = shell_exec('php yii site-map');
  	}

    /**
     * Creates a new Blogs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Blogs();

        if ($model->load(Yii::$app->request->post()) && $uploadFile = UploadedFile::getInstance($model, 'cover_image')) {
            $extension = $uploadFile->getExtension();

			      $model->cover_image = md5(microtime()) . '.' . $extension;

            if($model->save()) {
				        //$this->runSiteMapGenerate();

                $dir = \Yii::getAlias('@webroot/uploads/blog') . "/" . $model->id;
                FileHelper::createDirectory($dir);

                if($uploadFile->saveAs($dir . '/' . $model->cover_image)) {
					          return $this->redirect(['index']);
                }
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Blogs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $current_image = $model->cover_image;

        if ($model->load(Yii::$app->request->post())) {
    			$uploadFile = UploadedFile::getInstance($model, 'cover_image');

    			if(!is_null($uploadFile)){
    				$extension = $uploadFile->getExtension();
    				$model->cover_image = md5(microtime()) . '.' . $extension;

    				if($model->save()) {
    					// $this->runSiteMapGenerate();

    					$dir = \Yii::getAlias('@webroot/uploads/blog') . "/" . $model->id;
    					FileHelper::createDirectory($dir);

    					if($uploadFile->saveAs($dir . '/' . $model->cover_image)) {
    						return $this->redirect(['view', 'id' => $model->id]);
    					}
    				}
    			} else {
            $model->cover_image = $current_image;

    				if($model->save()) {
    					// $this->runSiteMapGenerate();

    					return $this->redirect(['view', 'id' => $model->id]);
    				}
    			}
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Blogs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Blogs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blogs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blogs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
