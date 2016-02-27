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
    echo $this->render('profile/_ratinglist',['model' => $modelprofile]);
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
                                            

                                            <div class="col-lg-5 col-md-3">
                                                <h1><?= Html::encode($modelprofile->first_name) ?> <?= Html::encode($modelprofile->second_name) ?></h1>
<?php
if ($model_aboutme != NULL) {
?>
                                                <div class="aboutme-profile">
                                                    <?= HtmlPurifier::process($model_aboutme->text) ?>
                                                </div>
<?php    
}
?>                                                
                                                <ul class="list-unstyled">
                                                <?php
                                                if ($model->type == 'translater' && $modelprofile->native_language != NULL) {
                                                ?>
                                                <li><i class="fa fa-check-circle-o"></i> Native language: <?= Html::encode($modelprofile->native_language) ?></li>
                                                <?php
                                                }
                                                if ($model->type == 'translater' && $modelprofile->first_language != NULL) {
                                                ?>
                                                <li><i class="fa fa-check-circle-o"></i> First Foreign Language: <?= Html::encode($modelprofile->first_language) ?></li>
                                                <?php
                                                }
                                                if ($model->type == 'translater' && $modelprofile->level_knowledge_fl != NULL) {
                                                ?>
                                                <li><i class="fa fa-check-circle-o"></i> First Foreign Language Level: <?= Html::encode($modelprofile->level_knowledge_fl) ?></li>
                                                <?php
                                                }
                                                if ($model->type == 'translater' && $modelprofile->foreign_language2 != 'not') {
                                                ?>
                                                <li><i class="fa fa-check-circle-o"></i> Second Foreign Language: <?= Html::encode($modelprofile->foreign_language2) ?></li>
                                                <?php
                                                    if ($model->type == 'translater' && $modelprofile->level_knowledge_fl2 != NULL) {
                                                    ?>
                                                    <li><i class="fa fa-check-circle-o"></i> Second Foreign Language Level: <?= Html::encode($modelprofile->level_knowledge_fl2) ?></li>
                                                    <?php
                                                    }
                                                }
                                                
                                                if ($model->type == 'translater' && $modelprofile->experience != NULL) {
                                                    if ($modelprofile->experience == 1) {
                                                ?>
                                                <li><i class="fa fa-check-circle-o"></i> Experience: < 1 year </li>
                                                <?php
                                                    }
                                                    if ($modelprofile->experience == 2) {
                                                ?>
                                                <li><i class="fa fa-check-circle-o"></i> Experience: 1 - 5 years </li>
                                                <?php
                                                    }
                                                    if ($modelprofile->experience == 3) {
                                                ?>
                                                <li><i class="fa fa-check-circle-o"></i> Experience: > 5 years </li>
                                                <?php
                                                    }
                                                }
                                                if ($model->type == 'translater' && $modelprofile->type_industry != NULL) {
                                                ?>
                                                <li><i class="fa fa-check-circle-o"></i> Category: <?= Html::encode($modelprofile->type_industry) ?></li>
                                                <?php
                                                }
                                                if ($model->type == 'translater' && $modelprofile->price_translation_word != NULL) {
                                                ?>
                                                <li><i class="fa fa-check-circle-o"></i> Price translation word: <?= Html::encode($modelprofile->price_translation_word) ?></li>
                                                <?php
                                                }
                                                if ($model->type == 'translater' && $modelprofile->price_translation_string != NULL) {
                                                ?>
                                                <li><i class="fa fa-check-circle-o"></i> Price translation string: <?= Html::encode($modelprofile->price_translation_string) ?></li>
                                                <?php
                                                }
                                                if ($model->type == 'translater' && $modelprofile->price_proofreading_word != NULL) {
                                                ?>
                                                <li><i class="fa fa-check-circle-o"></i> Price proofreading word: <?= Html::encode($modelprofile->price_proofreading_word) ?></li>
                                                <?php
                                                }
                                                if ($model->type == 'translater' && $modelprofile->price_proofreading_string != NULL) {
                                                ?>
                                                <li><i class="fa fa-check-circle-o"></i> Price proofreading string: <?= Html::encode($modelprofile->price_proofreading_string) ?></li>
                                                <?php
                                                }
                                                ?>                
                                                  
                                                </ul>
                                                
                                                
                                            </div>
                                            <div class="col-lg-4 col-md-5">
                                                <div class="calendar-icon-profile">
                                                    <?= \talma\widgets\FullCalendar::widget([
    'googleCalendar' => true,  // If the plugin displays a Google Calendar. Default false
    'loading' => 'Carregando...', // Text for loading alert. Default 'Loading...'
    'config' => [
        // put your options and callbacks here
        // see http://arshaw.com/fullcalendar/docs/
        'events' => [
            [
                'title' => 'Holiday',
                'start' => '2015-10-05',
                'end'  => '2015-10-07'
            ],
            [
                'title' => 'Holiday',
                'start' => '2015-10-08',
                'end'  => '2015-10-09'
            ],
        ]
        
    ],
]); ?>

                                                </div>
                                            </div>
                                        </div>