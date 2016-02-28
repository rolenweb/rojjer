<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>                                                      
<div class="row top10">
    <div class="col-sm-12">
        <h4>Please describe your skills or tell us briefly about you, this information will let clients get to know you. This will be your "business card" to introduce yourself to clients.</h4>
        <h3>TEST</h3>
    </div>
        
</div>

<div class="row top10">
    <div class="col-sm-12">
                                                        
                                                        <?php $form = ActiveForm::begin(); ?>
                                                            <div class="form-group">
                                                                    <?= $form->field($model_aboutme, 'text')->textarea(['maxlength' => true, 'rows' => 16])->label(false)->widget(letyii\tinymce\Tinymce::className(),[
                                                        'options' => ['rows' => 16],
                                                        'configs' => [ 
                                                            'plugins' => 'preview table code emoticons hr insertdatetime searchreplace textcolor visualblocks wordcount',
                                                            'convert_urls' => false,
                                                            'image_advtab' => true,
                                                            
                                                        ],
                                                    ])->label('About me ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                            </div>
                                                           
                                                            
                                                            <?= Html::submitButton('Save', ['class' => 'btn btn-default']) ?>
                                                        <?php ActiveForm::end(); ?>
    </div>
</div>