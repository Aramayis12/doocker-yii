<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Gifts;
use app\models\GiftsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\filters\VerbFilter;

/**
 * GiftsController implements the CRUD actions for Gifts model.
 */
class GiftsController extends Controller
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
     * Lists all Gifts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GiftsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gifts model.
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

    /**
     * Creates a new Gifts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Gifts();

        if ($model->load(Yii::$app->request->post()) && $uploadFile = UploadedFile::getInstance($model, 'image')) {
            $extension = $uploadFile->getExtension();

			      $model->image = md5(microtime()) . '.' . $extension;

            if($model->save()) {
				        //$this->runSiteMapGenerate();

                $dir = \Yii::getAlias('@webroot/uploads/gift') . "/" . $model->id;
                FileHelper::createDirectory($dir);

                if($uploadFile->saveAs($dir . '/' . $model->image)) {
					          return $this->redirect(['index']);
                }
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Gifts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $current_image = $model->image;

        if ($model->load(Yii::$app->request->post())) {
    			$uploadFile = UploadedFile::getInstance($model, 'image');

    			if(!is_null($uploadFile)){
    				$extension = $uploadFile->getExtension();
    				$model->image = md5(microtime()) . '.' . $extension;

    				if($model->save()) {
    					// $this->runSiteMapGenerate();

    					$dir = \Yii::getAlias('@webroot/uploads/gift') . "/" . $model->id;
    					FileHelper::createDirectory($dir);

    					if($uploadFile->saveAs($dir . '/' . $model->image)) {
    						return $this->redirect(['view', 'id' => $model->id]);
    					}
    				}
    			} else {
            $model->image = $current_image;

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
     * Deletes an existing Gifts model.
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
     * Finds the Gifts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gifts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gifts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
