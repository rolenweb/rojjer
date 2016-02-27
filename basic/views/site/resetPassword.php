<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

$this->title = 'Reset password';
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
                  <p>Please choose your new password:</p>
                  <hr>
                  <?php $form = ActiveForm::begin([
                        'id' => 'reset-password-form',
                        'options' => [
                            'class' => 'form-horizontal'
                        ],
                    ]); ?>
                  
                    
                    
                    
                   
                    <div class="form-group has-feedback">
                      <label for="inputPassword" class="col-sm-3 control-label">Password <span class="text-danger small">*</span></label>
                      <div class="col-sm-8">
                        
                        <?= $form->field($model, 'password')->textInput(['class' => 'form-control'])->passwordInput()->label(false) ?>
                        <i class="fa fa-lock form-control-feedback"></i>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-8">
                        
                        <?= Html::submitButton('Save', ['class' => 'btn btn-default', 'name' => 'reset-password-button']) ?>
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