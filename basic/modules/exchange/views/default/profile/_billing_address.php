<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


?>                                                      
<div class="row top10">
    <div class="col-sm-12">

    </div>
        
</div>

<div class="row top10">
    <div class="col-sm-12">
                                                        
                                                        <?php $form = ActiveForm::begin(); ?>
                                                            <div class="form-group">
                                                                    <?= $form->field($new_billing_address, 'title')->textInput(['maxlength' => true, 'class' => 'form-control'])->label('Billing address ('.Html::tag('i','',['class' => 'fa fa-lock', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Private']).')') ?>
                                                            </div>
                                                           
                                                            
                                                            <?= Html::submitButton('Save', ['class' => 'btn btn-default']) ?>
                                                        <?php ActiveForm::end(); ?>
    </div>
</div>