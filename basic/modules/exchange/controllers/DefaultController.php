<?php

namespace app\modules\exchange\controllers;

use Yii;
//use app\models\ChangePasswordForm;
use app\models\User;
use app\models\ProfileTranslate;
use app\models\ProfileClient;
use app\models\ContactForm;
use app\models\UploadForm;
use app\models\UploaddocsForm;
use app\models\UploadsummaryForm;
use app\models\ChangePasswordForm;
use app\modules\exchange\models\Recomendations;
use app\modules\exchange\models\Resume;
use app\modules\exchange\models\Orders4;
use app\modules\exchange\models\Orderready;
use app\modules\exchange\models\Orders4Search;
use app\modules\exchange\models\Myorders4Search;
use app\modules\exchange\models\Myorders4TSearch;
use app\modules\exchange\models\Zaivki;
use app\modules\exchange\models\Comments;
use app\modules\exchange\models\Alerts;
use app\modules\exchange\models\Balance;
use app\modules\exchange\models\Invoice;
use app\modules\exchange\models\Onlinemonitor;
use app\modules\exchange\models\OnlinemonitorSearch;
use app\modules\exchange\models\Aboutme;
use app\modules\exchange\models\Education;
use app\modules\exchange\models\WorkExperience;
use app\modules\exchange\models\BillingAddress;
use yii\web\NotFoundHttpException;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\helpers\Json;

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
        if (!\Yii::$app->user->isGuest) {

            $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

            $countalertsorder = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->count();

            $countalertsbalance = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 1])->count();

            $modelbalanceuser = Balance::find()->where(['id_user' => Yii::$app->user->identity->id])->one();


            return $this->render('index',[
                'modelprofile' => $modelprofile,
                'countalertsorder' => $countalertsorder,
                'modelbalanceuser' => $modelbalanceuser,
                'countalertsbalance' => $countalertsbalance,
                ]);    
        }
        else{

            return $this->redirect(['/site/login']);
        }
        
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    

   

    

    public function actionProfile($id)
    {


        if (!\Yii::$app->user->isGuest){
            
            
            $modelcurrentprofile = $this->findModelprofile(Yii::$app->user->identity->id);

            $modelprofile = $this->findModeltranslater($id);

            $modellestrecomendations = Recomendations::find()
                ->where(['id_user' => $id])
                ->all();

            $modellistresume = Resume::find()
                ->where(['id_user' => $id])
                ->all();

            $countalertsorder = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->count();

            $countalertsbalance = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 1])->count();

            $modelbalanceuser = Balance::find()->where(['id_user' => Yii::$app->user->identity->id])->one();
            

            if(Yii::$app->user->identity->id == $id) {

                if ($modelprofile->load(Yii::$app->request->post())) {

                    $modelprofile->birthday = Yii::$app->formatter->asDate($modelprofile->birthday, "php:Y-m-d");

                    if ($modelprofile->save()) {
                        
                        Yii::$app->session->setFlash('info', 'Your profile is updated.');
                    }
                    else{
                        Yii::$app->session->setFlash('error', 'We can not save your profile. Please contact us');
                    }
                    
                    return $this->refresh();
                }
                //create model avatar
                $modelavatar = new UploadForm();
                //create model avatar
                if ($modelavatar->load(Yii::$app->request->post())) {
                    $modelavatar->file = UploadedFile::getInstance($modelavatar, 'file');
                    if ($modelavatar->file) {                
                        $namefileavatar = 'avatar_'.Yii::$app->user->identity->id.'_'.time().'.'.$modelavatar->file->extension;
                        $modelprofile->photo = $namefileavatar;
                        $modelprofile->save();   
                    }
                    if ($modelavatar->file && $modelavatar->validate()) {                
                        $modelavatar->file->saveAs('images/avatar/original/'.$namefileavatar);

                        $imageavatar=Yii::$app->image->load('images/avatar/original/'.$namefileavatar);
                        $imageavatar->crop(400, 400);
                        $imageavatar->save('images/avatar/'.$namefileavatar, 100);

                        if (file_exists('images/avatar/original/'.$namefileavatar)) {
                            unlink('images/avatar/original/'.$namefileavatar);
                        }

                        Yii::$app->session->setFlash('info', 'Your photo is updated.');
                        return $this->refresh();
                    }
                }
                //create recomendation
                $modelrecomend = new Recomendations();
                //create recomendation
                if ($modelrecomend->load(Yii::$app->request->post())) {
                    $modelrecomend->file = UploadedFile::getInstance($modelrecomend, 'file');
                    if ($modelrecomend->file) {                
                        $namefilerecomend = 'recomendation_'.Yii::$app->user->identity->id.'_'.time().'.'.$modelrecomend->file->extension;
                        $modelrecomend->namefile = $namefilerecomend;
                        $modelrecomend->save();   
                    }
                    if ($modelrecomend->file && $modelrecomend->validate()) {                
                        $modelrecomend->file->saveAs('files/recomendation/'.$namefilerecomend);

                        
                        Yii::$app->session->setFlash('info', 'Your recomendation is added.');
                        return $this->refresh();
                    }
                }

                //create summary
                $modelsummary = new Resume();
                //create summary
                if ($modelsummary->load(Yii::$app->request->post())) {
                    $modelsummary->file = UploadedFile::getInstance($modelsummary, 'file');
                    if ($modelsummary->file) {                
                        $namefilesummary = 'summary_'.Yii::$app->user->identity->id.'_'.time().'.'.$modelsummary->file->extension;
                        
                        $modelsummary->namefile = $namefilesummary;
                        $modelsummary->save();   
                    }
                    if ($modelsummary->file && $modelsummary->validate()) {                
                        $modelsummary->file->saveAs('files/summary/'.$namefilesummary);

                        Yii::$app->session->setFlash('info', 'Your summary is added.');
                        return $this->refresh();
                    }
                }

                //create or update about me
                $model_aboutme = Aboutme::find()->where(['id_profile' => Yii::$app->user->identity->id])->one();
                //var_dump($model_aboutme);
                //die();
                if ($model_aboutme == NULL) {
                    $model_aboutme = new Aboutme();
                }
                if ($model_aboutme->load(Yii::$app->request->post())) {
                    $model_aboutme->id_profile = Yii::$app->user->identity->id;
                    if ($model_aboutme->save()) {
                        Yii::$app->session->setFlash('info', 'About me is saved.');
                        return $this->refresh();
                    }
                    

                        
                    
                }
                //create or update about me

                //create or update education
                $model_education = Education::find()->where(['id_profile' => Yii::$app->user->identity->id])->one();
                //var_dump($model_aboutme);
                //die();
                if ($model_education == NULL) {
                    $model_education = new Education();
                }
                if ($model_education->load(Yii::$app->request->post())) {
                    $model_education->id_profile = Yii::$app->user->identity->id;

                    if ($model_education->save()) {
                        Yii::$app->session->setFlash('info', 'Education is saved.');
                        return $this->refresh();
                    }
                    

                        
                    
                }
                //create or update about me

                //create or update work experience

                $model_workexperience = WorkExperience::find()->where(['id_profile' => Yii::$app->user->identity->id])->one();
                if ($model_workexperience !== NULL) {
                    if ($model_workexperience->category != NULL) {
                        $model_workexperience->category2 = Json::decode($model_workexperience->category);
                    }
                }
                
                
                
                if ($model_workexperience == NULL) {
                    $model_workexperience = new WorkExperience();
                }
                if ($model_workexperience->load(Yii::$app->request->post())) {
                    $model_workexperience->id_profile = Yii::$app->user->identity->id;
                    $model_workexperience->category = Json::encode($model_workexperience->category2);
                    $model_workexperience->category2 = 999;
                    if ($model_workexperience->save()) {
                        Yii::$app->session->setFlash('info', 'Work experience is saved.');
                        return $this->refresh();
                    }
                    
                }
                //create or update work experience

                $modelchagepass = new ChangePasswordForm(Yii::$app->user->identity->username);
                if ($modelchagepass->load(Yii::$app->request->post()) && $modelchagepass->validate() && $modelchagepass->resetPassword()) {
                    
                    
                    Yii::$app->session->setFlash('info', 'Your new password is saved.');
                    return $this->refresh();
                }

                //billing address
                if ($modelcurrentprofile->billingAddress == NULL) {
                    $new_billing_address = new BillingAddress();
                }
                else{
                    $new_billing_address = $modelcurrentprofile->billingAddress;
                }
                
                if ($new_billing_address->load(Yii::$app->request->post())) {

                    $new_billing_address->id_profile = $modelcurrentprofile->id;
                    if ($new_billing_address->save()) {

                        Yii::$app->session->setFlash('info', 'The billing address is saved.');
                        return $this->refresh();
                    }
                    

                        
                    
                }
                //billing address

                return $this->render('profile', [
                  'model' => $this->findModeluser($id),
                  'modelcurrentprofile' => $modelcurrentprofile,
                  'modelprofile' => $modelprofile,
                  'modelavatar' => $modelavatar,
                  'modelchagepass' => $modelchagepass,
                  'modelrecomend' => $modelrecomend,
                  'modelsummary' => $modelsummary,
                  'modellestrecomendations' => $modellestrecomendations,
                  'modellistresume' => $modellistresume,
                  
                  'countalertsorder' => $countalertsorder,
                  'countalertsbalance' => $countalertsbalance,
                  'modelbalanceuser' => $modelbalanceuser,
                  'model_aboutme' => $model_aboutme,
                  'model_education' => $model_education,
                  'model_workexperience' => $model_workexperience,
                  'new_billing_address' => $new_billing_address,
             ]);

            }
            else{
                return $this->render('profile', [
                  'model' => $this->findModeluser($id),
                  'modelprofile' => $modelprofile,
                  'modellestrecomendations' => $modellestrecomendations,
                  'modellistresume' => $modellistresume,
                  'modelcurrentprofile' => $modelcurrentprofile,
                  'countalertsorder' => $countalertsorder,
                  'countalertsbalance' => $countalertsbalance,
                  'modelbalanceuser' => $modelbalanceuser,
                  ]);
                  
            }
            
              
            
        }
        else{
            return $this->goHome();
        }
    }

    public function actionOrders()
    {
        if (!\Yii::$app->user->isGuest) {

            if (Yii::$app->user->identity->type == 'translater') {
                $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

                $myalerts = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->all();

                $countalertsorder = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->count();

                $countalertsbalance = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 1])->count();

                $modelbalanceuser = Balance::find()->where(['id_user' => Yii::$app->user->identity->id])->one();

                $searchModel = new Orders4Search();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return $this->render('orders',[
                    'modelprofile' => $modelprofile,
                    'dataProvider' => $dataProvider,
                    'countalertsorder' => $countalertsorder,
                    'countalertsbalance' => $countalertsbalance,
                    'modelbalanceuser' => $modelbalanceuser,
                    'myalerts' => $myalerts,
                    ]); 
            }
            else{
                return $this->redirect(['index']);
            }

               
        }
        else{

            return $this->redirect(['/site/login']);
        }
        
    }

    /**
     * Displays Orders model of current client.
     * @param integer $id
     * @return mixed
     */
    public function actionMyorders($id)
    {
        if (!\Yii::$app->user->isGuest) {

            $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

            $countalertsorder = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->count();

            $myalerts = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->all();

            $countalertsbalance = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 1])->count();

            $modelbalanceuser = Balance::find()->where(['id_user' => Yii::$app->user->identity->id])->one();

            if (Yii::$app->user->identity->id == $id && Yii::$app->user->identity->type == 'client') {
                $searchModel = new Myorders4Search();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

                return $this->render('myorders',[
                    'modelprofile' => $modelprofile,
                    'dataProvider' => $dataProvider,
                    'countalertsorder' => $countalertsorder,
                    'countalertsbalance' => $countalertsbalance,
                    'modelbalanceuser' => $modelbalanceuser,
                    'myalerts' => $myalerts,
                    ]);  
            }
            if (Yii::$app->user->identity->id == $id && Yii::$app->user->identity->type == 'translater') {

                $searchModel = new Myorders4TSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

                return $this->render('myorders',[
                    'modelprofile' => $modelprofile,
                    'dataProvider' => $dataProvider,
                    'countalertsorder' => $countalertsorder,
                    'countalertsbalance' => $countalertsbalance,
                    'modelbalanceuser' => $modelbalanceuser,
                    'myalerts' => $myalerts,
                    ]);  
            }
            else{
                return $this->redirect(['index']);
            }

              
        }
        else{

            return $this->redirect(['/site/login']);
        }
        
    }

     /**
     * Displays Monitor models of current client.
     * @param integer $id
     * @return mixed
     */
    public function actionMonitoring($id)
    {
        if (!\Yii::$app->user->isGuest) {

            $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

            $modelsorderuser = Orders4::find()->where(['id_user' => Yii::$app->user->identity->id])->all();

            $countalertsorder = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->count();

            $myalerts = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->all();

            $countalertsbalance = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 1])->count();

            $modelbalanceuser = Balance::find()->where(['id_user' => Yii::$app->user->identity->id])->one();

            if (Yii::$app->user->identity->id == $id && Yii::$app->user->identity->type == 'client') {
                $searchModel = new OnlinemonitorSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

                return $this->render('monitoring',[
                    'modelprofile' => $modelprofile,
                    'dataProvider' => $dataProvider,
                    'countalertsorder' => $countalertsorder,
                    'countalertsbalance' => $countalertsbalance,
                    'modelbalanceuser' => $modelbalanceuser,
                    'myalerts' => $myalerts,
                    'modelsorderuser' => $modelsorderuser,
                    ]);  
            }
            else{
                return $this->redirect(['index']);
            }

              
        }
        else{

            return $this->redirect(['/site/login']);
        }
        
    }

     /**
     * Displays Monitor models of current client.
     * @param integer $id
     * @return mixed
     */
    public function actionViewmonitor($id)
    {
        if (!\Yii::$app->user->isGuest) {

            $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

            $modelmonitor = $this->findModelmonitor($id);

            $modelorderuser = Orders4::find()->where(['id_user' => $modelmonitor->id_user])->one();

            $countalertsorder = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->count();

            $myalerts = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->all();

            $countalertsbalance = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 1])->count();

            $modelbalanceuser = Balance::find()->where(['id_user' => Yii::$app->user->identity->id])->one();

            if (Yii::$app->user->identity->id == $modelmonitor->id_user && Yii::$app->user->identity->type == 'client') {
                


                return $this->render('viewmonitor',[
                    'modelprofile' => $modelprofile,
                    'modelmonitor' => $modelmonitor,
                    'countalertsorder' => $countalertsorder,
                    'countalertsbalance' => $countalertsbalance,
                    'modelbalanceuser' => $modelbalanceuser,
                    'myalerts' => $myalerts,
                    'modelorderuser' => $modelorderuser,
                    ]);  
            }
            else{
                return $this->redirect(['index']);
            }

              
        }
        else{

            return $this->redirect(['/site/login']);
        }
        
    }

     /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     */
    public function actionVieworder($id)
    {
        if (!\Yii::$app->user->isGuest) {
            $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

            $modelorder = $this->findModelorder($id);



            if ($modelprofile->level >= $modelorder->level ||  Yii::$app->user->identity->id == $modelorder->id_user) {    

                $modeluser = $this->findModeluser($modelorder->id_user);

                $listzaivki = Zaivki::find()->where(['id_order' => $modelorder->id])->all();

                $listcomments = Comments::find()->where(['id_order' => $modelorder->id])->all();

                $countalertsorder = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->count();

                $countalertsbalance = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 1])->count();

                $modelbalanceuser = Balance::find()->where(['id_user' => Yii::$app->user->identity->id])->one();

                $modelcomment = new Comments();

                if ($modelcomment->load(Yii::$app->request->post())) {
                    $modelcomment->id_order =  $modelorder->id;
                    $modelcomment->id_user =  Yii::$app->user->identity->id;                                      
                    $modelcomment->username =  Yii::$app->user->identity->username;                                      
                    $modelcomment->avatar =  $modelprofile->photo;                                      
                    $modelcomment->status = 1;
                    if($modelcomment->save()){
                        Yii::$app->session->setFlash('info','Thanks for your comment');
                        return $this->refresh(); 
                    }
                    else{
                        Yii::$app->session->setFlash('error','Opps! Your can not comment for this order. Please contact us');  
                        return $this->refresh(); 
                    }
                }
               

                if (Yii::$app->user->identity->type == 'translater') {
                    if ($modelorder->status == 3) {
                        
                        $newmodelzaivki = new Zaivki();



                        if ($newmodelzaivki->load(Yii::$app->request->post())) {
                            $newmodelzaivki->id_order =  $modelorder->id;
                            $newmodelzaivki->id_user =  Yii::$app->user->identity->id;                                      
                            $newmodelzaivki->username =  Yii::$app->user->identity->username;                                      
                            $newmodelzaivki->avatar =  $modelprofile->photo;                                      
                            $newmodelzaivki->status = 0;
                            if($newmodelzaivki->save()){
                                //create alert
                                $modelalerts = new Alerts();
                                $modelalerts->id_user = $modelorder->id_user;
                                $modelalerts->id_order = $modelorder->id;
                                $modelalerts->comment = 'New request for order';
                                $modelalerts->status = 0;
                                $modelalerts->type = 0;
                                $modelalerts->save(false);
                                //create alert

                                //send email to client
                                $subject = 'New request for your order';
                                $body = 'New request for your order';
                                $this->sendAletemail($subject, $body, $modeluser);
                                //send email to client

                                Yii::$app->session->setFlash('info','Your request has been sent successfully');
                                return $this->refresh(); 
                            }
                            else{
                                Yii::$app->session->setFlash('error','Opps! Your can not send request for this order. Please contact us');  
                                return $this->refresh(); 
                            }
                        }

                        

                        


                        return $this->render('vieworder', [
                            'modelorder' => $this->findModelorder($id),
                            'modelprofile' => $modelprofile,
                            'newmodelzaivki' => $newmodelzaivki,
                            'listzaivki' => $listzaivki,
                            'modelcomment' => $modelcomment,
                            'listcomments' => $listcomments,
                            'countalertsorder' => $countalertsorder,
                            'countalertsbalance' => $countalertsbalance,
                            'modelbalanceuser' => $modelbalanceuser,
                        ]);    
                    }
                    if ($modelorder->status == 4) {

                        $modelorderready = new Orderready();

                        $modelonlinemonitor = Onlinemonitor::find()->where(['id_order' => $modelorder->id])->one();
                        if ($modelonlinemonitor == NULL) {
                            $modelonlinemonitor = new Onlinemonitor();
                        }
                        

                        $statusorder = false;
                        if ($modelorderready->load(Yii::$app->request->post())) {
                                $modelorderready->file = UploadedFile::getInstance($modelorderready, 'file');
                                if ($modelorderready->file) {                
                                    $namefileorderready = Yii::$app->user->identity->id.'_'.time().'.'.$modelorderready->file->extension;

                                    $modelorderready->filename = $namefileorderready;

                                    $modelorder->filenameready = $namefileorderready;
                                    
                                }
                                
                                $modelorderready->id_order = $modelorder->id;

                                $modelorderready->id_user = $modelorder->id_user;

                                $modelorderready->id_translater = $modelorder->id_translater;

                                if ($modelorderready->text !== NULL) {
                                    $modelorder->textready = $modelorderready->text;
                                }

                                                            
                                if($modelorderready->save()){
                                    $modelorder->status = 5;

                                    if($modelorder->save()){
                                        //create alert
                                        $modelalerts = new Alerts();
                                        $modelalerts->id_user = $modelorder->id_user;
                                        $modelalerts->id_order = $modelorder->id;
                                        $modelalerts->comment = 'Your order is sent to checking of admin';
                                        $modelalerts->status = 0;
                                        $modelalerts->type = 0;
                                        $modelalerts->save(false);
                                        //create alert

                                        //send email
                                        $subject = 'Your order is sent to checking of admin';
                                        $body = 'Your order is sent to checking of admin';
                                        $modeluser = $this->findModeluser($modelorder->id_user);
                                        $this->sendAletemail($subject, $body, $modeluser);
                                        //send email
                              
                                        Yii::$app->session->setFlash('info','The order is sent to checking of admin');
                                        $statusorder = true;
                                    }
                                    else{
                                        Yii::$app->session->setFlash('error','Opps! Your work is not sent. Please contact us');   
                                    }

                                    
                                }
                                else{
                                    Yii::$app->session->setFlash('error','Opps! Your work is not save. Please contact us');   
                                }
                                if ($modelorderready->file && $modelorderready->validate()) {                
                                    $modelorderready->file->saveAs('files/orders/'.$namefileorderready);
                                }
                                if ($statusorder == true) {
                                    return $this->redirect(['vieworder', 'id' => $modelorder->id]);
                                }
                                else{
                                   return $this->refresh(); 
                                }
                                
                        }
                        //load model online monitor
                        if ($modelonlinemonitor->load(Yii::$app->request->post())) {
                            $modelonlinemonitor->file = UploadedFile::getInstance($modelonlinemonitor, 'file');
                            if ($modelonlinemonitor->file) {                
                                $namefilonlinemonitor = Yii::$app->user->identity->id.'_'.time().'.'.$modelonlinemonitor->file->extension;
                                $modelonlinemonitor->filename = $namefilonlinemonitor;
                            }
                            $modelonlinemonitor->id_order = $modelorder->id;
                            $modelonlinemonitor->id_user = $modelorder->id_user;
                            $modelonlinemonitor->id_translater = $modelorder->id_translater;
                            $statusonlinemonitor = false;
                            if($modelonlinemonitor->save()){
                                //create alert
                                $modelalerts = new Alerts();
                                $modelalerts->id_user = $modelorder->id_user;
                                $modelalerts->id_order = $modelorder->id;
                                $modelalerts->comment = 'Transleter done '.$modelonlinemonitor->done.'% of the order';
                                $modelalerts->status = 0;
                                $modelalerts->type = 0;
                                $modelalerts->save(false);
                                //create alert

                                //send email
                                $subject = 'Transleter done '.$modelonlinemonitor->done.'% of the order';
                                $body = 'Transleter done '.$modelonlinemonitor->done.'% of the order';
                                $modeluser = $this->findModeluser($modelorder->id_user);
                                $this->sendAletemail($subject, $body, $modeluser);
                                //send email
                              
                                Yii::$app->session->setFlash('info',$modelonlinemonitor->done.'% of the order is sent to client');
                                $statusonlinemonitor = true;
                            }
                            else{
                                Yii::$app->session->setFlash('error','Opps! Your intermediate work is not save. Please contact us');   
                            }
                            if ($modelonlinemonitor->file && $modelonlinemonitor->validate()) {                
                                $modelonlinemonitor->file->saveAs('files/orders/'.$namefilonlinemonitor);
                            }
                            if ($statusonlinemonitor == true) {
                                return $this->redirect(['vieworder', 'id' => $modelorder->id]);
                            }
                            else{
                                return $this->refresh(); 
                            }

                        }
                        //load model online monitor

                        return $this->render('vieworder', [
                            'modelorder' => $this->findModelorder($id),
                            'modelprofile' => $modelprofile,
                            'modelcomment' => $modelcomment,
                            'listcomments' => $listcomments,
                            'countalertsorder' => $countalertsorder,
                            'countalertsbalance' => $countalertsbalance,
                            'modelbalanceuser' => $modelbalanceuser,
                            'modelorderready' => $modelorderready,
                            'modelonlinemonitor' => $modelonlinemonitor,
                        ]); 
                    }
                    return $this->render('vieworder', [
                            'modelorder' => $this->findModelorder($id),
                            'modelprofile' => $modelprofile,
                            'listzaivki' => $listzaivki,
                            'modelcomment' => $modelcomment,
                            'listcomments' => $listcomments,
                            'countalertsorder' => $countalertsorder,
                            'countalertsbalance' => $countalertsbalance,
                            'modelbalanceuser' => $modelbalanceuser,
                        ]);    
                    
                }
                else{
                        return $this->render('vieworder', [
                            'modelorder' => $this->findModelorder($id),
                            'modelprofile' => $modelprofile,
                            'listzaivki' => $listzaivki,
                            'modelcomment' => $modelcomment,
                            'listcomments' => $listcomments,
                            'countalertsorder' => $countalertsorder,
                            'countalertsbalance' => $countalertsbalance,
                            'modelbalanceuser' => $modelbalanceuser,
                        ]);    
                }
            }
            else{
                return $this->redirect(['index']);
            }
            
        }
        else{
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     */
    public function actionEditorder($id)
    {
        

        if (!\Yii::$app->user->isGuest) {
            $modelorder = $this->findModelorder($id);
            if (Yii::$app->user->identity->id == $modelorder->id_user) {

                $countalertsorder = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->count();

                $countalertsbalance = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 1])->count();

                $modelbalanceuser = Balance::find()->where(['id_user' => Yii::$app->user->identity->id])->one();

                $statusorder = false;

                if ($modelorder->country2 != NULL) {
                    
                    $arrcountry = explode(',', $modelorder->country2);

                    $arrcountry2 = array_slice ($arrcountry, 0, count($arrcountry)-1);
                    
                    $modelorder->country = $arrcountry2;
                }
                

                if ($modelorder->load(Yii::$app->request->post())) {
                        $modelorder->file = UploadedFile::getInstance($modelorder, 'file');
                        if ($modelorder->file) {                
                            $namefileorder = Yii::$app->user->identity->id.'_'.time().'.'.$modelorder->file->extension;

                            $modelorder->filename = $namefileorder;
                            
                        }
                        
                        $modelorder->srok=Yii::$app->formatter->asDate($modelorder->srok, "php:Y-m-d");

                        $modelorder->status = 1;    

                        if ($modelorder->country != '') {
                            $modelorder->country2 = '';
                            foreach ($modelorder->country as $value) {
                                $modelorder->country2 = $value.','.$modelorder->country2;
                            }
                        }
                        
                        $modelorder->country = '';                    
                        
                        if($modelorder->save()){

                            
                            Yii::$app->session->setFlash('info','Your order is sent to moderation');
                            $statusorder = true;
                        }
                        else{
                            Yii::$app->session->setFlash('error','Opps! Your order is not saved. Please contact us');   
                        }
                        if ($modelorder->file && $modelorder->validate()) {                
                            $modelorder->file->saveAs('files/orders/'.$namefileorder);

                            

                            
                            //return $this->refresh();
                        }
                        if ($statusorder == true) {
                            return $this->redirect(['vieworder', 'id' => $modelorder->id]);
                        }
                        else{
                           return $this->refresh(); 
                        }
                        
                }

                $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

                return $this->render('editorder', [
                    'modelorder' =>$modelorder,
                    'modelprofile' => $modelprofile,
                    'countalertsorder' => $countalertsorder,
                    'countalertsbalance' => $countalertsbalance,
                    'modelbalanceuser' => $modelbalanceuser,
                ]);
            }
            else{
                return $this->redirect(['index']);
            }
            
        }
        else{
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Approve request for order.
     * @param integer $id
     * @return mixed
     */
    public function actionApproverequest($id)
    {


        if (!\Yii::$app->user->isGuest) {
            $modezaivki = $this->findModelzaivki($id);

            $modelorder = $this->findModelorder($modezaivki->id_order);



            

             if (Yii::$app->user->identity->id == $modelorder->id_user) {
                $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

                $modezaivki->status = 1;
                if($modezaivki->save(false)){
                    
                    //create alert
                    $modelalerts = new Alerts();
                    $modelalerts->id_user = $modezaivki->id_user;
                    $modelalerts->id_order = $modelorder->id;
                    $modelalerts->comment = 'Your request is approve';
                    $modelalerts->status = 0;
                    $modelalerts->type = 0;
                    $modelalerts->save(false);
                    //create alert

                    //send email
                    $subject = 'Your request is approve';
                    $body = 'Your request is approve';
                    $modeluser = $this->findModeluser($modezaivki->id_user);
                    $this->sendAletemail($subject, $body, $modeluser);
                    //send email

                    Yii::$app->session->setFlash('info','This translater is approved');
                    return $this->redirect(Yii::$app->request->referrer);
                }
                else{
                    Yii::$app->session->setFlash('error','Opps! This translater is not approved for this order. Please contact us'); 
                    return $this->redirect(Yii::$app->request->referrer);
                }

                
                
            }
            else{
                return $this->redirect(['index']);
            }
        }
        else{
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Approve request for order.
     * @param integer $id
     * @return mixed
     */
    public function actionAlerts($id,$type = NULL)
    {
        

        if (!\Yii::$app->user->isGuest) {
            $modelprofile = $this->findModelprofile($id);
             if (Yii::$app->user->identity->id == $modelprofile->id_user) {
                
                if ($type != NULL) {

                    $modellistalert = Alerts::find()->where(['id_user' => $id, 'type' => $type])->orderBy(['updated_at' => SORT_DESC])->all();                    
                }
                else{
                    $modellistalert = Alerts::find()->where(['id_user' => $id])->orderBy(['updated_at' => SORT_DESC])->all();                    
                }   

                $models_order = Orders4::find()->where(['or',['id_user' => $id],['id_translater' => $id]])->select(['id','title'])->all();

                $countalertsorder = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->count();

                $countalertsbalance = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 1])->count();

                $modelbalanceuser = Balance::find()->where(['id_user' => Yii::$app->user->identity->id])->one();

                foreach ($modellistalert as $value) {
                    $value->status = 1;
                    $value->save();
                }

                return $this->render('alerts',[
                'modelprofile' => $modelprofile,
                'modellistalert' => $modellistalert,
                'countalertsorder' => $countalertsorder,
                'countalertsbalance' => $countalertsbalance,
                'modelbalanceuser' => $modelbalanceuser,
                'models_order' => $models_order,
                ]);

                
                
            }
            else{
                return $this->redirect(['index']);
            }
        }
        else{
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Delete alert.
     * @param integer $id
     * @return mixed
     */
    public function actionAlertdelete($id)
    {
        

        if (!\Yii::$app->user->isGuest) {

            $modelalert = $this->findModelalert($id);

            $modelprofile = $this->findModelprofile($modelalert->id_user);

             if (Yii::$app->user->identity->id == $modelprofile->id_user) {
                
                $modelalert->delete();

                Yii::$app->session->setFlash('info','The alert is deleted');
                return $this->redirect(Yii::$app->request->referrer);
                
            }
            else{
                return $this->redirect(['index']);
            }
        }
        else{
            return $this->redirect(['/site/login']);
        }
    }


     /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     */
    public function actionModeration($id)
    {
        $modelorder = $this->findModelorder($id);

        if (!\Yii::$app->user->isGuest) {
             if (Yii::$app->user->identity->id == $modelorder->id_user) {
                $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

                $modelorder->status = 1;
                if($modelorder->save(false)){
                    Yii::$app->session->setFlash('info','Your order is sent for moderation');
                }
                else{
                    Yii::$app->session->setFlash('error','Opps! Your order is not sent for moderation. Please contact us');  
                }


                return $this->redirect(Yii::$app->request->referrer);
            }
        }
        else{
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     */
    public function actionCancelorder($id)
    {
        $modelorder = $this->findModelorder($id);

        if (!\Yii::$app->user->isGuest) {
             if (Yii::$app->user->identity->id == $modelorder->id_translater) {

                $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

                $modelzaivki = Zaivki::find()->where(['id_order' => $id, 'id_user' => Yii::$app->user->identity->id, 'status' => 1])->one();

                $modelorder->status = 3;

                $modelorder->totalcost = $modelorder->cost;

                $modelorder->id_translater = 0;

                $modelorder->username = '';

                $banalceclient = Balance::find()->where(['id_user' => $modelorder->id_user])->one();

                $banalcetranslater = Balance::find()->where(['id_user' => $modelzaivki->id_user])->one();


                        
                //balance client
                $newbalance = $banalceclient->balance + $modelzaivki->price;
                $newhold = $banalceclient->hold - $modelzaivki->price;
                $banalceclient->balance = $newbalance;
                $banalceclient->hold = $newhold;
                $banalceclient->save();
                //balance client

                //balance translater
                $newhold = $banalcetranslater->hold - $modelzaivki->price;
                $banalcetranslater->hold = $newhold;
                $banalcetranslater->save();
                //balance translater

                        
                

                //create alert
                $modelalerts = new Alerts();
                $modelalerts->id_user = $modelorder->id_user;
                $modelalerts->id_order = $modelorder->id;
                $modelalerts->comment = '$'.$modelzaivki->price.' is credited back to your RoJJoR account';
                $modelalerts->status = 0;
                $modelalerts->type = 1;
                $modelalerts->save(false);
                //create alert

                //create alert
                $modelalerts = new Alerts();
                $modelalerts->id_user = $modelorder->id_user;
                $modelalerts->id_order = $modelorder->id;
                $modelalerts->comment = 'Translater cancel order';
                $modelalerts->status = 0;
                $modelalerts->type = 0;
                $modelalerts->save(false);
                //create alert

                //send email
                $subject = 'Translater cancel order';
                $body = 'Translater cancel order';
                $modeluser = $this->findModeluser($modelorder->id_user);
                $this->sendAletemail($subject, $body, $modeluser);
                //send email

                //create alert
                $modelalerts = new Alerts();
                $modelalerts->id_user = $modelzaivki->id_user;
                $modelalerts->id_order = $modelorder->id;
                $modelalerts->comment = '$'.$modelzaivki->price.' are credited back to your RoJJoR account';
                $modelalerts->status = 0;
                $modelalerts->type = 1;
                $modelalerts->save(false);
                //create alert

                //create alert
                $modelalerts = new Alerts();
                $modelalerts->id_user = $modelzaivki->id_user;
                $modelalerts->id_order = $modelorder->id;
                $modelalerts->comment = 'You cancel order';
                $modelalerts->status = 0;
                $modelalerts->type = 0;
                $modelalerts->save(false);
                //create alert

                //change status zaivki
                $modelzaivki->status = -1;
                $modelzaivki->save(false);
                //change status zaivki

                if($modelorder->save(false)){
                    Yii::$app->session->setFlash('info','The order is canceled');
                }
                else{
                    Yii::$app->session->setFlash('error','Opps! Your order is not canceled. Please contact us');  
                }


                return $this->redirect(['index']);
            }
        }
        else{
            return $this->redirect(['/site/login']);
        }
    }

     /**
     * Create a Revision model.
     * @param integer $id
     * @return mixed
     */
    public function actionRevision($id)
    {
        
        if (!\Yii::$app->user->isGuest) {

            $modelorder = $this->findModelorder($id);
            $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

            if ($modelorder->load(Yii::$app->request->post())) {

                $modelorder->status = 7;

                if($modelorder->save(false)){
                    Yii::$app->session->setFlash('info','Your order is sent for revision');
                }
                else{
                    Yii::$app->session->setFlash('error','Opps! Your order is not sent for revision. Please contact us');  
                }

                return $this->redirect(Yii::$app->request->referrer);

            }
            else{
                $modelorder->status = 7;

                if($modelorder->save(false)){
                    Yii::$app->session->setFlash('info','Your order is sent for revision');
                }
                else{
                    Yii::$app->session->setFlash('error','Opps! Your order is not sent for revision. Please contact us');  
                }

                return $this->redirect(Yii::$app->request->referrer);
            }

            
        }
        else{
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     */
    public function actionPayorder($id)
    {
        $modelorder = $this->findModelorder($id);

        if (!\Yii::$app->user->isGuest) {
            if (Yii::$app->user->identity->id == $modelorder->id_user) {
                
                $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);
                

                if ($modelorder->status == 6) {
                    

                    $modelorder->status = 8;
                    if($modelorder->save(false)){

                        $banalceclient = Balance::find()->where(['id_user' => $modelorder->id_user])->one();

                        $banalcetranslater = Balance::find()->where(['id_user' => $modelorder->id_translater])->one();
                        
                        //balance client
                        $newhold = $banalceclient->hold - $modelorder->totalcost;
                        $banalceclient->hold = $newhold;
                        //balance client

                        //balance translater
                        $newbalance = $banalcetranslater->balance + $modelorder->totalcost;
                        $newhold = $banalcetranslater->hold - $modelorder->totalcost;
                        $banalcetranslater->balance = $newbalance;
                        $banalcetranslater->hold = $newhold;
                        //balance translater

                        

                        if ($banalceclient->save() && $banalcetranslater->save()) {
                            //create to client alert
                            $modelalerts = new Alerts();
                            $modelalerts->id_user = $modelorder->id_user;
                            $modelalerts->id_order = $modelorder->id;
                            $modelalerts->comment = 'Your order is paid';
                            $modelalerts->status = 0;
                            $modelalerts->type = 0;
                            $modelalerts->save(false);
                            //create to client alert

                            //send email to client
                            $subject = 'Your order is paid';
                            $body = 'Your order is paid';
                            $modeluser = $this->findModeluser($modelorder->id_user);
                            $this->sendAletemail($subject, $body, $modeluser);
                            //send email to client

                            //create alert to tranlslater
                            $modelalerts = new Alerts();
                            $modelalerts->id_user = $modelorder->id_translater;
                            $modelalerts->id_order = $modelorder->id;
                            $modelalerts->comment = 'Order is paid';
                            $modelalerts->status = 0;
                            $modelalerts->type = 0;
                            $modelalerts->save(false);
                            //create alert to tranlslater

                            //send email to client
                            $subject = 'Order is paid';
                            $body = 'Order is paid';
                            $modeluser = $this->findModeluser($modelorder->id_translater);
                            $this->sendAletemail($subject, $body, $modeluser);
                            //send email to client


                            Yii::$app->session->setFlash('info','Your order is paid');
                        }
                        else{
                            Yii::$app->session->setFlash('error','Opps! Your order is not paid.');  
                        }
                        

                        
                    }
                    else{
                        Yii::$app->session->setFlash('error','Opps! Your order is not paid. Please contact us');  
                    }


                    return $this->redirect(Yii::$app->request->referrer);  
                }
                else{
                 
                    return $this->redirect(['index']);
                }
                
            }
        }
        else{
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     */
    public function actionStoporder($id)
    {
        $modelorder = $this->findModelorder($id);

        if (!\Yii::$app->user->isGuest) {
             if (Yii::$app->user->identity->id == $modelorder->id_user) {
                if ($modelorder->status < 4) {
                    $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

                    $modelorder->status = -1;
                    if($modelorder->save(false)){
                        Yii::$app->session->setFlash('info','Your order is stopped');
                    }
                    else{
                        Yii::$app->session->setFlash('error','Opps! Your order is not sent for moderation. Please contact us');  
                    }


                    return $this->render('vieworder', [
                        'modelorder' => $this->findModelorder($id),
                        'modelprofile' => $modelprofile,
                    ]);    
                }
                else{
                    Yii::$app->session->setFlash('error','Opps! Your order in working and so you can not stop it');  
                    return $this->redirect(['index']);
                }
                
            }
        }
        else{
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Translater take order.
     * @param integer $id
     * @return mixed
     */
    public function actionTakeorder($id)
    {
        $modelorder = $this->findModelorder($id);

        $modelzaivki = Zaivki::find()->where(['id_order' => $id, 'id_user' => Yii::$app->user->identity->id, 'status' => 1])->one();

        if (!\Yii::$app->user->isGuest && Yii::$app->user->identity->type == 'translater' && $modelzaivki != NULL) {

            if ($modelorder->status == 3) {
                    $banalceclient = Balance::find()->where(['id_user' => $modelorder->id_user])->one();

                    if ($banalceclient->balance >= $modelzaivki->price) {
                        $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

                        $modelorder->status = 4;

                        $modelorder->id_translater = Yii::$app->user->identity->id;

                        $modelorder->username = Yii::$app->user->identity->username;

                        $modelorder->totalcost = $modelzaivki->price;

                        $banalceclient = Balance::find()->where(['id_user' => $modelorder->id_user])->one();

                        $banalcetranslater = Balance::find()->where(['id_user' => $modelzaivki->id_user])->one();
                        
                        //balance client
                        $newbalance = $banalceclient->balance - $modelzaivki->price;
                        $newhold = $banalceclient->hold + $modelzaivki->price;
                        $banalceclient->balance = $newbalance;
                        $banalceclient->hold = $newhold;
                        $banalceclient->save();
                        //balance client

                        //balance translater
                        $newhold = $banalcetranslater->hold + $modelzaivki->price;
                        $banalcetranslater->hold = $newhold;
                        $banalcetranslater->save();
                        //balance translater

                        

                        //create alert
                        $modelalerts = new Alerts();
                        $modelalerts->id_user = $modelorder->id_user;
                        $modelalerts->id_order = $modelorder->id;
                        $modelalerts->comment = '$'.$modelzaivki->price.' is holded';
                        $modelalerts->status = 0;
                        $modelalerts->type = 1;
                        $modelalerts->save(false);
                        //create alert

                        //create alert
                        $modelalerts = new Alerts();
                        $modelalerts->id_user = $modelorder->id_user;
                        $modelalerts->id_order = $modelorder->id;
                        $modelalerts->comment = 'Translater took order';
                        $modelalerts->status = 0;
                        $modelalerts->type = 0;
                        $modelalerts->save(false);
                        //create alert

                        //send email
                        $subject = 'Translater took order';
                        $body = 'Translater took order';
                        $modeluser = $this->findModeluser($modelorder->id_user);
                        $this->sendAletemail($subject, $body, $modeluser);
                        //send email
                        

                        //create alert
                        $modelalerts = new Alerts();
                        $modelalerts->id_user = $modelzaivki->id_user;
                        $modelalerts->id_order = $modelorder->id;
                        $modelalerts->comment = '$'.$modelzaivki->price.' is holded';
                        $modelalerts->status = 0;
                        $modelalerts->type = 1;
                        $modelalerts->save(false);
                        //create alert

                        //create alert
                        $modelalerts = new Alerts();
                        $modelalerts->id_user = $modelzaivki->id_user;
                        $modelalerts->id_order = $modelorder->id;
                        $modelalerts->comment = 'You took order';
                        $modelalerts->status = 0;
                        $modelalerts->type = 0;
                        $modelalerts->save(false);
                        //create alert

                        

                        if($modelorder->save(false)){
                            Yii::$app->session->setFlash('info','You took the order');
                        }
                        else{
                            Yii::$app->session->setFlash('error','Opps! You can not take this order. Please contact us.');  
                        }

                        return $this->redirect(['vieworder', 'id' => $modelorder->id]);
                        
                    }
                    else{
                        Yii::$app->session->setFlash('error','Opps! You can not take this order. Please contact support.');  
                        //create alert
                        $modelalerts = new Alerts();
                        $modelalerts->id_user = $modelorder->id_user;
                        $modelalerts->id_order = $modelorder->id;
                        $modelalerts->comment = 'Your balance is low, and so translater can not take order.';
                        $modelalerts->status = 0;
                        $modelalerts->type = 1;
                        $modelalerts->save(false);
                        //create alert

                        //send email
                        $subject = 'Your balance is low, and so translater can not take order.';
                        $body = 'Your balance is low, and so translater can not take order.';
                        $modeluser = $this->findModeluser($modelorder->id_user);
                        $this->sendAletemail($subject, $body, $modeluser);
                        //send email
                    }

                    return $this->redirect(['vieworder', 'id' => $modelorder->id]);
                      
                }
                else{
                    Yii::$app->session->setFlash('error','Opps! You can not take this order');  
                    return $this->redirect(['index']);
                }
                
            
        }
        else{
            return $this->redirect(['/site/login']);
        }
    }

   

    public function actionAddorder(){
        if (!\Yii::$app->user->isGuest && Yii::$app->user->identity->type == 'client') {

            $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

            $countalertsorder = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->count();

            $countalertsbalance = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 1])->count();

            $modelbalanceuser = Balance::find()->where(['id_user' => Yii::$app->user->identity->id])->one();

            $modelneworder = new Orders4();
            $statusorder = false;
            if ($modelneworder->load(Yii::$app->request->post())) {
                    $modelneworder->file = UploadedFile::getInstance($modelneworder, 'file');
                    if ($modelneworder->file) {                
                        $namefileorder = Yii::$app->user->identity->id.'_'.time().'.'.$modelneworder->file->extension;

                        $modelneworder->filename = $namefileorder;
                        
                    }
                    
                    $modelneworder->srok=Yii::$app->formatter->asDate($modelneworder->srok, "php:Y-m-d");

                    $modelneworder->status = 1;

                    //var_dump($modelneworder->country);

                    
                    if ($modelneworder->country != '') {
                        foreach ($modelneworder->country as $value) {
                            $modelneworder->country2 = $value.','.$modelneworder->country2;
                        }

                        

                       
                    }
                    
                    $modelneworder->country = '';
                    
                    
                    if($modelneworder->save()){

                        
                        Yii::$app->session->setFlash('info','Your order has been sent to our staff to be reviewed. You will be informed once the projects status is updated');
                        $statusorder = true;
                    }
                    else{
                        Yii::$app->session->setFlash('error','Opps! Your order is not saved. Please contact us');   
                    }
                    if ($modelneworder->file && $modelneworder->validate()) {                
                        $modelneworder->file->saveAs('files/orders/'.$namefileorder);

                        

                        
                        //return $this->refresh();
                    }
                    if ($statusorder == true) {
                        return $this->redirect(['orderok', 'id' => $modelneworder->id]);
                        return $this->render('orderok',[
                            'modelneworder' => $modelneworder,
                            'modelprofile' => $modelprofile,
                            'countalertsorder' => $countalertsorder,
                            'modelbalanceuser' => $modelbalanceuser,
                            'countalertsbalance' => $countalertsbalance,
                            ]);
                    }
                    else{
                       return $this->refresh(); 
                    }
                    
            }
            
           return $this->render('addorder',[
                            'modelneworder' => $modelneworder,
                            'modelprofile' => $modelprofile,
                            'countalertsorder' => $countalertsorder,
                            'modelbalanceuser' => $modelbalanceuser,
                            'countalertsbalance' => $countalertsbalance,
                            ]);

        }
        else{
            return $this->goHome();
        }


    }

    public function actionOtherorder($id){
        if (!\Yii::$app->user->isGuest && Yii::$app->user->identity->type == 'client') {

            $modelorder = $this->findModelorder($id);

            if (Yii::$app->user->identity->id == $modelorder->id_user) {
                $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

                $countalertsorder = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->count();

                $countalertsbalance = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 1])->count();

                $modelbalanceuser = Balance::find()->where(['id_user' => Yii::$app->user->identity->id])->one();

                $modelneworder = new Orders4();

                $modelneworder->title =  $modelorder->title;          

                $modelneworder->lang_from =  $modelorder->lang_from;          

                $modelneworder->category =  $modelorder->category;          

                $modelneworder->text =  $modelorder->text;          

                $modelneworder->filename =  $modelorder->filename;  

                if ($modelorder->country2 != NULL) {
                    
                    $arrcountry = explode(',', $modelorder->country2);

                    $arrcountry2 = array_slice ($arrcountry, 0, count($arrcountry)-1);
                    
                    $modelneworder->country = $arrcountry2;
                }
                else{
                    $modelneworder->country =  $modelorder->country;                              
                }

            

                $modelneworder->cost =  $modelorder->cost;          

                $modelneworder->type =  $modelorder->type;          

                $modelneworder->assistant =  $modelorder->assistant;          

                $modelneworder->experience =  $modelorder->experience;          

                $modelneworder->level =  $modelorder->level;          

                $modelneworder->monitor =  $modelorder->monitor;



                $statusorder = false;
                if ($modelneworder->load(Yii::$app->request->post())) {
                        $modelneworder->file = UploadedFile::getInstance($modelneworder, 'file');
                        if ($modelneworder->file) {                
                            $namefileorder = Yii::$app->user->identity->id.'_'.time().'.'.$modelneworder->file->extension;

                            $modelneworder->filename = $namefileorder;
                            
                        }
                        
                        $modelneworder->srok=Yii::$app->formatter->asDate($modelneworder->srok, "php:Y-m-d");

                        $modelneworder->status = 1;

                        if ($modelneworder->country != '') {
                            foreach ($modelneworder->country as $value) {
                                $modelneworder->country2 = $value.','.$modelneworder->country2;
                            }

                            

                           
                        }
                        
                        $modelneworder->country = '';
                        
                        if($modelneworder->save()){

                            
                            Yii::$app->session->setFlash('info','Your order is sent to moderation');
                            $statusorder = true;
                        }
                        else{
                            Yii::$app->session->setFlash('error','Opps! Your order is not saved. Please contact us');   
                        }
                        if ($modelneworder->file && $modelneworder->validate()) {                
                            $modelneworder->file->saveAs('files/orders/'.$namefileorder);

                            

                            
                            //return $this->refresh();
                        }
                        if ($statusorder == true) {
                            return $this->redirect(['orderok', 'id' => $modelneworder->id]);
                            
                        }
                        else{
                           return $this->refresh(); 
                        }
                        
                }
                return $this->render('addorder',[
                            'modelneworder' => $modelneworder,
                            'modelprofile' => $modelprofile,
                            'countalertsorder' => $countalertsorder,
                            'modelbalanceuser' => $modelbalanceuser,
                            'countalertsbalance' => $countalertsbalance,
                            ]);
            }
            else{
                return $this->goHome();
            }


           

        }
        else{
            return $this->goHome();
        }


    }

    public function actionOrderok($id){
        

        if (!\Yii::$app->user->isGuest) {
            
            $modelorder = $this->findModelorder($id);
            
            if (Yii::$app->user->identity->id == $modelorder->id_user) {

                $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

                $countalertsorder = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->count();

                $countalertsbalance = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 1])->count();

                $modelbalanceuser = Balance::find()->where(['id_user' => Yii::$app->user->identity->id])->one();

                return $this->render('orderok',[
                            'modelorder' => $modelorder,
                            'modelprofile' => $modelprofile,
                            'countalertsorder' => $countalertsorder,
                            'modelbalanceuser' => $modelbalanceuser,
                            'countalertsbalance' => $countalertsbalance,
                            ]);
                
            }
        }
        else{
            return $this->redirect(['/site/login']);
        }
    }

    public function actionNewinvoice($amount){
        if (!\Yii::$app->user->isGuest && Yii::$app->user->identity->type == 'client') {

            $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

            $countalertsorder = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->count();

            $countalertsbalance = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 1])->count();

            $modelbalanceuser = Balance::find()->where(['id_user' => Yii::$app->user->identity->id])->one();

            $modelnewinvoice = new Invoice();

            $modelnewinvoice->id_user = Yii::$app->user->identity->id;

            $modelnewinvoice->status = 1;

            $modelnewinvoice->amount = $amount;

            $modelnewinvoice->due_at = time()+86400;

            $modelnewinvoice->save();
            
            
            return $this->render('invoice',[
                'modelprofile' => $modelprofile,
                'countalertsorder' => $countalertsorder,
                'countalertsbalance' => $countalertsbalance,
                'modelbalanceuser' => $modelbalanceuser,
                'modelnewinvoice' => $modelnewinvoice,
                ]);

        }
        else{
            return $this->goHome();
        }


    }

    public function actionInvoice($id){
        if (!\Yii::$app->user->isGuest && Yii::$app->user->identity->type == 'client') {

            $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

            $modelinvoice = $this->findModelinvoice($id);

            if (Yii::$app->user->identity->id == $modelinvoice->id_user) {
                $countalertsorder = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->count();

                $countalertsbalance = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 1])->count();

                $modelbalanceuser = Balance::find()->where(['id_user' => Yii::$app->user->identity->id])->one();

                return $this->render('invoice',[
                    'modelneworder' => $modelneworder,
                    'modelprofile' => $modelprofile,
                    'countalertsorder' => $countalertsorder,
                    'countalertsbalance' => $countalertsbalance,
                    'modelbalanceuser' => $modelbalanceuser,
                    'modelnewinvoice' => $modelinvoice,
                    ]);    
            }
            else{
                return $this->goHome();
            }

            

        }
        else{
            return $this->goHome();
        }


    }

    public function actionAddbalance($id){
        if (!\Yii::$app->user->isGuest && Yii::$app->user->identity->type == 'client') {

            $invoice = true;

            $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

            $modelinvoice = $this->findModelinvoice($id);

            if (Yii::$app->user->identity->id == $modelinvoice->id_user) {
                if ($modelinvoice->status == 1) {
                    $countalertsorder = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->count();

                    $modelbalanceuser = Balance::find()->where(['id_user' => Yii::$app->user->identity->id])->one();

                    $newbalance = $modelbalanceuser->balance + $modelinvoice->amount;

                    $modelbalanceuser->balance = $newbalance;


                    if ($invoice == true) {

                        $modelinvoice->status = 2;

                        
                        if ($modelinvoice->save()) {
                            if ($modelbalanceuser->save()) {
                                Yii::$app->session->setFlash('info','Your invoice is paid');

                                //create alert
                                $modelalerts = new Alerts();
                                $modelalerts->id_user = $modelinvoice->id_user;
                                $modelalerts->id_order = 0;
                                $modelalerts->comment = 'Your invoice is paid';
                                $modelalerts->status = 0;
                                $modelalerts->type = 1;
                                $modelalerts->save(false);
                                //create alert

                                //send email
                                $subject = 'Your invoice is paid';
                                $body = 'Your invoice is paid';
                                $modeluser = $this->findModeluser($modelinvoice->id_user);
                                $this->sendAletemail($subject, $body, $modeluser);
                                //send email

                                return $this->redirect(['balance', 'id' => Yii::$app->user->identity->id]);
                            }
                            else{
                                Yii::$app->session->setFlash('error','Your balance is not added. Please contact us!');

                                return $this->redirect(['balance', 'id' => Yii::$app->user->identity->id]);
                            }
                        }
                        else{
                            Yii::$app->session->setFlash('error','Your invoice is paid');

                            return $this->redirect(['invoice', 'id' => $modelinvoice->id]);
                        }

                        


                        
                    }
                    else{
                        Yii::$app->session->setFlash('info','Your invoice is not paid');

                        return $this->redirect(['balance', 'id' => Yii::$app->user->identity->id]);   
                    }
                    
                }
                else if($modelinvoice->status == 2){
                    Yii::$app->session->setFlash('error','This invoice has already been paid');

                    return $this->redirect(['balance', 'id' => Yii::$app->user->identity->id]); 
                }
                else{
                    Yii::$app->session->setFlash('error','This invoice has expired');

                    return $this->redirect(['balance', 'id' => Yii::$app->user->identity->id]);    
                }
                

                

                
                
            }
            else{
                return $this->goHome();
            }

            

        }
        else{
            return $this->goHome();
        }


    }

    public function actionBalance($id){
        if (!\Yii::$app->user->isGuest) {

            $modelprofile = $this->findModelprofile(Yii::$app->user->identity->id);

            $modelbalanceuser = Balance::find()->where(['id_user' => Yii::$app->user->identity->id])->one();


            if (Yii::$app->user->identity->id == $id) {
                $countalertsorder = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 0])->count();

                $countalertsbalance = Alerts::find()->where(['id_user' => Yii::$app->user->identity->id, 'status' => 0, 'type' => 1])->count();

                $modelinvoicelist = Invoice::find()->where(['and', ['=', 'id_user', $id], ['>', 'due_at', time()]])->orderBy(['updated_at' => SORT_DESC])->limit(10)->all();

                $modelnewinvoice = new Invoice();

                if ($modelnewinvoice->load(Yii::$app->request->post())) {

                    $modelnewinvoice->id_user = Yii::$app->user->identity->id;

                    $modelnewinvoice->status = 1;

                    $modelnewinvoice->due_at = time()+86400;

                    if ($modelnewinvoice->save()) {
                        return $this->render('invoice',[
                        'modelprofile' => $modelprofile,
                        'countalertsorder' => $countalertsorder,
                        'countalertsbalance' => $countalertsbalance,
                        'modelbalanceuser' => $modelbalanceuser,
                        'modelnewinvoice' => $modelnewinvoice,
                        'modelinvoicelist' => $modelinvoicelist,
                    ]);
                    }
                }


                return $this->render('balance',[
                    'modelprofile' => $modelprofile,
                    'countalertsorder' => $countalertsorder,
                    'countalertsbalance' => $countalertsbalance,
                    'modelbalanceuser' => $modelbalanceuser,
                    'modelnewinvoice' => $modelnewinvoice,
                    'modelinvoicelist' => $modelinvoicelist,
                    
                    ]);    
                
                
            }
            else{
                return $this->goHome();
            }

            

        }
        else{
            return $this->goHome();
        }


    }




    public function sendEmailatt($email, $emailfrom, $namesender, $subject, $parorder, $attachfile)
    {
        return Yii::$app->mailer->compose(['html' => 'orderatt-html', 'text' => 'orderatt-text'], ['parorder' => $parorder])
            ->setTo($email)
            ->setFrom([$emailfrom => $namesender])
            ->setSubject($subject)
            ->attach($attachfile)
            ->send();
    }

    public function sendAletemail($subject, $body, $modeluser){
        return Yii::$app->mailer->compose('alertEmail', ['user' =>$modeluser, 'body' => $body])
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
            ->setTo($modeluser->email)
            ->setSubject($subject.' '.Yii::$app->name)
            ->send();
        
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
        if (($model = ProfileTranslate::find()->with('billingAddress')->where(['id_user' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested profile does not exist.');
        }
    }

    /**
     * Finds the Profile Translater model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModeltranslater($id)
    {
        if (($model = ProfileTranslate::find()->where(['id_user' => $this->findModeluser($id)->id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested translater does not exist.');
        }
    }

    /**
     * Finds the Profile Client model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelclient($id)
    {

        if (($model = ProfileTranslate::find()->where(['id_user' => $this->findModeluser($id)->id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested client does not exist.');
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

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelorder($id)
    {
        if (($model = Orders4::findOne($id)) !== null) {
            return $model;
        } else {
            
            throw new NotFoundHttpException('The requested order does not exist.');
        }
    }

    /**
     * Finds the Zaivki model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelzaivki($id)
    {
        if (($modelzaivki = Zaivki::findOne($id)) !== null) {
            return $modelzaivki;
        } else {
            
            throw new NotFoundHttpException('The requested request does not exist.');
        }
    }

    /**
     * Finds the Alert model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelalert($id)
    {
        if (($modelalert = Alerts::findOne($id)) !== null) {
            return $modelalert;
        } else {
            
            throw new NotFoundHttpException('The alert does not exist.');
        }
    }

    /**
     * Finds the Invoice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelinvoice($id)
    {
        if (($modelinvoice = Invoice::findOne($id)) !== null) {
            return $modelinvoice;
        } else {
            
            throw new NotFoundHttpException('The invoice does not exist.');
        }
    }

    /**
     * Finds the Balance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelbalance($id)
    {
        if (($modelbalance = Balance::findOne($id)) !== null) {
            return $modelbalance;
        } else {
            
            throw new NotFoundHttpException('The balance does not exist.');
        }
    }

        /**
     * Finds the Monitor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Monitor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelmonitor($id)
    {
        if (($modelmonitor = Onlinemonitor::findOne($id)) !== null) {
            return $modelmonitor;
        } else {
            
            throw new NotFoundHttpException('The online monitor does not exist.');
        }
    }

    
}
