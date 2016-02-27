<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\exchange\models\Orders3 */

$this->title = 'Create Orders3';
$this->params['breadcrumbs'][] = ['label' => 'Orders3s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders3-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
