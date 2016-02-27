<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Orders3 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders3-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'id_translater')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lang_from')->textInput() ?>

    <?= $form->field($model, 'lang_to')->textInput() ?>

    <?= $form->field($model, 'srok')->textInput() ?>

    <?= $form->field($model, 'category')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6])->widget(letyii\tinymce\Tinymce::className(),[
                                                            'options' => ['rows' => 6],
                                                            'configs' => [ 
                                                                


                                                            ],

                                                            
                                                        
                                                        
                                                    
                                                        
                                                        ]) ?>

    <?= $form->field($model, 'texthiden')->textarea(['rows' => 6])->widget(letyii\tinymce\Tinymce::className(),[
                                                            'options' => ['rows' => 6],
                                                            'configs' => [ 
                                                                


                                                            ],

                                                            
                                                        
                                                        
                                                    
                                                        
                                                        ]) ?>

    <?= $form->field($model, 'filename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'textready')->textarea(['rows' => 6])->widget(letyii\tinymce\Tinymce::className(),[
                                                            'options' => ['rows' => 6],
                                                            'configs' => [ 
                                                                


                                                            ],

                                                            
                                                        
                                                        
                                                    
                                                        
                                                        ]) ?>

    <?= $form->field($model, 'filenameready')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assist_expir')->textInput() ?>

    <?= $form->field($model, 'country')->textInput() ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'totalcost')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'commentclient')->textInput(['maxlength' => true])->widget(letyii\tinymce\Tinymce::className(),[
                                                            'options' => ['rows' => 6],
                                                            'configs' => [ 
                                                                


                                                            ],

                                                            
                                                        
                                                        
                                                    
                                                        
                                                        ]) ?>

    <?= $form->field($model, 'commenttranslate')->textInput(['maxlength' => true])->widget(letyii\tinymce\Tinymce::className(),[
                                                            'options' => ['rows' => 6],
                                                            'configs' => [ 
                                                                


                                                            ],

                                                            
                                                        
                                                        
                                                    
                                                        
                                                        ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
