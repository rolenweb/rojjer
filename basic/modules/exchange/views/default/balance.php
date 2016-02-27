<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\money\MaskMoney;
/* @var $this yii\web\View */
$this->title = 'RoJJoR';
?>
<?= $this->render('_navbartop', [
    'countalertsorder' => $countalertsorder,
    'modelbalanceuser' => $modelbalanceuser,
    'countalertsbalance' => $countalertsbalance,
]); ?> 
<?= $this->render('_navbarside',[
    'modelprofile' => $modelprofile,

]); ?> 

<div id="page-wrapper">

            <div class="page-content">

                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i> Dashboard
                                </li>
                                <li class="active">Balance</li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->
                <?= $this->render('_flashmessage'); ?>
                <div class="row">
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a>
                                <div class="circle-tile-heading green">
                                    <i class="fa fa-money fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content green">
                                <div class="circle-tile-description text-faded">
                                    Balance
                                </div>
                                <div class="circle-tile-number text-faded">
                                    $<?= Html::encode($modelbalanceuser->balance) ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a>
                                <div class="circle-tile-heading red">
                                    <i class="fa fa-money fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content red">
                                <div class="circle-tile-description text-faded">
                                    Hold
                                </div>
                                <div class="circle-tile-number text-faded">
                                    $<?= Html::encode($modelbalanceuser->hold) ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a>
                                <div class="circle-tile-heading dark-blue">
                                    <i class="fa fa-money fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded">
                                    Total
                                </div>
                                <div class="circle-tile-number text-faded">
                                    $<?= Html::encode($modelbalanceuser->hold + $modelbalanceuser->balance) ?>
                                </div>
                               
                            </div>
                        </div>
                    </div>
<?php
if (!\Yii::$app->user->isGuest && Yii::$app->user->identity->type == 'client') {
?>                    
                    <div class="col-lg-2 col-sm-6">
                        <div class="add-balance">
                        <?php $form = ActiveForm::begin(); ?>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <?= $form->field($modelnewinvoice, 'amount')->textInput(['class' => 'form-control'])->label(false) ?>
                                </div>
                            </div>
                            <div class="col-xs-12 text-center">
                                   <?= Html::submitButton('Add balance', ['class' => 'btn btn-default']) ?>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                        </div>
                    </div>
<?php
}
?>                    
                  
                </div>
<?php
if (!\Yii::$app->user->isGuest && Yii::$app->user->identity->type == 'client') {

    echo $this->render('_balancelistinvoices',[
                    'modelinvoicelist' => $modelinvoicelist,
                ]);
}
 ?>
               

            </div>
            <!-- /.page-content -->

        </div>