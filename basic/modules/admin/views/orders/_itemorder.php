<?php
use yii\helpers\Html;
?>
<tr>
	<td>
		<?= Html::encode($model->id) ?>
	</td>
	<td>
		<?= Html::encode($model->status) ?>
	</td>
	<td>
		<?= Html::encode(date("d.m.y",$model->created_at)) ?>
	</td>
	<td>
		<?= Html::encode(date("d.m.y",$model->updated_at)) ?>
	</td>
	<td>
		<?= Html::encode($model->cost) ?>
	</td>
	<td>
		<?= Html::a(Html::tag('i','',['class' =>'fa fa-eye']),['view', 'id' => $model->id]) ?>
		<?= Html::a(Html::tag('i','',['class' =>'fa fa-pencil-square-o']),['update', 'id' => $model->id]) ?>
		
	</td>
</tr>