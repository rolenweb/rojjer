<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'News RoJJoR';
?>
<?= $this->render('_headertop' ,[
    'modellogintop' => $modellogintop,
    
]) ?>
<?= $this->render('_header') ?>


<div class="page-top">
        <div class="container">
        <?= $this->render('_modalmesage') ?>
        
          <div class="row">
            <div class="col-xs-12">
              <h1>NEWS</h1>
            </div>
          </div>
          
        </div>
</div>
<?= $this->render('_footer') ?>
