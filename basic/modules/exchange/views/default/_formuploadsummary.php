<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>   
<?php if ($modellistresume != NULL) {
?>
    <div class="row">
        <?php
        foreach ($modellistresume as $value) {
        ?>
        <div class="col-sm-2">
            <div class="row">
                <div class="col-xs-12">
                    <div class="recomendation-file-profile text-center">
                        <?= Html::a('<i class="fa fa-file-text-o fa-5x"></i>', '@web/files/summary/'.$value->namefile) ?>    
                    </div> 
                </div>
                <div class="col-xs-12 text-center">
                    <?= Html::encode($value->name) ?>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
                                                         
<?php 
}
?>
<div class="row top10">                                                            
                                                        
                                                        
                                                        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                                                    
                                                        <div class="form-group">
                                                            <?= $form->field($modelsummary, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name', 'class' => 'form-control'])->label(false) ?>
                                                        </div>
                                                        <div class="form-group">
                                                                
                                                                <?= $form->field($modelsummary, 'file')->fileInput()->label(false) ?>
                                                                <p class="help-block"><i class="fa fa-warning"></i> Supported formats: JPG, PNG, PDF, DOC, DOCX</p>
                                                                
                                                                

                                                        </div>
                                                        <?= $form->field($modelsummary, 'id_user')->textInput(['value' => Yii::$app->user->identity->id, 'type' =>'hidden'])->label(false) ?>
                                                        <?= Html::submitButton('Add Summary File', ['class' => 'btn btn-default']) ?>
                                                        <?php ActiveForm::end(); ?>
</div>                                                        