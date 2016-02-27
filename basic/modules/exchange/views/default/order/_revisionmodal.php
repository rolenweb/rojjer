<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
                                <!-- Revison Modal -->
                                <div class="modal modal-flex fade" id="revisionModal" tabindex="-1" role="dialog" aria-labelledby="revisionModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="revisionModalLabel">Comment for revision</h4>
                                            </div>
                                            <?php $form = ActiveForm::begin(['id' => 'order-form', 'action' => ['revision', 'id' => $modelorder->id]]); ?>
                                            <div class="modal-body">
                                                

                                                <div class="form-group">
                                                    <?= $form->field($modelorder, 'commenttranslate')->textarea(['maxlength' => true, 'rows' => 6, 'placeholder' => 'Comment'])->label(false)->widget(letyii\tinymce\Tinymce::className(),[
                                                            'options' => ['rows' => 6],
                                                            'configs' => [ 
                                                                


                                                            ],

                                                            
                                                        
                                                        
                                                    
                                                        
                                                        ]) ?>
                                                </div>

                                                
                                                    
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <?= Html::submitButton('Send', ['class' => 'btn btn-default']) ?>
                                                
                                            </div>
                                            <?php ActiveForm::end(); ?>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->