<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Contact';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div id="page-wrapper">

            <div class="page-content">

                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>
                                <?= Html::encode($this->title) ?>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i> <?= Html::a('Dashboard', ['exchange/index']) ?>
                                </li>
                                <li class="active">Contact us</li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->
                <div class="row">
                   <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

                    <div class="alert alert-success">
                        Thank you for contacting us. We will respond to you as soon as possible.
                    </div>


                    <?php else: ?>

                    <p>
                        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
                    </p>

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                                <?= $form->field($model, 'name') ?>
                                <?= $form->field($model, 'email') ?>
                                <?= $form->field($model, 'subject') ?>
                                <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
                                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                                ]) ?>
                                <div class="form-group text-right">
                                    <?= Html::submitButton('Submit', ['class' => 'btn btn-default btn-square', 'name' => 'contact-button']) ?>
                                </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>

                    <?php endif; ?>
                </div>

            </div>
            <!-- /.page-content -->

        </div>