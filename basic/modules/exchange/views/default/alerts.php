<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'RoJJoR';
?>
<?= $this->render('_navbartop',[
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
                                <li><i class="fa fa-dashboard"></i> <?= Html::a('Dashboard', ['exchange/index']) ?>
                                </li>
                                <li class="active">Alerts</li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->
                <?= $this->render('_flashmessage'); ?>
                <div class="row">
                    <div class="col-xs-12">
                    <div class="table-responsive mailbox-messages">
                                            <table class="table table-bordered table-striped table-hover">
                                                <tbody>
<?php
if ($modellistalert != NULL) {
    

foreach ($modellistalert as $value) {
?>
                                                     <tr class="unread-message clickableRow">
                                                        
                                                        <td class="msg-col">
<?php
    if ($value->type == 0) {
        if ($models_order != NULL) {
            foreach ($models_order as $model_order) {

                if ($value->id_order == $model_order->id) {
                    $title_order = $model_order->title;
                    break;
                }
            }
        }
        
?>
                                                            <span class="label green">Orders</span> <span class="label orange"><?= Html::encode(date("H:i d.m.y", $value->created_at)) ?></span> <?= Html::a($value->comment.' ('.Html::encode($title_order).')', ['vieworder', 'id' => $value->id_order]) ?>
<?php
    }
    if ($value->type == 1) {
        
?>
                                                            <span class="label green">Balance</span> <span class="label orange"><?= Html::encode(date("H:i d.m.y", $value->created_at)) ?></span> <?= Html::encode($value->comment) ?>
<?php        
    }
?>
                                                            
                                                            
                                                        </td>
                                                        <td class="text-center"><?= Html::a(Html::tag('i','',['class' => 'fa fa-trash-o']),['alertdelete', 'id' => $value->id]) ?></td>
                                                    </tr>
<?php
}
}
?>
                                                   
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                    </div>
                </div>

            </div>
            <!-- /.page-content -->

        </div>