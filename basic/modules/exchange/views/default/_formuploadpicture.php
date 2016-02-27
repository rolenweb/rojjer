<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>                                                        
                                                        <h3>Current Picture:</h3>
                                                        <?= Html::img('@web/images/avatar/'.$modelprofile->photo, ['class' => 'img-responsive img-profile']) ?>
                                                        <br>
                                                        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                                                        <div class="form-group">
                                                                
                                                                <?= $form->field($modelavatar, 'file')->fileInput()->label('Choose a New Image
File ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                                <p class="help-block"><i class="fa fa-warning"></i> Supported formats: JPG, GIF, PNG</p>
                                                                
                                                                <?= Html::submitButton('Update Profile Picture', ['class' => 'btn btn-default']) ?>

                                                            </div>
                                                        <?php ActiveForm::end(); ?>