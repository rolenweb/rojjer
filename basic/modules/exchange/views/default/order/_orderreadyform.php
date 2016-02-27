<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
								<div class="portlet portlet-default margin-top-10">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Work executed</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#orderreadyform"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="orderreadyform" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                                                
                                                <div class="form-group">
                                                    
                                                    <?= $form->field($modelorderready, 'text')->textarea()->label(false)->widget(letyii\tinymce\Tinymce::className(),[
											            'options' => ['rows' => 16],
											            'configs' => [ 
											                'plugins' => 'preview table code emoticons hr insertdatetime searchreplace textcolor visualblocks wordcount',
											                'convert_urls' => false,
											                'image_advtab' => true,
											                
											            ],

											            
											        
											        
											    
											        
											        ]) ?>
                                                </div>
                                                <div class="form-group">
											        <?= $form->field($modelorderready, 'file')->fileInput()->label(false) ?>
											        <p class="help-block"><i class="fa fa-warning"></i> Supported formats: JPG, PNG, PDF, DOC, DOCX</p>
											    </div>
                                                
                                                
                                                <?= Html::submitButton('Send', ['class' => 'btn btn-default']) ?>
                                            <?php ActiveForm::end(); ?>
                                        </div>
                                    </div>
                                </div>