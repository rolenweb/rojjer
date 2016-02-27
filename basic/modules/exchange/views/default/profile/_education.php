<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>                                                      

<div class="row top10">
    <div class="col-sm-12">
                                                        
                                                        <?php $form = ActiveForm::begin(); ?>
                                                            <div class="form-group">
                                                                    <?= $form->field($model_education, 'text')->textarea(['maxlength' => true, 'rows' => 16])->label(false)->widget(letyii\tinymce\Tinymce::className(),[
                                                        'options' => ['rows' => 16],
                                                        'configs' => [ 
                                                            'plugins' => 'preview table code emoticons hr insertdatetime searchreplace textcolor visualblocks wordcount',
                                                            'convert_urls' => false,
                                                            'image_advtab' => true,
                                                            
                                                        ],
                                                    ])->label(false) ?>
                                                            </div>
                                                           
                                                            
                                                            <?= Html::submitButton('Save', ['class' => 'btn btn-default']) ?>
                                                        <?php ActiveForm::end(); ?>
    </div>
</div>