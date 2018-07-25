<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Orders;
use yii\web\UploadedFile;
use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use app\models\OrdersSearch;
use yii\helpers\Url;

class SiteController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
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

    public function actionIndex() {

        $model = Orders::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 4,
            ],
        ]);

        return $this->render('index', ['model' => $model, 'dataProvider' => $dataProvider]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionEdit($id = 0) {
        if ($id)
            $model = Orders::findOne($id);
        else
            $model = new \app\models\Orders();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->name = Html::encode($model->name);
            $model->date_from = strftime("%d-%m-%Y");
            $model->date_to = Html::encode($model->date_to);
            $img = UploadedFile::getInstance($model, 'img');
            $attrs=['name','text','date_from','date_to','status'];
            if (is_object($img)) {
                $attrs[]='img';
                $img_name = $img->baseName . "." . $img->extension;
                $img->saveAs('../img/' . $img_name);
                $model->img = "../img/" . $img_name;
            }

            if ($id)
                $model->update(true, $attrs);
            else
                $model->save();
            return $this->redirect(Url::toRoute('index'));
        }

        return $this->render('edit', ['model' => $model]);
    }

    public function actionWatch($id = 1) {
        $model = Orders::find()->where(['id' => $id])->one();

        return $this->render('watch', ['model' => $model]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout() {
        return $this->render('about');
    }

}
