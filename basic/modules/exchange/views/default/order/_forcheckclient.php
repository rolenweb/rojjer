<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="row top10">
	<div class="col-sm-12">
		<div class="portlet portlet-default">
            <div class="portlet-heading">
                <div class="portlet-title">
                    <h4>Ready Order</h4>
                </div>
                <div class="portlet-widgets">
                    <a data-toggle="collapse" data-parent="#accordion" href="#readyorder"><i class="fa fa-chevron-down"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="readyorder" class="panel-collapse collapse in">
                <div class="portlet-body">
					<div class="row">
<?php
if ($modelorder->textready !== NULL) {
?>
						<div class="col-sm-12">
							<?= HtmlPurifier::process($modelorder->textready) ?>
						</div>
<?php
}
if ($modelorder->filenameready !== NULL) {
?>
						
						<div class="col-sm-12">
							<?= Html::a(Html::tag('i','',['class' => 'fa fa-download fa-2x']), '@web/files/orders/'.$modelorder->filename) ?>
						</div>
<?php
}
?>					


					</div>
                                           
                </div>
            </div>
        </div>
	</div>
</div>