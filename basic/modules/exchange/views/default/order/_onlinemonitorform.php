<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
								<div class="portlet portlet-default margin-top-10">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Online monitoring</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#onlinemonitorform"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="onlinemonitorform" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                    
                                                            <?= $form->field($modelonlinemonitor, 'text')->textarea()->label(false)->widget(letyii\tinymce\Tinymce::className(),[
                                                                'options' => ['rows' => 16],
                                                                'configs' => [ 
                                                                    'plugins' => 'preview table code emoticons hr insertdatetime searchreplace textcolor visualblocks wordcount',
                                                                    'convert_urls' => false,
                                                                    'image_advtab' => true,
                                                                    
                                                                ],

                                                                
                                                            
                                                            
                                                        
                                                            
                                                            ]) ?>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Done(%)</label>
                                                             <?= $form->field($modelonlinemonitor, 'done')->dropDownList([
                                                                10 => '10',
                                                                20 => '20',
                                                                30 => '30',
                                                                40 => '40',
                                                                50 => '50',
                                                                60 => '60',
                                                                70 => '70',
                                                                80 => '80',
                                                                90 => '90',
                                                            ])->label(false) ?>    
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <?= $form->field($modelonlinemonitor, 'file')->fileInput()->label(false) ?>
                                                            <p class="help-block"><i class="fa fa-warning"></i> Supported formats: JPG, PNG, PDF, DOC, DOCX</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                
                                                <?= Html::submitButton('Send', ['class' => 'btn btn-default']) ?>
                                            <?php ActiveForm::end(); ?>
                                        </div>
                                    </div>
                                </div>