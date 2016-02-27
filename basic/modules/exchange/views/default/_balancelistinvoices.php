<?php
use yii\helpers\Html;
?>
 <div class="row">
                    <div class="portlet portlet-green">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4><i class="fa fa-exchange fa-fw"></i> Recent Invoices</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#transactionsPortlet"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="transactionsPortlet" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <div class="table-responsive dashboard-demo-table">
                                                <table class="table table-bordered table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Time</th>
                                                            <th>Amount($)</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
<?php
foreach ($modelinvoicelist as $value) {
?>
                                                        <tr>
                                                            <td><?= Html::encode(date("d/m/y", $value->created_at)) ?></td>
                                                            <td><?= Html::encode(date("H:i", $value->created_at)) ?></td>
                                                            <td><?= Html::encode($value->amount) ?></td>
<?php
if ($value->status == 1) {
?>
                                                            <td>
                                                                <?= Html::a(Html::tag('i','',['class' => 'fa fa-clock-o']).' Pending',['invoice', 'id' => $value->id], ['class' => 'btn btn-xs btn-orange']) ?>
                                                            </td>
<?php
}
?>                                                            
<?php
if ($value->status == 2) {
?>
                                                            <td>
                                                                
                                                                <?= Html::a(Html::tag('i','',['class' => 'fa fa-arrow-circle-right']).' Paid',['invoice', 'id' => $value->id], ['class' => 'btn btn-xs btn-green']) ?>
                                                            </td>
<?php
}
?>                                                            
<?php
if ($value->status == 0) {
?>
                                                            <td>
                                                            <?= Html::a(Html::tag('i','',['class' => 'fa fa-warning']).' Expired',['invoice', 'id' => $value->id], ['class' => 'btn btn-xs btn-red']) ?>
                                                            </td>
<?php
}
?>                                                            


                                                            
                                                        </tr>

<?php
}
?>                                                    
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                            <a class="btn btn-green">View All Transactions</a>
                                        </div>
                                    </div>
                                </div>
                </div>