<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Sign Up';
//$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_headertop' ,[
    'modellogintop' => $modellogintop,
]) ?>
<?= $this->render('_header') ?>
<div class="page-top">
    <div class="container">
        

    

    <div class="row">
        <!-- main start -->
              <!-- ================ -->
              <div class="top20 bottom20">
                <div class="form-block center-block">
                  <h2 class="title">Sign Up</h2>
                  <hr>
                  <?php $form = ActiveForm::begin([
                        'id' => 'form-signup',
                        'options' => [
                            'class' => 'form-horizontal'
                        ],
                    ]); ?>
                  
                    <div class="form-group has-feedback">
                      <label for="inputName" class="col-sm-3 control-label">Type account <span class="text-danger small">*</span></label>
                      <div class="col-sm-8">
                        
                        <?= $form->field($model, 'type')->dropDownList([ 'client' => 'Client', 'translater' => 'Translater', ])->label(false) ?>
                      </div>
                    </div>
                    
                    <div class="form-group has-feedback">
                      <label for="inputUserName" class="col-sm-3 control-label">Username <span class="text-danger small">*</span></label>
                      <div class="col-sm-8">
                        
                        <?= $form->field($model, 'username')->textInput(['class' => 'form-control'])->label(false) ?>
                        <i class="fa fa-user form-control-feedback"></i>
                      </div>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="inputUserName" class="col-sm-3 control-label">Email <span class="text-danger small">*</span></label>
                      <div class="col-sm-8">
                        
                        <?= $form->field($model, 'email')->textInput(['class' => 'form-control'])->label(false) ?>
                        <i class="fa fa-envelope form-control-feedback"></i>
                      </div>
                    </div>
                   
                    <div class="form-group has-feedback">
                      <label for="inputPassword" class="col-sm-3 control-label">Password <span class="text-danger small">*</span></label>
                      <div class="col-sm-8">
                        
                        <?= $form->field($model, 'password')->textInput(['class' => 'form-control'])->passwordInput()->label(false) ?>
                        <i class="fa fa-lock form-control-feedback"></i>
                      </div>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="inputPassword" class="col-sm-3 control-label">Re-type <span class="text-danger small">*</span></label>
                      <div class="col-sm-8">
                        
                        <?= $form->field($model, 'password_repeat')->textInput(['class' => 'form-control'])->passwordInput()->label(false) ?>
                        <i class="fa fa-lock form-control-feedback"></i>
                      </div>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="inputPassword" class="col-sm-3 control-label">Verify Code <span class="text-danger small">*</span></label>
                      <div class="col-sm-8">
                        
                        <?= $form->field($model, 'verifyCode')->label(false)->widget(Captcha::className(), [
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-9">{input}</div></div>',
                        ]) ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-8">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" required> Accept our <a href="#">privacy policy</a> and <a href="#">customer agreement</a>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-8">
                        
                        <?= Html::submitButton('Sign Up', ['class' => 'btn btn-default', 'name' => 'signup-button']) ?>
                      </div>
                    </div>
                  <?php ActiveForm::end(); ?>
                </div>
              </div>
              <!-- main end -->
        
    </div>

    
    </div>
</div>
<?= $this->render('_footer') ?>