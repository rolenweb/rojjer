<?php
use yii\helpers\Html;

$this->title = 'Update: '.$model->title;
?>
<?= $this->render('_navbartop', [
    
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
                                <li>
                                <?= Html::a(Html::tag('i','',['class' => 'fa fa-dashboard']).' Dashboard',['/admin']) ?>
                                </li>/
                                <li><?= Html::a(Html::tag('i','',['class' => 'fa fa-list-alt']).' Orders',['index']) ?></li>
                                <li class="active"><i class="fa fa-eye"></i><?= Html::encode($model->title) ?></li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->
                <?= $this->render('_flashmessage'); ?>
                <div class="row">
      				<div class="orders-update">

    
					    <?= $this->render('_form', [
					        'model' => $model,
					    ]) ?>

					</div>

                </div>

            </div>
            <!-- /.page-content -->

        </div>


