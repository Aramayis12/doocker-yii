<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm as Login;
use app\models\Signup;
use app\models\ContactForm;
use app\models\Subscriptions;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            // 'verbs' => [
            //     'class' => VerbFilter::className(),
            //     'actions' => [
            //         'logout' => ['post'],
            //     ],
            // ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionThankYou(){
      return $this->render('thank-you');
    }

    public function actionSubscribe(){
      $model = new Subscriptions();
      $load = $model->load(Yii::$app->request->post());

      if (Yii::$app->request->isAjax) {
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;

        $errors = \yii\widgets\ActiveForm::validate($model);
        if(empty($errors)){
            $model->created_at = date('Y-m-d H:i:s');

            if($model->save()){
              $subject = 'Դուք հաջողությամբ բաժանորդագրվել էք';

              $html = '<p>Սիրելի Օգտատեր Շնորհակալություն ենք հայտնում մեր նորություններին բաժանորդագրվելու համար։</p>
              <p>Այսուհետ դուք կարող էք տեղեկանալ մեր բոլոր նորություններին ձեր էլ․ փոստի միջոցով։</p>
              <p>Սիրով Ձեր <b>'.Yii::$app->name.'</b></p>';

              $text = 'Սիրելի Օգտատեր Շնորհակալություն ենք հայտնում մեր նորություններին բաժանորդագրվելու համար
              Այսուհետ դուք կարող էք տեղեկանալ մեր բոլոր նորություններին ձեր էլ․ փոստի միջոցով։
              Սիրով Ձեր '.Yii::$app->name;

              // Send to User
              $userEmail = Yii::$app->mailer->compose()
                      ->setTo($model->email)
                      ->setFrom([Yii::$app->params['infoEmail'] => Yii::$app->name . ' robot'])
                      ->setSubject($subject)
                      ->setTextBody($text)
                      ->setHtmlBody($html);

              $userEmail->send();
            }
        }

        return $errors;
      }
    }

    /**
     * Login
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->getUser()->isGuest) {
             return $this->goHome();
        }

        // $signUp = new Signup();
        // $signUp->username = 'aramayisIr';
        // $signUp->email = 'iritsyana1993@gmail.com';
        // $signUp->password = 'iritsyana';
        // $signUp->retypePassword = 'iritsyana';
        //
        // $user = $signUp->signup();


        $model = new Login();
        $load = $model->load(Yii::$app->request->post());

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = yii\web\Response::FORMAT_JSON;

            $errors = \yii\widgets\ActiveForm::validate($model);

            if(empty($errors)){
                $model->login();
            }

            return $errors;
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmails'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

     /**
     * Signup new user
     * @return string
     */
    public function actionSignup()
    {
        $model = new Signup();
        $load = $model->load(Yii::$app->request->post());

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = yii\web\Response::FORMAT_JSON;

            $errors = \yii\widgets\ActiveForm::validate($model);

            if(empty($errors)){
                if ($user = $model->signup()) {
                    $loginModel = new Login();

                    $loginModel->email = $model->email;
                    $loginModel->password = $model->password;

                    $loginModel->login();
                }
            }

            return $errors;
        }
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
