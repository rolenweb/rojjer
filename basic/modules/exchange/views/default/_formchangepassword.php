<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>                                                        
													<h3>Change Password:</h3>
                                                        <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
                                                            <?= $form->field($modelchagepass, 'password')->passwordInput(['class' => 'form-control']) ?>
                                                            <?= $form->field($modelchagepass, 'password_repeat')->passwordInput(['class' => 'form-control'])?>
                                                            <div class="form-group">
                                                                <?= Html::submitButton('Update Password', ['class' => 'btn btn-default']) ?>
                                                            </div>
                                                        <?php ActiveForm::end(); ?>