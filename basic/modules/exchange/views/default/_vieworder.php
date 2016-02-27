<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\bootstrap\ActiveForm;
?>
<div class="row">
	<div class="col-md-12">
                        <div class="order-preview">
                            <div class="title-preview">
                                <h2>
                                	<?= Html::encode($modelorder->title) ?>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="cost-order-preview">
                                        <i class="fa fa-usd"></i>
<?php
if ($modelorder->totalcost != 0) {
    echo Html::encode($modelorder->totalcost);
}
else{
    echo Html::encode($modelorder->cost);
}
?>                                        

                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span class="badge badge-view-order green">Type <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i> :</span>

                                              
<?php
    echo $this->render('order/_typelist',['modelorder' => $modelorder]);
?>                                              
                                        </div>

                                        <div class="col-sm-6">
                                            <span class="badge badge-view-order green">Category <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i> :</span>

                                              
                                              <?php
    echo $this->render('order/_categorylist',['modelorder' => $modelorder]);
?>
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="row top10">
                                         <div class="col-sm-6">
                                            <span class="badge badge-view-order green">Language <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i> :</span>
                                             <?php
    echo $this->render('order/_languagelist',['modelorder' => $modelorder]);
?>
                                        </div>
                                        
                                       <div class="col-sm-6">
                                            <span class="badge badge-view-order green">Date <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i> :</span>
                                              <?= Html::encode(date("d.m.y",$modelorder->created_at)) ?>
                                        </div>
                                        
                                    </div>
                                    <div class="row top10">
                                         <div class="col-sm-6">
                                            <span class="badge badge-view-order green">Country <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i> :</span>
                                             <?php
    echo $this->render('order/_countrylist',['modelorder' => $modelorder]);
