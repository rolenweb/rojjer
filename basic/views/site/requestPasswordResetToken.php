<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

$this->title = 'Request password reset';
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
                  <h2 class="title"><?= Html::encode($this->title) ?></h2>
                  <p>Please fill out your email. A link to reset password will be sent there.</p>
                  <hr>
                  <?php $form = ActiveForm::begin([
                        'id' => 'request-password-reset-form',
                        'options' => [
                            'class' => 'form-horizontal'
                        ],
                    ]); ?>
                  
                    
                    
                    
                   
                    <div class="form-group has-feedback">
                      <label for="inputUserName" class="col-sm-3 control-label">Email <span class="text-danger small">*</span></label>
                      <div class="col-sm-8">
                        
                        <?= $form->field($model, 'email')->textInput(['class' => 'form-control'])->label(false) ?>
                        <i class="fa fa-envelope form-control-feedback"></i>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-8">
                        
                        <?= Html::submitButton('Send', ['class' => 'btn btn-default', 'name' => 'reset-password-button']) ?>
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