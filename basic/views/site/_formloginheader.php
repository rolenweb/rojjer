<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?php $form = ActiveForm::begin(['id' => 'login-form']) ?>
                            <div class="form-group has-feedback">
                              <label class="control-label">Username</label>
                              <?= $form->field($modellogintop, 'username')->textInput(['class' => 'form-control'])->label(false) ?>
                              <i class="fa fa-user form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                              <label class="control-label">Password</label>
                              
                              <?= $form->field($modellogintop, 'password')->textInput(['class' => 'form-control'])->passwordInput()->label(false) ?>
                              <i class="fa fa-lock form-control-feedback"></i>
                            </div>
                            <?= Html::submitButton('Login', ['class' => 'btn btn-group btn-dark btn-sm', 'name' => 'login-button']) ?>
                            <span>or</span>
                            
                            <?= Html::a('Sign Up', ['site/signup'], ['class' => 'btn btn-group btn-default btn-sm']) ?>

                            <ul>
                              <li><?= Html::a('Forgot your password?', ['site/request-password-reset']) ?></li>
                            </ul>
                            <div class="divider"></div>
                            <span class="text-center">Login with</span>
                            <ul class="social-links clearfix">
                              <li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                              <li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                              <li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                          <?php ActiveForm::end(); ?>