?>
                                        </div>
                                        <div class="col-sm-6">
                                            <span class="badge badge-view-order green">Deadline <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i> :</span>
                                              <?= Html::encode(Yii::$app->formatter->asDate($modelorder->srok, "php:d.m.y")) ?>
                                        </div>

                                        
                                        
                                    </div>                                                                                    
                                    <div class="row top10">
                                        <div class="col-sm-6">
                                            <span class="badge badge-view-order green">Online monitoring : 
                                           
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i> </span>
<?php
if ($modelorder->monitor == 0) {
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
    echo $this->render('order/_raringlist',['modelorder' => $modelorder]);
?>
                                        </div>
                                    </div>

                                    <div class="row top10">
                                        <div class="col-sm-6">
                                            <span class="badge badge-view-order green">Status <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i> :</span>
                                             <?php
    echo $this->render('order/_statuslist',['modelorder' => $modelorder]);
?>
                                        </div>
                                        <div class="col-sm-6">
<?php
if ($modelorder->nsymbol != 0) {
?>
                                            <span class="badge green">Symbols :<?= Html::encode($modelorder->nsymbol) ?></span>
<?php    
}
if ($modelorder->nword != 0) {
?>
                                            <span class="badge green">Words :<?= Html::encode($modelorder->nword) ?></span>
<?php    
}
if ($modelorder->nstring != 0) {
?>
                                            <span class="badge green">Strings :<?= Html::encode($modelorder->nstring) ?></span>
<?php    
}
?>                                        

                                        </div>
                                    </div>

                                    
                                    
                                    
                                    
<?php
if ($modelorder->status > 3) {
    if ($modelorder->username != NULL) {
?>
                                    <div class="row top10">
                                        <div class="col-sm-6">
                                            <span class="badge green">Translater: <?= Html::a(Html::encode($modelorder->username),['profile', 'id' => $modelorder->id_translater]) ?></span>                                            
                                        </div>
                                    </div>

<?php        
    }
?>
									
<?php
}
?>
                                    
                                </div>
                            </div>
<?php                            
if (Yii::$app->user->identity->type == 'client') {
    if ($modelorder->status == 2 || $modelorder->status == 6) {
        //comment to client from admin
        if ($modelorder->commentclient != NULL) {
            echo $this->render('order/_commentclient',['modelorder' => $modelorder]);
        }
        //comment to client from admin
        
    }
}
?>
                            <hr>
                            <div class="row">

                                <div class="col-sm-12">
                                	
                                    <?= HtmlPurifier::process($modelorder->text) ?>
<?php
if (Yii::$app->user->identity->id == $modelorder->id_user || Yii::$app->user->identity->id == $modelorder->id_translater) {
    if ($modelorder->filename != NULL) {
?>
									<hr>
									<?= Html::a(Html::tag('span','Download file',['class' => 'badge green']), '@web/files/orders/'.$modelorder->filename) ?>    
<?php
    }

}
?>                                
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-xs-12">
<?php
if (Yii::$app->user->identity->type == 'client') {
    if (Yii::$app->user->identity->id == $modelorder->id_user) {
    	if ($modelorder->status == 0 || $modelorder->status == 2 || $modelorder->status == -1) {
    		echo Html::a('Moderation', ['moderation', 'id' => $modelorder->id], ['class' => 'btn btn-default btn-square pull-right']).Html::a('Edit', ['editorder', 'id' => $modelorder->id], ['class' => 'btn btn-default btn-square pull-right margin-right-10']);
    	}
    	if ($modelorder->status < 4 && $modelorder->status > -1) {
    		echo Html::a('Stop', ['stoporder', 'id' => $modelorder->id], [
                'class' => 'btn btn-default btn-square pull-right margin-right-10',
                'data' => [
                    'confirm' => 'Are you sure to want to stop the order',
                    'method' => 'post',
                    ],
                ]);
    	}
       
        if ($modelorder->status == 6) {
            echo Html::tag('button', 'Revision', ['class' => 'btn btn-default btn-square pull-right margin-right-10', 'data-toggle' => 'modal', 'data-target' => '#revisionModal']).Html::a('Pay', ['payorder', 'id' => $modelorder->id], ['class' => 'btn btn-default btn-square pull-right margin-right-10']);

            echo $this->render('order/_revisionmodal',['modelorder' => $modelorder]);

            
        }

    	
    }
}
if (Yii::$app->user->identity->type == 'translater') {
    if ($modelorder->status == 4) {
        //comment to transleter from admin
        if ($modelorder->commenttranslate != NULL) {
            echo $this->render('order/_commenttranslater',['modelorder' => $modelorder]);
        }

        //comment to transleter from admin
        echo $this->render('order/_orderreadyform',['modelorderready' => $modelorderready]);
        if ($modelorder->monitor == 1) {
            echo $this->render('order/_onlinemonitorform',['modelonlinemonitor' => $modelonlinemonitor,]);
        }
        
        echo Html::a('Refuse the order', ['cancelorder', 'id' => $modelorder->id], [
            'class' => 'btn btn-default btn-square pull-right margin-right-10',
            'data' => [
                'confirm' => 'Are you sure to want to cansel the order',
                'method' => 'post',
                ],
            ]);
    }
    if ($listzaivki != NULL) {
        foreach ($listzaivki as $value) {
            if ($value->id_user == Yii::$app->user->identity->id && $value->status == 1 && $modelorder->status == 3) {
                echo Html::a('Start order execution( $'.$value->price.' )', ['takeorder', 'id' => $modelorder->id], ['class' => 'btn btn-default btn-square pull-right margin-right-10']);
                break;
            }
        }
    }
}

?>    
                                    
                                </div>
                            </div>
<?php
if (Yii::$app->user->identity->type == 'client') {

    if ($modelorder->status == 6) {
        

        echo $this->render('order/_forcheckclient',['modelorder' => $modelorder]);


    }

    
}
?>                            
                        </div>
                    </div>
</div>


<?php
if (Yii::$app->user->identity->id == $modelorder->id_user) {
//list requests
	if ($listzaivki != NULL) {
?>


<div class="row top10">
	<div class="col-xs-12">
		<div class="portlet portlet-default">
            <div class="portlet-heading">
                <div class="portlet-title">
                    <h4>Newsfeed</h4>
                </div>
                <div class="portlet-widgets">
                    <a data-toggle="collapse" data-parent="#accordion" href="#listofrequests"><i class="fa fa-chevron-down"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="listofrequests" class="panel-collapse collapse in">
                <div class="portlet-body">
<?php
foreach ($listzaivki as $value) {
?>
					<div class="row">
						<div class="col-xs-3 col-sm-2">
							<?= Html::img('@web/images/avatar/'.$value->avatar, ['style' => 'height: 50px;']) ?>
						</div>
						<div class="col-xs-6 col-sm-8">
							<span class="badge blue"><?= Html::encode(date("H:i d.m.y", $value->created_at)) ?></span> <span class="badge orange link-comment"><?= Html::a(Html::encode($value->username),['profile', 'id' => Html::encode($value->id_user)]) ?></span>
<?php
if($value->status == 1){
?>
<span class="badge green">Approved</span>
<?php
}
?>							
							<hr>
							<?= Html::encode($value->comment) ?>
						</div>
						<div class="col-xs-3 col-sm-2 text-center">
							<div class="col-xs-12">
								<i class="fa fa-usd"></i><?= Html::encode($value->price) ?>
							</div>
							<div class="col-xs-12">
<?php
if($value->status == 0){								
    if ($modelbalanceuser->balance >= $value->price) {
        echo Html::a('Add', ['approverequest', 'id' => Html::encode($value->id)], ['class' => 'btn btn-default btn-xs']);
    }
    else{
       $amountinvoice = $value->price - $modelbalanceuser->balance;
       echo Html::a('Add', ['newinvoice', 'amount' => Html::encode($amountinvoice)], ['class' => 'btn btn-default btn-xs']); 
    }
								
}
?>
							</div>
						</div>
					</div>
					<hr>
<?php
}
?>                
                                           
                </div>
            </div>
        </div>
	</div>
</div>
<?php
	}
}
//list requests
?>

<?php
//list comments

if (!\Yii::$app->user->isGuest) {
	if ($listcomments != NULL) {
?>
<div class="row top10">
	<div class="col-xs-12">
		<div class="portlet portlet-default">
            <div class="portlet-heading">
                <div class="portlet-title">
                    <h4>Comments</h4>
                </div>
                <div class="portlet-widgets">
                    <a data-toggle="collapse" data-parent="#accordion" href="#listofrequests"><i class="fa fa-chevron-down"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="listofrequests" class="panel-collapse collapse in">
                <div class="portlet-body">
<?php
foreach ($listcomments as $value) {
?>
					<div class="row">
						<div class="col-xs-3 col-sm-2">
							<?= Html::img('@web/images/avatar/'.$value->avatar, ['style' => 'height: 50px;']) ?>
						</div>
						<div class="col-xs-9 col-sm-10">
							<span class="badge blue"><?= Html::encode(date("H:i d.m.y", $value->created_at)) ?></span> <span class="badge orange link-comment"><?= Html::a(Html::encode($value->username),['profile', 'id' => Html::encode($value->id_user)]) ?></span>
							<hr>
							<?= Html::encode($value->comment) ?>
						</div>
						
					</div>
					<hr>
<?php
}
?>                
                                           
                </div>
            </div>
        </div>
	</div>
</div>
<?php
	}
}
//list comments
?>

<div class="row top10">
<?php
if (Yii::$app->user->identity->type == 'translater') {
	if ($modelorder->status == 3) {
	$usersendrequest = false;
	foreach ($listzaivki as $value) {
			if ($value->id_user == Yii::$app->user->identity->id) {
				$usersendrequest = true;
				break;
			}
		}	
		if ($usersendrequest == false) {
			
		
?>
	<div class="col-sm-6">


			
                                 <div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Send a request</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#basicFormExample"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="basicFormExample" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <?php $form = ActiveForm::begin(); ?>
                                                <div class="form-group">
                                                    <label>Price(<i class="fa fa-usd"></i>)</label>
                                                    <?= $form->field($newmodelzaivki, 'price')->textInput(['class' => 'form-control'])->label(false) ?>
                                                </div>
                                                <div class="form-group">
                                                    <label>Comment</label>
                                                    <?= $form->field($newmodelzaivki, 'comment')->textarea(['maxlength' => true, 'rows' => 6, 'placeholder' => 'Commnets'])->label(false) ?>
                                                </div>
                                                
                                                
                                                <?= Html::submitButton('Submit', ['class' => 'btn btn-default']) ?>
                                            <?php ActiveForm::end(); ?>
                                        </div>
                                    </div>
                                </div>


    

	</div>
<?php
		}
		
	}
}
if ($modelorder->status > 2) {
?>
	<div class="col-sm-6">
		<div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Add a comment</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#commentsform"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="commentsform" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <?php $form = ActiveForm::begin(); ?>
                                                
                                                <div class="form-group">
                                                    <label>Comment</label>
                                                    <?= $form->field($modelcomment, 'comment')->textarea(['maxlength' => true, 'rows' => 6, 'placeholder' => 'Commnets'])->label(false) ?>
                                                </div>
                                                
                                                
                                                <?= Html::submitButton('Submit', ['class' => 'btn btn-default']) ?>
                                            <?php ActiveForm::end(); ?>
                                        </div>
                                    </div>
                                </div>
	</div>
<?php
}
?>
</div>