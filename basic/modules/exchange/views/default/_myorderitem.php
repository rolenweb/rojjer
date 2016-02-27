<?php
use yii\helpers\Html;
?>

<div class="col-md-12">
                        <div class="order-preview">
                            <div class="title-preview">
                                <h2>
                                    <?= Html::a(Html::encode($model->title), ['vieworder', 'id' => $model->id]) ?>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="cost-order-preview">
                                       <i class="fa fa-usd"></i> <?= Html::encode($model->cost) ?>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="catalog-preview"><span>Catalog:</span> Sport</div>
                                    <div class="language-preview"><span>Language:</span> En-RU</div>
                                    <div class="status-preview"><span>Status:</span> Active</div>
                                    <div class="translater-preview"><span>Translater(s):</span> John</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href=""><button class="btn btn-default btn-square pull-right">Details</button></a>
                                    <a href=""><button class="btn btn-default btn-square pull-right margin-right-10">Comments</button></a>
                                </div>
                            </div>
                        </div>
                    </div>