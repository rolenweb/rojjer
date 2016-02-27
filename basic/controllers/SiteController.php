<?php
namespace app\controllers;

use Yii;
use app\models\LoginForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\SignupForm;
use app\models\EmailConfirmForm;
use app\models\ContactForm;
use app\models\Profile;
use app\models\ProfileTranslate;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
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
            return $this->redirect(['exchange/']);
        }
        else{

            $modellogintop = new LoginForm();
            if ($modellogintop->load(Yii::$app->request->post())) {
                if ($modellogintop->login()) {
                    if (Yii::$app->user->identity->type == 'admin') {
                        return $this->redirect(['admin/']);
                    }
                    else{
                        return $this->redirect(['exchange/default/profile', 'id' => Yii::$app->user->identity->id]);
                    }
                }
                else{
                    return $this->render('login', [
                        'model' => $modellogintop,
                        'modellogintop' => $modellogintop,
                    ]);
                }
                
            }

            

             
            return $this->render('index', [
                    'modellogintop' => $modellogintop,
                    
                ]);
            

               
        }
        
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['exchange/']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {

            if ($model->login()) {
                if (Yii::$app->user->identity->type == 'admin') {
                    return $this->redirect(['admin/']);
                }
                else{
                    return $this->redirect(['exchange/default/profile', 'id' => Yii::$app->user->identity->id]);
                }
            }
            else{
                return $this->render('login', [
                    'model' => $model,
                    'modellogintop' => $model,
                ]);
            }

            
        } else {
            return $this->render('login', [
                'model' => $model,
                'modellogintop' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['exchange/']);
        }
        else{
            $modellogintop = new LoginForm();
                if ($modellogintop->load(Yii::$app->request->post())) {
                    if ($modellogintop->login()) {
                        return $this->redirect(['exchange/default/profile', 'id' => Yii::$app->user->identity->id]);
                    }
                    else{
                        return $this->render('login', [
                            'model' => $modellogintop,
                            'modellogintop' => $modellogintop,
                        ]);
                    }
                    
            }

            $model = new ContactForm();
            if ($model->load(Yii::$app->request->post())) {
                if ($model->contact(Yii::$app->params['adminEmail'])) {
                    Yii::$app->session->setFlash('info','We have received your message, we will contact you very soon.');

                }
                else{
                    Yii::$app->session->setFlash('error','Oops! Something went wrong please refresh the page and try again.');
                }
                
                return $this->refresh();
            } else {
                return $this->render('contact', [
                    'model' => $model,
                    'modellogintop' => $modellogintop,
                ]);
            }
        }
    }

    public function actionWelcome()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['exchange/']);
        }
        else{
            $modellogintop = new LoginForm();
                if ($modellogintop->load(Yii::$app->request->post())) {
                    if ($modellogintop->login()) {
                        return $this->redirect(['exchange/default/profile', 'id' => Yii::$app->user->identity->id]);
                    }
                    else{
                        return $this->render('login', [
                            'model' => $modellogintop,
                            'modellogintop' => $modellogintop,
                        ]);
                    }
                    
            }
            return $this->render('welcome',[
                'modellogintop' => $modellogintop,
                ]);
        }
    }

    public function actionFaq()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['exchange/']);
        }
        else{
            $modellogintop = new LoginForm();
                if ($modellogintop->load(Yii::$app->request->post())) {
                    if ($modellogintop->login()) {
                        return $this->redirect(['exchange/default/profile', 'id' => Yii::$app->user->identity->id]);
                    }
                    else{
                        return $this->render('login', [
                            'model' => $modellogintop,
                            'modellogintop' => $modellogintop,
                        ]);
                    }
                    
            }
            return $this->render('faq',[
                'modellogintop' => $modellogintop,
                ]);
        }
    }

    public function actionNews()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['exchange/']);
        }
        else{
            $modellogintop = new LoginForm();
                if ($modellogintop->load(Yii::$app->request->post())) {
                    if ($modellogintop->login()) {
                        return $this->redirect(['exchange/default/profile', 'id' => Yii::$app->user->identity->id]);
                    }
                    else{
                        return $this->render('login', [
                            'model' => $modellogintop,
                            'modellogintop' => $modellogintop,
                        ]);
                    }
                    
            }
            return $this->render('news',[
                'modellogintop' => $modellogintop,
                ]);
        }
    }

    public function actionAboutus()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['exchange/']);
        }
        else{
            $modellogintop = new LoginForm();
                if ($modellogintop->load(Yii::$app->request->post())) {
                    if ($modellogintop->login()) {
                        return $this->redirect(['exchange/default/profile', 'id' => Yii::$app->user->identity->id]);
                    }
                    else{
                        return $this->render('login', [
                            'model' => $modellogintop,
                            'modellogintop' => $modellogintop,
                        ]);
                    }
                    
            }
            return $this->render('aboutus',[
                'modellogintop' => $modellogintop,
                ]);
        }
    }

    public function actionPricing()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['exchange/']);
        }
        else{
            $modellogintop = new LoginForm();
                if ($modellogintop->load(Yii::$app->request->post())) {
                    if ($modellogintop->login()) {
                        return $this->redirect(['exchange/default/profile', 'id' => Yii::$app->user->identity->id]);
                    }
                    else{
                        return $this->render('login', [
                            'model' => $modellogintop,
                            'modellogintop' => $modellogintop,
                        ]);
                    }
                    
            }
            return $this->render('pricing',[
                'modellogintop' => $modellogintop,
                ]);
        }
    }

    public function actionSignup()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['exchange/']);
        }
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                Yii::$app->session->setFlash('info', 'Please check email for activation your account.');
                return $this->goHome();
                //if (Yii::$app->getUser()->login($user)) {
                //    return $this->goHome();
                //}
            }
        }

        $modellogintop = new LoginForm();
            if ($modellogintop->load(Yii::$app->request->post())) {
                if ($modellogintop->login()) {
                    return $this->redirect(['exchange/default/profile', 'id' => Yii::$app->user->identity->id]);
                }
                else{
                    return $this->render('login', [
                        'model' => $modellogintop,
                        'modellogintop' => $modellogintop,
                    ]);
                }
                
            }

        return $this->render('signup', [
            'model' => $model,
            'modellogintop' => $modellogintop,
        ]);
    }
    public function actionConfirmEmail($token)
    {
        try {
            $model = new EmailConfirmForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
 
        if ($model->confirmEmail()) {
            
            Yii::$app->session->setFlash('info', 'Your email is confirmed');

            
        } else {
            //Yii::$app->getSession()->setFlash('error', 'Ошибка подтверждения Email.');
            Yii::$app->session->setFlash('confirmEmailMessageError');
        }
 
        return $this->goHome();
    }

    public function actionRequestPasswordReset()
    {
        $modellogintop = new LoginForm();
            if ($modellogintop->load(Yii::$app->request->post())) {
                if ($modellogintop->login()) {
                    return $this->redirect(['exchange/default/profile', 'id' => Yii::$app->user->identity->id]);
                }
                else{
                    return $this->render('login', [
                        'model' => $modellogintop,
                        'modellogintop' => $modellogintop,
                    ]);
                }
                
        }

        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                
                Yii::$app->session->setFlash('info', 'Check your email for further instructions');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
            'modellogintop' => $modellogintop,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('info', 'Your password is saved');

            return $this->goHome();
        }

        $modellogintop = new LoginForm();
            if ($modellogintop->load(Yii::$app->request->post())) {
                if ($modellogintop->login()) {
                    return $this->redirect(['exchange/default/profile', 'id' => Yii::$app->user->identity->id]);
                }
                else{
                    return $this->render('login', [
                        'model' => $modellogintop,
                        'modellogintop' => $modellogintop,
                    ]);
                }
                
        }

        return $this->render('resetPassword', [
            'model' => $model,
            'modellogintop' => $modellogintop,
        ]);
    }

    public function actionChangePassword()
    {
        if (!\Yii::$app->user->isGuest) {
            $model = new ChangePasswordForm(Yii::$app->user->identity->username);
        

            if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
                Yii::$app->getSession()->setFlash('success', 'Новый пароль сохранен.');

                
                return $this->redirect(Yii::$app->request->referrer);
            }

            return $this->render('changePassword', [
                'model' => $model,
            ]);
        }
        else {
            return $this->goHome();
        }
    }

    public function actionProfile($id)
    {

        if (!\Yii::$app->user->isGuest) {

            //get user's of company
             $modelusercompany = Company::find()
            ->where(['username' => $this->findModel($id)->username])
            ->all();    
            //get user's of company
            
            
            return $this->render('view', [
                'model' => $this->findModel($id),
                'modelusercompany' => $modelusercompany,
            ]);
        }
        else {
            return $this->goHome();
        }
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionProfileupdate($id)
    {
        if (!\Yii::$app->user->isGuest) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['profile', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
        else {
            return $this->goHome();
        }
    }



    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionAvatar($id)
    {
        if (!\Yii::$app->user->isGuest && Yii::$app->user->identity->id == $this->findModel($id)->id) {
            $modelavatar = new UploadForm();

            if (Yii::$app->request->post()) {
                $modelavatar->file = UploadedFile::getInstance($modelavatar, 'file');

                if ($modelavatar->file) {                
                    $namefileavatar = 'avatar_'.Yii::$app->user->identity->id.'_'.rand(100,999).'.'.$modelavatar->file->extension;
                    
                    
                    //save new avatar                  

                   $modelchangeavatar = Profile::findOne($id);
                   $modelchangeavatar->avatar = $namefileavatar;

                   $modelchangeavatar->save();   


                }

                

                if ($modelavatar->file && $modelavatar->validate()) {                
                    $modelavatar->file->saveAs('uploads/'.$namefileavatar);

                    return $this->redirect(['profile', 'id' => $this->findModel($id)->id]);
                }
            }

            return $this->render('avatar', ['model' => $modelavatar]);
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
    
   
}
