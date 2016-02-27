<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\exchange\models\Orders2 */

$this->title = 'Create Orders2';
$this->params['breadcrumbs'][] = ['label' => 'Orders2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
