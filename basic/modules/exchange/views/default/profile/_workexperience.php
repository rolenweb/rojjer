<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>                                                      

<div class="row top10">
    <div class="col-sm-12">
                                                        
                                                        <?php $form = ActiveForm::begin(); ?>
                                                            <div class="form-group">
                                                                <?= $form->field($model_workexperience, 'category2')->dropDownList([ 
                    '1' => 'Architecture/Building',
                    '2' => 'Business/Economics',
                    '3' => 'Design',
                    '4' => 'Engineering/Shipbuilding/Aviation',
                    '5' => 'Fashion',
                    '6' => 'Food',
                    '7' => 'Industry',
                    '8' => 'IT & Softwar',
                    '9' => 'Legal',
                    '10' => 'Literature (Belles-lettres/Scientific)',
                    '11' => 'Medicine/Pharmaceuticals',
                    '16' => 'Personal documents',
                    '12' => 'PR/Marketing/Advertisement',
                    '13' => 'Social Media',
                    '14' => 'Supply',
                    '15' => 'Travel/Tourism',
                    '17' => 'Websites',
                    '0' => 'Other',
                    ],['multiple' => true]) ?>    
                                                            </div>
                                                            <div class="form-group">
                                                                <?= $form->field($model_workexperience, 'total_experience')->dropDownList([ 1 => '1 year', 2 => '1 - 5 years', 3 => 'more 5 years',], ['prompt' => '']) ?>                                                                    
                                                            </div>
                                                            <div class="form-group">
                                                                    <?= $form->field($model_workexperience, 'text')->textarea(['maxlength' => true, 'rows' => 16])->label(false)->widget(letyii\tinymce\Tinymce::className(),[
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