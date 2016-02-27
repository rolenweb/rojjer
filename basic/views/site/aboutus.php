<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'About RoJJoR';
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
              <h1>About RoJJoR</h1>
              <p>Команда RoJJoR  состоит из переводчиков с многолетним опытом работы и ИТ специалистов,  обладающих последними Know-how на рынке информационных технологий. Наш обширный опыт в переводческой области и последние тенденции на рынке привели нас к идее создать правильную платформу для наших пользователей, где работают только проверенные переводчики, квалифицированные в элитных университетах мира. При этом у нас нет взносов за регистрацию, нет абонентской платы, мы предоставляем широкий бесплатный сервис по Вашему проекту. </p>
              <p>Все очень просто, наглядно, качественно и сделано с умом!</p>
              <p>Наша команда строго следит за процессом работы на платформе и доступна для Вас 24 часа в сутки и 7 дней в неделю!</p>
              <p>Мы любим нашу работу, нашу платформу, поэтому мы уверены в нашем успехе и успехе наших пользователей!</p>
              <p>Убедитесь в правильности Вашего выбора прямо <a role="button" data-toggle="collapse" href="#collapsePriv" aria-expanded="false" aria-controls="collapsePriv">сейчас</a>:</p>
              <div class="collapse" id="collapsePriv">
				  <div class="well">
				    <div><a role="button" data-toggle="collapse" href="#collapseClient" aria-expanded="false" aria-controls="collapseClient">Привилегии для клиента</a></div>
				    <div class="collapse" id="collapseClient">
						  <div class="well">
						    <ul>
						    	<li>бесплатная регистрация</li>
						    	<li>0 % абонентской платы</li>
						    	<li>оплата за перевод только при полном выполнении всех пунктов заказа,  принцип платежного поручения «Pay Warrant»</li>
						    	<li>широкий языковой спектр</li>
						    	<li>свободный выбор переводчиков</li>
						    	<li>бесплатная услуга «Ассистент проекта» - мы перенимаем у Вас работу в поиске переводчика, наша команда бесплатно подбирает для Вас нужного переводчика согласно Вашим требованием. Как показывает практика, при выборе услуги «Ассистент проекта» клиент получает на много быстрее предложение по переводу,  а следовательно и выполненный заказ .</li>
						    	<li>переводчики с высшим образованием от элитных университетов мира</li>
						    	<li>переводы выполняются исключительно носителями языка </li>
						    	<li>строгий отбор переводчиков: каждый переводчик проверятся нашей командой лично на основе ранее выполненных работ и обратной связи, полученной от бывших заказчиков и работодателей</li>
						    </ul>
						  </div>
					  </div>
					<div><a role="button" data-toggle="collapse" href="#collapseTranslate" aria-expanded="false" aria-controls="collapseTranslate">Привилегии переводчика</a></div>
					<div class="collapse" id="collapseTranslate">
						  <div class="well">
						    <ul>
						    	<li>Нет заниженных цен за перевод - строгие правила конкурентной цены</li>
						    	<li>Бесплатная регистрация</li>
						    	<li>0 % абонентской платы</li>
						    	<li>100 % оплата переводческих услуг</li>
						    	<li>Наглядная и простая в использовании структура платформы</li>
						    	<li>Всю административную суету проектов перенимает наша команда</li>
						    	<li>Экономия времени – бесплатное извещение о новых проектах Ваших языковых комбинаций</li>
						    	
						    </ul>
						  </div>
					  </div>
					 <div><a role="button" data-toggle="collapse" href="#collapseConcurent" aria-expanded="false" aria-controls="collapseConcurent">Преимущество RoJJoR перед конкурентами</a></div>
					<div class="collapse" id="collapseConcurent">
						  <div class="well">
						    <table class="table-hover">
						    	<tr>
						    		<td></td>
						    		<td class="text-center">RoJJoR</td>
						    		<td class="text-center">Конкуренты*</td>
						    	</tr>
						    	<tr>
						    		<td>Абонентская плата</td>
						    		<td class="text-center">0</td>
						    		<td class="text-center">от 5</td>
						    	</tr>
						    	<tr>
						    		<td>Функция «Ассистент проекта» или «Посредник при поиске переводчика»</td>
						    		<td class="text-center">0</td>
						    		<td class="text-center">от 20</td>
						    	</tr>
						    	<tr>
						    		<td>Размещение проекта</td>
						    		<td class="text-center">Неограниченное колличество</td>
						    		<td class="text-center">Ограниченное колличество</td>
						    	</tr>
						    	<tr>
						    		<td>Участие в проектах</td>
						    		<td class="text-center">Неограниченное колличество</td>
						    		<td class="text-center">Ограниченное колличество</td>
						    	</tr>
						    	<tr>
						    		<td>Срочный перевод</td>
						    		<td class="text-center">0</td>
						    		<td class="text-center">от 8</td>
						    	</tr>
						    	<tr>
						    		<td>Удаление проекта</td>
						    		<td class="text-center">0</td>
						    		<td class="text-center">от 5</td>
						    	</tr>
						    </table>
						    <p>* Представление цены в EUR. Цена конкурентов – средняя цена на рынке.</p>
						    <p>Полный список услуг и цен Вы узнаете в разделе «<?= Html::a('Цены', ['site/pricing']) ?>» </p>
						  </div>
					  </div>
				  </div>
			  </div>

			

            </div>
          </div>
          
        </div>
</div>
<?= $this->render('_footer') ?>
