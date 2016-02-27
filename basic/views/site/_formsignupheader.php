<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
						<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
							<div class="form-group has-feedback">
		                      <label class="control-label">Type account </label>
		                      <?= $form->field($modelsignuptop, 'type')->dropDownList([ 'client' => 'Client', 'translater' => 'Translater', ])->label(false) ?>
		                      
		                    </div>

                            <div class="form-group has-feedback">
                              <label class="control-label">Username</label>
                              <?= $form->field($modelsignuptop, 'username')->textInput(['class' => 'form-control'])->label(false) ?>
                              <i class="fa fa-user form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                              <label class="control-label">Email</label>
                              <?= $form->field($modelsignuptop, 'email')->textInput(['class' => 'form-control'])->label(false) ?>
                              <i class="fa fa-at form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                              <label class="control-label">Password</label>
                              <?= $form->field($modelsignuptop, 'password')->textInput(['class' => 'form-control'])->passwordInput()->label(false) ?>
                              <i class="fa fa-lock form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                              <label class="control-label">Re-type password</label>
                              <?= $form->field($modelsignuptop, 'password_repeat')->textInput(['class' => 'form-control'])->passwordInput()->label(false) ?>
                              <i class="fa fa-lock form-control-feedback"></i>
                            </div>
                            <div class="agree">
                              <div class="form-group has-feedback">
                                <input type="checkbox" required>
                                <label class="control-label agree-label"><a href="">I agree</a></label>
                                                              
                              </div>
                            </div>
                            <div class="signup">
                              
                              <?= Html::submitButton('Sign Up', ['class' => 'btn btn-group btn-default btn-sm', 'name' => 'signup-button']) ?>
                            </div>
                            
                            
                          <?php ActiveForm::end(); ?>