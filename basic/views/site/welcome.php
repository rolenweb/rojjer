<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'RoJJoR';
?>
<?= $this->render('_headertop' ,[
    'modellogintop' => $modellogintop,
    
]) ?>
<?= $this->render('_header') ?>


<div class="page-top">
        <div class="container">
        <?= $this->render('_modalmesage') ?>
        
          <div class="row">
            <div class="col-md-12">
              <h3>Наш мир</h3>
              <div>
                Бесплатная регистрация и отсутствие абонентской платы!
              </div>
             <div>
               «Проверенные переводчики самых элитных университетов мира»
             </div>
             <div>
               «Грамотный подход к делу – переводы исключительно от носителей языка»
             </div>
             <div>
               «Все просто, удобно и сделано с умом!»
             </div>
             <div>
               <?= Html::a('Узнайте о Ваших привилегиях у нас.', ['site/aboutus']) ?>
             </div>
             <div>
               <?= Html::a('Зарегистрироваться прямо сейчас!', ['site/signup']) ?>
             </div>
            </div>
            
          </div>
          
        </div>
</div>
<?= $this->render('_footer') ?>
