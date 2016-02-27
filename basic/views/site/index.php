<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'RoJJoR';
?>
<?= $this->render('_headertop' ,[
    'modellogintop' => $modellogintop,
    
]) ?>
<?= $this->render('_header') ?>

<?= $this->render('_banner') ?>
<div class="page-top">
        <div class="container">
        <?= $this->render('_modalmesage') ?>
        
          <div class="row">
            <div class="col-md-6 home-client">
              <h3>For client</h3>
              <p>text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text</p>
              <?php
              if (Yii::$app->user->isGuest) {
               ?>
              <div class="row">
                <div class="col-xs-6">
                  <div class="btn-login">
                    
                    <?= Html::a('Log in', ['site/login'],['class' => 'btn btn-default']) ?>
                  </div>
                </div>
              
                <div class="col-xs-6">
                  <div class="btn-signup">
                    <?= Html::a('Sign up', ['site/signup'],['class' => 'btn btn-default']) ?>
                  </div>    
                </div>
              </div>
              <?php
                }
               ?>
            </div>
            <div class="col-md-6 home-translater">
              <h3>For translaters</h3>
              <p>text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text</p>
              <?php
              if (Yii::$app->user->isGuest) {
               ?>
              <div class="row">
                <div class="col-xs-6">
                  <div class="btn-login">
                    
                    <?= Html::a('Log in', ['site/login'],['class' => 'btn btn-default']) ?>
                  </div>
                </div>
              
                <div class="col-xs-6">
                  <div class="btn-signup">
                    <?= Html::a('Sign up', ['site/signup'],['class' => 'btn btn-default']) ?>
                  </div>    
                </div>
              </div>
              <?php
                }
               ?>
            </div>
          </div>
          
        </div>
</div>
<?= $this->render('_footer') ?>
