<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Lids $model */

$this->title = 'Update Lids: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lids', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lids-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
