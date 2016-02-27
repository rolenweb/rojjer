<?php
use yii\helpers\Html;

foreach ($modelsorderuser as $modelorderuser) {
    if ($modelorderuser->id == $model->id_order) {
        $currentmodelorder = $modelorderuser;
    }
}
?>


<div class="col-md-12">
                        <div class="order-preview">
                            <div class="title-preview">
                                <h2>
                                    <?= Html::a(Html::encode($currentmodelorder->title), ['viewmonitor', 'id' => $model->id]) ?>
                                </h2>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="progress monitor-progress">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= Html::encode($model->done) ?>%;">
                                        <?= Html::encode($model->done) ?>%
                                      </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    
                                    <?= Html::a('Details', ['viewmonitor', 'id' => $model->id], ['class' => 'btn btn-default btn-square pull-right']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
               