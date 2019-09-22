<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Product;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
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
                $image_name = md5(microtime()) . '.' . $extension;

                $model->image = 'uploads/product/' . $image_name;

                if($model->save()) {
                    // $this->runSiteMapGenerate();

                    $dir = \Yii::getAlias('@webroot/uploads/product');
                    FileHelper::createDirectory($dir);

                    if($uploadFile->saveAs($dir . '/' . $image_name)) {
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
     * Deletes an existing Product model.
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

    public function actionGenerate()
    {
      echo '<pre>';
      // if (Yii::$app->request->isAjax) {
      //     $data = Yii::$app->request->post();
          $searchname= 'https://www.aliexpress.com/item/New-2017-Xmas-Gift-650ml-Water-Bottle-plastic-Fruit-infusion-bottle-Infuser-Drink-Outdoor-Sports-Juice/32797909813.html'; //$data['searchname'];
          $searchby= 'aliexpress'; //$data['searchby'];

          if($searchby == 'aliexpress'){
            /* Grab the content of the HTML web page */
            $html = file_get_html($searchname);

            // Find all images
            var_dump($html->find('div[id]'));
          }


          // $search = '// your logic';
          // \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
          // return [
          //     'search' => $search,
          //     'code' => 100,
          // ];
        // }
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
