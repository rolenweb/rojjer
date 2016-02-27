<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\DetailView;


$this->title = $model->title;
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
                    <div class="orders-view">
                        <table class="table table-striped table-bordered detail-view">
                            <tr>
                                <th>Type</th>
                                <th>Source Language</th>
                                <th>Target Language</th>
                            </tr>
                            <tr>
                                <td>
                                <?php
                                        echo $this->render('_typelist',['modelorder' => $model]);
                                ?>
                                </td>
                                <td>
                                    <?php
                                        echo $this->render('_languagelist',['lang' => $model->lang_from]);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo $this->render('_languagelist',['lang' => $model->lang_to]);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Date(create)</th>
                                <th>Date(update)</th>
                                <th>Deadline</th>
                            </tr>
                            <tr>
                                <td><?= Html::encode(date("d.m.y",$model->created_at)) ?></td>
                                <td><?= Html::encode(date("d.m.y",$model->updated_at)) ?></td>
                                <td><?= Html::encode(Yii::$app->formatter->asDate($model->srok, "php:d.m.y")) ?></td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <th>Online monitoring</th>
                                <th>Project assistant</th>
                            </tr>
                            <tr>
                                <td>
                                    
                                    <?php
                                        echo $this->render('_categorylist',['modelorder' => $model]);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if ($model->monitor == 1) {
                                            echo "ON";
                                        }
                                        else{
                                            echo "OFF";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if ($model->assistant == 1) {
                                            echo "ON";
                                        }
                                        else{
                                            echo "OFF";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Experience</th>
                                <th>Rating</th>
                                <th>Country</th>
                            </tr>
                            <tr>
                                <td>
                                    <?php
                                        echo $this->render('_experience',['experience' => $model->experience]);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo $this->render('_raringlist',['rating' => $model->level]);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo $this->render('_countrylist',['modelorder' => $model]);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <th>Cost</th>
                                <th>Total cost</th>
                            </tr>
                            <tr>
                                <td>
                                    <?php
                                        echo $this->render('_statuslist',['status' => $model->status]);
                                    ?>
                                </td>
                                <td><?= Html::encode($model->cost) ?></td>
                                <td><?= Html::encode($model->totalcost) ?></td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td colspan="2"><?= Html::encode($model->title) ?></td>
                            </tr>
                           
                            
                            
                            
                            
                           
<?php
if ($model->text !== NULL) {
?>
                            <tr>
                                <th>Original text</th>
                                <td colspan="2"><?= HtmlPurifier::process($model->text) ?></td>
                            </tr>
<?php    
}
if ($model->texthiden !== NULL) {
?>
                            <tr>
                                <th>Text for transleters</th>
                                <td colspan="2"><?= HtmlPurifier::process($model->texthiden) ?></td>
                            </tr>
<?php    
}
if ($model->commentclient !== NULL) {
?>
                            <tr>
                                <th>Comments to client</th>
                                <td colspan="2"><?= HtmlPurifier::process($model->commentclient) ?></td>
                            </tr>
<?php    
}
if ($model->commenttranslate !== NULL) {
?>
                            <tr>
                                <th>Comments to translater</th>
                                <td colspan="2"><?= HtmlPurifier::process($model->commenttranslate) ?></td>
                            </tr>
<?php    
}
if ($model->filename != NULL) {
?>

                            <tr>
                                <th>File Original</th>
                                <td colspan="2"><?= Html::a(Html::tag('i','',['class' => 'fa fa-download fa-2x']), '@web/files/orders/'.$model->filename) ?></td>
                            </tr>
<?php    
}
?>                            

                        
<?php
if ($modelreadyorder !== NULL) {
    if ($modelreadyorder->text !== NULL) {

?>


                            <tr>
                                <th>Text from Transleter</th>
                                <td colspan="2"><?= HtmlPurifier::process($modelreadyorder->text) ?></td>
                            </tr>

<?php        
    }
    if ($modelreadyorder->filename !== NULL) {
?>

<?php        
    }
?>
                            <tr>
                                <th>File from translater</th>
                                <td colspan="2"><?= Html::a(Html::tag('i','',['class' => 'fa fa-download fa-2x']), '@web/files/orders/'.$modelreadyorder->filename) ?></td>
                            </tr>
                        </table>

<?php    
}
?>                            
                        
    

    <p class="text-right">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    

</div>

                </div>

            </div>
            <!-- /.page-content -->

        </div>


