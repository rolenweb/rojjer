<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Orders4;
use app\modules\admin\models\Orders4Search;
use app\modules\admin\models\Orderready;
use app\models\User;
use app\models\ProfileTranslate;
use app\modules\exchange\models\Alerts;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
{

    public $layout = 'exchange';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!\Yii::$app->user->isGuest && Yii::$app->user->identity->type == 'admin') {
            $searchModel = new Orders4Search();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'modelprofile' => $modelprofile,
            ]);
        }
        else{
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Displays a single Orders model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (!\Yii::$app->user->isGuest && Yii::$app->user->identity->type == 'admin') {

            $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

            $modelorder = $this->findModel($id);

            $modelreadyorder = Orderready::find()->where(['id_order' => $id])->orderBy(['updated_at' => SORT_DESC])->one();

            return $this->render('view', [
                'model' => $modelorder,
                'modelprofile' => $modelprofile,
                'modelreadyorder' => $modelreadyorder,
            ]);
        }
        else{
            return $this->redirect(['/site/login']);
        }
    }

    

    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (!\Yii::$app->user->isGuest && Yii::$app->user->identity->type == 'admin') {

            $model = $this->findModel($id);

            $molelclient = $this->findModeluser($model->id_user);

            $oldstatusmodel = $model->status;

            if ($model->country2 != NULL) {
                    
                $arrcountry = explode(',', $model->country2);

                $arrcountry2 = array_slice ($arrcountry, 0, count($arrcountry)-1);
                    
                $model->country = $arrcountry2;
            }

            if ($model->load(Yii::$app->request->post())) {

                $model->srok=Yii::$app->formatter->asDate($model->srok, "php:Y-m-d");

                if ($model->country != '') {
                    $model->country2 = '';
                    foreach ($model->country as $value) {
                        $model->country2 = $value.','.$model->country2;
                    }
                }
                $model->country = '';

                if ($model->save()) {
                    if ($oldstatusmodel != $model->status) {
                        if ($model->status == 2) {
                            //create alert
                            $modelalerts = new Alerts();
                            $modelalerts->id_user = $model->id_user;
                            $modelalerts->id_order = $model->id;
                            $modelalerts->comment = 'Please edit your order ';
                            $modelalerts->status = 0;
                            $modelalerts->type = 0;
                            $modelalerts->save(false);
                             //create alert

                            //send email to client
                             Yii::$app->mailer->compose('orderEmail', ['user' =>$molelclient, 'order' =>$model])
                                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                                ->setTo($molelclient->email)
                                ->setSubject('Please edit your order ' . Yii::$app->name)
                                ->send();
                            //send email to client

                            Yii::$app->session->setFlash('info', 'The order is sent to the client for edition.');                                  
                        }
                        if ($model->status == 3) {
                            //create alert
                            $modelalerts = new Alerts();
                            $modelalerts->id_user = $model->id_user;
                            $modelalerts->id_order = $model->id;
                            $modelalerts->comment = 'Your order is active ';
                            $modelalerts->status = 0;
                            $modelalerts->type = 0;
                            $modelalerts->save(false);
                            //create alert
                            //send email to client
                             Yii::$app->mailer->compose('orderEmail', ['user' =>$molelclient, 'order' =>$model])
                                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                                ->setTo($molelclient->email)
                                ->setSubject('Your order is active ' . Yii::$app->name)
                                ->send();
                            //send email to client

                            Yii::$app->session->setFlash('info', 'Order is active.');                                  
                        }
                        if ($model->status == 4) {

                            $moleltransleter = $this->findModeluser($model->id_translater);

                            //create alert transleter
                            $modelalerts = new Alerts();
                            $modelalerts->id_user = $model->id_translater;
                            $modelalerts->id_order = $model->id;
                            $modelalerts->comment = 'The order requires revision: ';
                            $modelalerts->status = 0;
                            $modelalerts->type = 0;
                            $modelalerts->save(false);
                            //create alert transleter

                            //create alert client
                            $modelalerts = new Alerts();
                            $modelalerts->id_user = $model->id_user;
                            $modelalerts->id_order = $model->id;
                            $modelalerts->comment = 'Your order is sent to the translator for revision ';
                            $modelalerts->status = 0;
                            $modelalerts->type = 0;
                            $modelalerts->save(false);
                            //create alert client

                            //send email to translater
                             Yii::$app->mailer->compose('orderEmail', ['user' =>$moleltransleter, 'order' =>$model])
                                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                                ->setTo($moleltransleter->email)
                                ->setSubject('The order requires revision.' . Yii::$app->name)
                                ->send();
                            //send email to translater

                            //send email to client
                             Yii::$app->mailer->compose('orderEmail', ['user' =>$molelclient, 'order' =>$model])
                                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                                ->setTo($molelclient->email)
                                ->setSubject('Your order is sent to the translator for revision.' . Yii::$app->name)
                                ->send();
                            //send email to client
                            
                            Yii::$app->session->setFlash('info', 'The order is sent to the translator for revision.');                              
                        }
                        if ($model->status == 6) {

                            $moleltransleter = $this->findModeluser($model->id_translater);

                            //create alert transleter
                            $modelalerts = new Alerts();
                            $modelalerts->id_user = $model->id_translater;
                            $modelalerts->id_order = $model->id;
                            $modelalerts->comment = 'The order is sent to the client for verification ';
                            $modelalerts->status = 0;
                            $modelalerts->type = 0;
                            $modelalerts->save(false);
                            //create alert transleter

                            //create alert client
                            $modelalerts = new Alerts();
                            $modelalerts->id_user = $model->id_user;
                            $modelalerts->id_order = $model->id;
                            $modelalerts->comment = 'Your order is ready ';
                            $modelalerts->status = 0;
                            $modelalerts->type = 0;
                            $modelalerts->save(false);
                            //create alert client

                            //send email to translater
                             Yii::$app->mailer->compose('orderEmail', ['user' =>$moleltransleter, 'order' =>$model])
                                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                                ->setTo($moleltransleter->email)
                                ->setSubject('The order is sent to the client for verification.' . Yii::$app->name)
                                ->send();
                            //send email to translater

                            //send email to client
                             Yii::$app->mailer->compose('orderEmail', ['user' =>$molelclient, 'order' =>$model])
                                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                                ->setTo($molelclient->email)
                                ->setSubject('Your order is ready.' . Yii::$app->name)
                                ->send();
                            //send email to client
                            Yii::$app->session->setFlash('info', 'The order is sent to the client for verification.');                            
                        }

                    }
                    else{
                        Yii::$app->session->setFlash('info', 'Order is saved.');    
                    }
                    
                    return $this->redirect(['view', 'id' => $model->id]);
                }
                else{
                    Yii::$app->session->setFlash('error', 'Order is not saved.'); 
                        return $this->render('update', [
                        'model' => $model,
                    ]);
                }
                
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
        else{
            return $this->redirect(['/site/login']);
        }
    }

    

    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (!\Yii::$app->user->isGuest && Yii::$app->user->identity->type == 'admin') {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
        else{
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders4::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * Finds the Ready Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelreadyorder($id)
    {
        if (($model = Orderready::find()->where(['id_order' => $id])->orderBy(['updated_at' => SORT_DESC])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The ready order does not exist.');
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
