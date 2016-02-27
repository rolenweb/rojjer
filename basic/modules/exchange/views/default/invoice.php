<?php
use yii\helpers\Html;
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
                                <li class="active">Invoice</li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->
                <?= $this->render('_flashmessage'); ?>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-12">
                        <div class="portlet portlet-default">
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h1><i class="fa fa-gears"></i> RoJJoR</h1>
                                        <br>
                                        <address>
                                            <strong>RoJJoR Inc.</strong>
                                            <br>795 Folsom Ave, Suite 600
                                            <br>San Francisco, CA 94107
                                            <br>
                                            <abbr title="Phone">P:</abbr>(123) 456-7890
                                        </address>
                                    </div>
                                    <div class="col-md-6 invoice-terms">
                                        <h3>Invoice #<?= Html::encode($modelnewinvoice->id) ?></h3>
                                        <p>
                                            Invoice Date: <?= Html::encode(date("d/m/y", $modelnewinvoice->created_at)) ?>
                                            <br>
<?php
if ($modelnewinvoice->status == 2) {
?>
                                            <strong><span class="text-red">PAID</span></strong>
<?php
}
else if(time() < $modelnewinvoice->due_at) {
?>
                                            <strong><span class="text-red">Payment Due: <?= Html::encode(date("d/m/y", $modelnewinvoice->due_at)) ?></span></strong>
<?php
}
else{
?>
                                            <strong><span class="text-red">EXPIRED</span></strong>
<?php    
}
?>                                            

                                        </p>
                                    </div>
                                </div>
                                <!-- /.row -->
<?php
if ($modelnewinvoice->status < 2 && time() < $modelnewinvoice->due_at) {
?>                                
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Bill to</h3>
                                        <address>
                                            
<?php
if ($modelprofile->first_name != NULL) {
?>
Name: <?= Html::encode($modelprofile->first_name) ?>
<?php
}
?>
<?php
if ($modelprofile->second_name != NULL) {
?>
<?= Html::encode($modelprofile->second_name) ?>
<?php
}
?>
                                             
<?php
if ($modelprofile->country != NULL) {
?>
<br>Address: <?= Html::encode($modelprofile->country) ?><br>
<?php
}
?>                                             
                                            
Customer ID <?= Html::encode($modelnewinvoice->id_user) ?>                                            
                                            <br>
<?php
if ($modelprofile->phone != NULL) {
?>
<abbr title="Phone">Phone:</abbr><?= Html::encode($modelprofile->phone) ?>
<?php
}
?>                                             
                                            
                                        </address>
                                    </div>
                                    <div class="col-md-6 invoice-terms">
                                        <h3>Payment Instructions</h3>
                                        

                                        <?= Html::a('Pay Online Now',['addbalance', 'id' => $modelnewinvoice->id], ['class' => 'btn btn-green']) ?>


                                    </div>
                                </div>
                                <!-- /.row -->
<?php
}
?>                     
                                <hr>

<?php
$service_fee = 0.02;
$fee = round($modelnewinvoice->amount*$service_fee, 2);
$subtotal = $modelnewinvoice->amount + $fee;
$taxproc = 0.2;
$tax = 0;//round($subtotal*$taxproc, 2);
$total = round($subtotal + $tax, 2);
?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3>Items</h3>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Quantity</th>
                                                        
                                                        <th>Description</th>
                                                        <th>Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        
                                                        <td>Translation fee</td>
                                                        <td>$<?= Html::encode($modelnewinvoice->amount) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        
                                                        <td>Service fee (<?php echo $service_fee*100 ?>%)</td>
                                                        <td>$<?= Html::encode($fee) ?></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td></td>
                                                        
                                                        <td class="text-right"><strong>Subtotal:</strong>
                                                        </td>
                                                        <td><strong>$<?= Html::encode($subtotal) ?></strong>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr class="text-red">
                                                        <td></td>
                                                        
                                                        <td class="text-right"><strong>Total Amount Due by <?= Html::encode(date("d/m/y", $modelnewinvoice->due_at)) ?>:</strong>
                                                        </td>
                                                        <td><strong>$<?= Html::encode($total) ?></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                        <!--<a class="btn btn-green"><i class="fa fa-download"></i> Download Invoice as PDF</a>-->
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <h3>Thank you for your business!</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.page-content -->

        </div>