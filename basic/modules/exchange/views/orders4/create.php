<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\exchange\models\Orders4 */

$this->title = 'Create Orders4';
$this->params['breadcrumbs'][] = ['label' => 'Orders4s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders4-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
