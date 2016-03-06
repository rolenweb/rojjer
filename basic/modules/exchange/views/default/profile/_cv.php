<?php
use yii\helpers\Html;
echo Html::beginTag('div',['class' => 'alert alert-danger unvisible', 'id' => 'block-cv-error']);

echo Html::endTag('div');
echo Html::beginTag('div',['class' => 'alert alert-success unvisible', 'id' => 'block-result']);

echo Html::endTag('div');
echo Html::beginTag('div',['id' => 'block-spinner', 'class' => 'unvisible text-center']);
	echo Html::tag('i','',['class' => 'fa fa-spinner fa-pulse fa-4x']);
echo Html::endTag('div');
echo Html::beginTag('div',['class' =>' text-right']);
	echo Html::beginTag('form',['name' => 'form-load-cv-file', 'method' => 'post', 'enctype' => 'multipart/form-data']);
		echo Html::input('text', 'user', Yii::$app->user->identity->id,['type' => 'hidden']);	
		echo Html::input('text', '_csrf', Yii::$app->request->getCsrfToken(),['type' => 'hidden']);			
		echo Html::beginTag('div',['class' => 'row']);
			echo Html::beginTag('div',['class' => 'col-sm-10']);
				echo Html::fileInput('imageFiles');			
			echo Html::endTag('div');	
			echo Html::beginTag('div',['class' => 'col-sm-2']);
				echo Html::submitButton(Html::tag('i','',['class' => 'fa fa-download']), ['class' => 'btn btn-primary btn-xs',]);
			echo Html::endTag('div');	
		echo Html::endTag('div');
			
		
	echo Html::endTag('form');
echo Html::endTag('div');
echo Html::beginTag('p',['class' => 'help-block']);
	echo Html::beginTag('i',['class' => 'fa fa-warning']);
		echo 'Supported formats: PNG, OPT, DOCX, JPEG, PDF';
	echo Html::endTag('i');	
echo Html::endTag('p');

?>