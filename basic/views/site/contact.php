<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Contact';

?>
<?= $this->render('_headertop' ,[
    'modellogintop' => $modellogintop,
    
]) ?>
<?= $this->render('_header') ?>
<?= $this->render('_modalmesage') ?>
<section class="main-container">

                <div class="container">
                    <div class="row">

                        <!-- main start -->
                        <!-- ================ -->
                        <div class="main col-md-8">

                            <!-- page-title start -->
                            <!-- ================ -->
                            <h1 class="page-title">Contact Us</h1>
                            <!-- page-title end -->
                            
                            
                            <div class="contact-form">
                                <?php $form = ActiveForm::begin(['id' => 'contactform']); ?>
                                    <div class="form-group has-feedback">
                                        <label for="name">Name*</label>
                                        <?= $form->field($model, 'name')->textInput(['class' => 'form-control'])->label(false) ?>
                                        <i class="fa fa-user form-control-feedback"></i>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="email">Email*</label>
                                        <?= $form->field($model, 'email')->textInput(['class' => 'form-control'])->label(false) ?>
                                        <i class="fa fa-envelope form-control-feedback"></i>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="subject">Subject*</label>
                                        <?= $form->field($model, 'subject')->textInput(['class' => 'form-control'])->label(false) ?>
                                        <i class="fa fa-navicon form-control-feedback"></i>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="message">Message*</label>
                                        <?= $form->field($model, 'body')->textArea(['rows' => 6, 'class' => 'form-control'])->label(false) ?>
                                        <i class="fa fa-pencil form-control-feedback"></i>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="message">Verification Code*</label>
                                        <?= $form->field($model, 'verifyCode')->label(false)->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
                                    </div>
                                    <div class="text-center">
                                        <?= Html::submitButton('Submit', ['class' => 'submit-button btn btn-default', 'name' => 'contactbutton']) ?>
                                    </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                        <!-- main end -->

                        <!-- sidebar start -->
                        <aside class="col-md-4">
                            <div class="sidebar">
                                <div class="side vertical-divider-left">
                                    <h3 class="title">RoJJoR, Inc.</h3>
                                    <ul class="list">
                                        <li><strong></strong></li>
                                        <li><i class="fa fa-home pr-10"></i>795 Folsom Ave, Suite 600<br><span class="pl-20">San Francisco, CA 94107</span></li>
                                        <li><i class="fa fa-phone pr-10"></i><abbr title="Phone">P:</abbr> (123) 456-7890</li>
                                        <li><i class="fa fa-mobile pr-10 pl-5"></i><abbr title="Phone">M:</abbr> (123) 456-7890</li>
                                        <li><i class="fa fa-envelope pr-10"></i><a href="mailto:info@idea.com">info@rojjor.com</a></li>
                                    </ul>
                                    <ul class="social-links colored circle large">
                                        <li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                                        <li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                        <!-- sidebar end -->

                    </div>
                </div>
            </section>
<?= $this->render('_footer') ?>
