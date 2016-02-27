<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_headertop' ,[
    'modellogintop' => $model,
]) ?>
<?= $this->render('_header') ?>
<div class="page-top">
    <div class="container">
        

    

    <div class="row">
             <!-- main start -->
              <!-- ================ -->
              <div class="top20 bottom20">
                <div class="form-block center-block">
                  <h2 class="title">Login</h2>
                  <hr>
                  <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'options' => [
                            'class' => 'form-horizontal'
                        ],
                    ]); ?>
                  
                    
                    <div class="form-group has-feedback">
                      <label for="inputUserName" class="col-sm-3 control-label">Username <span class="text-danger small">*</span></label>
                      <div class="col-sm-8">
                        
                        <?= $form->field($model, 'username')->textInput(['class' => 'form-control'])->label(false) ?>
                        <i class="fa fa-user form-control-feedback"></i>
                      </div>
                    </div>
                    
                   
                    <div class="form-group has-feedback">
                      <label for="inputPassword" class="col-sm-3 control-label">Password <span class="text-danger small">*</span></label>
                      <div class="col-sm-8">
                        
                        <?= $form->field($model, 'password')->textInput(['class' => 'form-control'])->passwordInput()->label(false) ?>
                        <i class="fa fa-lock form-control-feedback"></i>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-8">
                        <div class="checkbox">
                          <?= $form->field($model, 'rememberMe')->checkbox() ?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-8">
                        <div class="checkbox">
                          If you have forgotten your password, you can reset it <?= Html::a('here', ['site/request-password-reset']) ?>.
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-8">
                        
                        <?= Html::submitButton('Login', ['class' => 'btn btn-default', 'name' => 'login-button']) ?>
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