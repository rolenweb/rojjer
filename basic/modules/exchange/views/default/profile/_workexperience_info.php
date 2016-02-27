<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>                                        
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4">
                                               
                                                
                                                <?= Html::img('@web/images/avatar/'.$modelprofile->photo, ['class' => 'img-responsive img-profile']) ?>
                                            <?php 
                                            if (Yii::$app->user->identity->id == $model->id) {
                                            ?>

                                            <?php 
                                            }
                                            ?>
                                                <hr>
                                                <div class="rating">
<?php
    echo $this->render('_ratinglist',['model' => $modelprofile]);
?>
                                                </div>
                                                <hr>
                                                <div class="country-profile">
                                                    <?= Html::encode($modelprofile->country) ?>
                                                </div>
                                                <hr>
                                                <div class="portlet portlet-default">
                                                    <div class="portlet-heading">
                                                        <div class="portlet-title">
                                                            <h4>Price($)</h4>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th><span data-toggle="tooltip" data-placement="top" title="Translation">T</span></th>
                                                                        <th><span data-toggle="tooltip" data-placement="top" title="Proofreading">P</span></th>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th><span data-toggle="tooltip" data-placement="top" title="Word">W</span></th>
                                                                        <td>
                                                                            <?= Html::encode($modelprofile->price_translation_word_f) ?></td>
                                                                        
                                                                        <td><?= Html::encode($modelprofile->price_proofreading_word_f) ?></td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <th><span data-toggle="tooltip" data-placement="top" title="String">S</span></th>
                                                                        <td><?= Html::encode($modelprofile->price_translation_string_f) ?></td>
                                                                        <td><?= Html::encode($modelprofile->price_proofreading_string_f) ?></td>
                                                                        
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                
                                            </div>
                                            

                                            <div class="col-lg-9 col-md-8">
                                                <h1>Work experience</h1>
<?php
if ($model_workexperience != NULL) {
?>
                                                <div class="aboutme-profile">
                                                    <?= HtmlPurifier::process($model_workexperience->text) ?>
                                                </div>
<?php    
}
?>                                                
                                                
                                                
                                                
                                            </div>
                                            
                                        </div>