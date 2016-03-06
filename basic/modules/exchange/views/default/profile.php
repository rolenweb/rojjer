<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use dosamigos\datepicker\DatePicker;

$this->registerJsFile('@web/exchange/js/profile/cv/cv.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Profile';
//$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_navbartop', [
    'countalertsorder' => $countalertsorder,
    'modelbalanceuser' => $modelbalanceuser,
    'countalertsbalance' => $countalertsbalance,
]); ?> 
<?= $this->render('_navbarside',[
    'modelprofile' => $modelcurrentprofile,
]); ?> 
<div id="page-wrapper">

            <div class="page-content">

                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i> <?= Html::a('Dashboard', ['exchange']) ?>
                                </li>
                                <li class="active">User Profile</li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->
                <?= $this->render('_flashmessage'); ?> 
                <div class="row">
                    <div class="col-lg-12">

                        <div class="portlet portlet-default">
                            <div class="portlet-body">
                                <ul id="userTab" class="nav nav-tabs">
                                    <li class="active"><a href="#overview" data-toggle="tab">About me</a>
                                    </li>
                                    <li><a href="#education" data-toggle="tab">Education</a>
                                    </li>
                                    <li><a href="#workexperience" data-toggle="tab">Wokr Experience</a>
                                    </li>
                                    <li><a href="#booktranslation" data-toggle="tab">Book Translation</a>
                                    </li>
                                    <li><a href="#review" data-toggle="tab">Review</a>
                                    </li>
                                    <?php 
                                    if (Yii::$app->user->identity->id == $model->id) {
                                    ?>
                                    <li><a href="#profile-settings" data-toggle="tab">Update Profile</a>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                                <div id="userTabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="overview">
                                        <?= $this->render('_personinfo', [
                                                            'modelprofile' => $modelprofile,
                                                            'model' => $model,
                                                            'model_aboutme' => $model_aboutme,
                                                            ]); ?> 
                                        

                                    </div>
                                    <div class="tab-pane fade" id="education">
                                        <?= $this->render('profile/_educationinfo', [
                                                            'modelprofile' => $modelprofile,
                                                            'model' => $model,
                                                            'model_education' => $model_education,
                                                            ]); ?> 
                                        

                                    </div>
                                    <div class="tab-pane fade" id="workexperience">
                                        <?= $this->render('profile/_workexperience_info', [
                                                            'modelprofile' => $modelprofile,
                                                            'model' => $model,
                                                            'model_workexperience' => $model_workexperience,
                                                            ]); ?> 
                                        

                                    </div>
                                    <?php 
                                    if (Yii::$app->user->identity->id == $model->id) {
                                    ?>
                                    <div class="tab-pane fade" id="profile-settings">

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <ul id="userSettings" class="nav nav-pills nav-stacked">
                                                    <li class="active"><a href="#basicInformation" data-toggle="tab"><i class="fa fa-user fa-fw"></i> Basic Information</a>
                                                    </li>
                                                <?php 
                                                if (Yii::$app->user->identity->type == 'translater') {
                                                ?>  
                                                    <li><a href="#billing-address" data-toggle="tab"><i class="fa fa-list-alt"></i> Billing Address</a>
                                                    </li>
                                                    <li><a href="#aboutme" data-toggle="tab"><i class="fa fa-list-alt"></i> About me</a>
                                                    </li>
                                                    <li><a href="#cv" data-toggle="tab"><i class="fa fa-list-alt"></i> CV</a>
                                                    </li>
                                                    <li><a href="#educationedit" data-toggle="tab"><i class="fa fa-list-alt"></i> Education</a>
                                                    </li>
                                                    <li><a href="#workexperience_edit" data-toggle="tab"><i class="fa fa-list-alt"></i> Work experiense</a>
                                                    </li>
                                                    <li><a href="#recomendation" data-toggle="tab"><i class="fa fa-list-alt"></i> Recommendations</a>
                                                    </li>
                                                    <li><a href="#summary" data-toggle="tab"><i class="fa fa-file-text-o"></i> Summary</a>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                                    
                                                    <li><a href="#profilePicture" data-toggle="tab"><i class="fa fa-picture-o fa-fw"></i> Profile Picture</a>
                                                    </li>
                                                    <li><a href="#changePassword" data-toggle="tab"><i class="fa fa-lock fa-fw"></i> Change Password</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-9">
                                                <div id="userSettingsContent" class="tab-content">
                                                    <div class="tab-pane fade in active" id="basicInformation">
                                                       <?= $this->render('_formbasicinfo', [
                                                            'modelprofile' => $modelprofile,
                                                            'model' => $model,
                                                            ]); ?> 
                                                    </div>
                                                    <div class="tab-pane fade" id="billing-address">
                                                       <?= $this->render('profile/_billing_address', [
                                                            'new_billing_address' => $new_billing_address,
                                                            'modelcurrentprofile' => $modelcurrentprofile,
                                                            
                                                            ]); ?> 
                                                    </div>
                                                    <div class="tab-pane fade" id="aboutme">
                                                       <?= $this->render('profile/_aboutme', [
                                                            'model_aboutme' => $model_aboutme,
                                                            
                                                            ]); ?> 
                                                    </div>
                                                    <div class="tab-pane fade" id="cv">
                                                       <?= $this->render('profile/_cv'); ?> 
                                                    </div>
                                                    <div class="tab-pane fade" id="educationedit">
                                                       <?= $this->render('profile/_education', [
                                                            'model_education' => $model_education,
                                                            
                                                            ]); ?> 
                                                    </div>
                                                    <div class="tab-pane fade" id="workexperience_edit">
                                                    <?= $this->render('profile/_workexperience', [
                                                            'modelprofile' => $modelprofile,
                                                            'model' => $model,
                                                            'model_workexperience' => $model_workexperience,
                                                            ]); ?> 
                                                    </div>
                                                    <div class="tab-pane fade" id="profilePicture">
                                                        <?= $this->render('_formuploadpicture', [
                                                            'modelprofile' => $modelprofile,
                                                            'modelavatar' => $modelavatar,
                                                            ]); ?>
                                                    </div>
                                                    <div class="tab-pane fade in" id="changePassword">
                                                        <?= $this->render('_formchangepassword', [
                                                            'modelchagepass' => $modelchagepass,
                                                            
                                                            ]); ?>
                                                       
                                                    </div>
                                                    <div class="tab-pane fade in" id="recomendation">
                                                    <?= $this->render('_formuploadrecomend', [
                                                            'modelprofile' => $modelprofile,
                                                            'modelrecomend' => $modelrecomend,
                                                            'modellestrecomendations' => $modellestrecomendations,
                                                            ]); ?>
                                                       
                                                    </div>
                                                    <div class="tab-pane fade in" id="summary">
                                                    <?= $this->render('_formuploadsummary', [
                                                            'modelprofile' => $modelprofile,
                                                            'modelsummary' => $modelsummary,
                                                            'modellistresume' => $modellistresume,
                                                            ]); ?>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <?php
                                    }
                                     ?>
                                </div>
                            </div>
                            <!-- /.portlet-body -->
                        </div>
                        <!-- /.portlet -->


                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.page-content -->

        </div>
