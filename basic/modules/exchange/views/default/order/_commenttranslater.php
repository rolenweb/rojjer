<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="row top10">
    <div class="col-sm-12">
        <div class="alert alert-warning" role="alert">
            
                <span class="label label-warning"><?= Html::encode(date("H:i d.m.y", $modelorder->updated_at)) ?></span>        
            
            
                <?= HtmlPurifier::process($modelorder->commenttranslate) ?>    
            
                <div class="text-right"><span class="label label-warning">Commnet from Support</span>        </div>
            
        </div>
    </div>
    
</div>