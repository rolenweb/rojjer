<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;
use app\models\ProfileTranslate;

class DefaultController extends Controller
{
	public $layout = 'exchange';

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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
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

    public function actionIndex()
    {
         if (!\Yii::$app->user->isGuest && Yii::$app->user->identity->type == 'admin') {

            $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

            return $this->render('index',[
                'modelprofile' => $modelprofile,
            
                ]);    
        }
        else{

            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelprofile($id)
    {
        if (($model = ProfileTranslate::find()->where(['id_user' => $this->findModeluser($id)->id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested profile does not exist.');
        }
    }
    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModeluser($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            
            throw new NotFoundHttpException('The requested user does not exist.');
        }
    }
}
