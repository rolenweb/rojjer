<?php
use yii\helpers\Html;

if ($modelprofile->level >= $model->level || Yii::$app->user->identity->id == $model->id_user) {
?>


<div class="col-md-12">
                        <div class="order-preview">
                            <div class="title-preview">
                                <h2>
                                    <?= Html::a(Html::encode($model->title), ['vieworder', 'id' => $model->id]) ?>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                <div class="col-xs-12">
                                    <div class="cost-order-preview">
                                       <i class="fa fa-usd"></i>
<?php
if ($model->totalcost != 0) {
    echo Html::encode($model->totalcost);
}
else{
    echo Html::encode($model->cost);
}
?>                                                                               
                                    </div>
                                </div>
<?php
$n_alerts = 0;
$comments_allert = '';
foreach ($myalerts as $myalert) {
    if ($myalert->id_order == $model->id) {
        $n_alerts++;
        $comments_allert = $myalert->comment.'\n'.$comments_allert;
    }
}
if ($n_alerts != 0) {
?>
                                <div class="col-xs-12 margin-top-20">
                                    <div class="circle-tile">
                                            
                                            <?= Html::a(
                                                    Html::tag('div',
                                                        Html::tag('i','',['class' => 'fa fa-bell fa-fw fa-2x'])
                                                        ,['class' => 'circle-tile-heading cicle-alert-order orange'])
                                                ,['alerts', 'id' => Yii::$app->user->identity->id]) ?>
                                            
                                        </div>
                                </div> 

<?php    
}
?>                                    

                                </div>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span class="badge badge-view-order green">Type <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Type of the order"></i> :</span>

                                              
<?php
    echo $this->render('_typelist',['modelorder' => $model]);
?>                                              
                                        </div>

                                        <div class="col-sm-6">
                                            <span class="badge badge-view-order green">Category <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="The subject area of the order"></i> :</span>

                                              
                                              <?php
    echo $this->render('_categorylist',['modelorder' => $model]);
?>
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="row top10">
                                         <div class="col-sm-6">
                                            <span class="badge badge-view-order green">Language <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="The language of the order"></i> :</span>
                                             <?php
    echo $this->render('_languagelist',['modelorder' => $model]);
?>
                                        </div>
                                        
                                       <div class="col-sm-6">
                                            <span class="badge badge-view-order green">Date <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Date"></i> :</span>
                                              <?= Html::encode(date("d.m.y",$model->created_at)) ?>
                                        </div>
                                        
                                    </div>
                                    <div class="row top10">
                                         <div class="col-sm-6">
                                            <span class="badge badge-view-order green">Country <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="The residence of translator"></i> :</span>
                                             <?php
    echo $this->render('_countrylist',['modelorder' => $model]);
?>
                                        </div>
                                        <div class="col-sm-6">
                                            <span class="badge badge-view-order green">Deadline <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Deadline"></i> :</span>
                                              <?= Html::encode(Yii::$app->formatter->asDate($model->srok, "php:d.m.y")) ?>
                                        </div>

                                        
                                        
                                    </div> 
                                    <div class="row top10">
                                        <div class="col-sm-6">
                                            <span class="badge badge-view-order green">Online monitoring : 
                                           
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Translators will edit online the done work step-by-step"></i> </span>
<?php
if ($model->monitor == 0) {
?>
                                            <span class="badge default">OFF</span>
<?php    
}
else{
?>
                                            <span class="badge green">ON</span>
<?php
}
?>                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <span class="badge badge-view-order green">Rating :

                                             <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i></span>
                                             <?php
    echo $this->render('_raringlist',['modelorder' => $model]);
?>
                                        </div>
                                    </div>
                                    <div class="row top10">
                                        <div class="col-sm-6">
                                            <span class="badge badge-view-order green">Status <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i> :</span>
                                             <?php
    echo $this->render('_statuslist',['modelorder' => $model]);
?>
                                        </div>
                                        <div class="col-sm-6">
<?php
if ($model->nsymbol != 0) {
?>
                                            <span class="badge green">Symbols :<?= Html::encode($model->nsymbol) ?></span>
<?php    
}
if ($model->nword != 0) {
?>
                                            <span class="badge green">Words :<?= Html::encode($model->nword) ?></span>
<?php    
}
if ($model->nstring != 0) {
?>
                                            <span class="badge green">Strings :<?= Html::encode($model->nstring) ?></span>
<?php    
}
?>                                        

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    
                                    <?= Html::a('Details', ['vieworder', 'id' => $model->id], ['class' => 'btn btn-default btn-square pull-right']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
}
?>                    