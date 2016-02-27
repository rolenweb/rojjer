<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Pricing';
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
              <h3>Цены</h3>
              <h4>Для заказчика</h4>
              <table class="table-striped">
                <tr>
                  <td></td>
                  <td class="text-center">Цена в EUR</td>
                </tr>
                <tr>
                  <td>Регистрация </td>
                  <td class="text-center">0</td>
                </tr>
                <tr>
                  <td>Абонентская плата</td>
                  <td class="text-center">0</td>
                </tr>
                <tr>
                  <td>Услуга «Ассистент проекта»</td>
                  <td class="text-center">0</td>
                </tr>
                <tr>
                  <td>Размещение проекта</td>
                  <td class="text-center">0</td>
                </tr>
                <tr>
                  <td>Запрос на получение предложения о стоимости перевода</td>
                  <td class="text-center">0</td>
                </tr>
                <tr>
                  <td>Комиссия за проект</td>
                  <td class="text-center">От 3 % от суммы заказа*</td>
                </tr>
                <tr>
                  <td>Услуга «Pay Warrant»</td>
                  <td class="text-center">0</td>
                </tr>
                <tr>
                  <td>Поиск переводчиков</td>
                  <td class="text-center">0</td>
                </tr>
                <tr>
                  <td>Опция «Срочный заказ»</td>
                  <td class="text-center">0</td>
                </tr>
                <tr>
                  <td>Удаление проекта</td>
                  <td class="text-center">0</td>
                </tr>
              </table>
              <p>*Размеры комиссии за проект зависят от стоимости заказа на перевод. Заказ стоимостью до USD 5000 - комиссия составляет 10%,  от USD 5000 до 20000 – 6%, от USD 20000 - 3%.</p>
              <h2>Для переводчика</h2>
              <table class="table-striped">
                <tr>
                  <td></td>
                  <td>Цена в EUR</td>
                </tr>
                <tr>
                  <td>Регистрация</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td>Абонентская плата</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td>Извещение о новых проектах</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td>Неограниченное кол-во рекомендаций</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td>Комиссия за получение заказа на перевод</td>
                  <td>10% от суммы заказа</td>
                </tr>
                
              </table>
              <h2>Общее – Сборы за денежные транзакции</h2>
              <table class="table-striped">
                <tr>
                  <td>За использование кредитной карты</td>
                  <td>EUR 0,30+2,9%</td>
                </tr>
                <tr>
                  <td>PayPal</td>
                  <td></td>
                </tr>
              </table>
            </div>
            
          </div>
          
        </div>
</div>
<?= $this->render('_footer') ?>
