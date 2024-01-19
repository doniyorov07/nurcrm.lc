<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Data $model */


$this->params['breadcrumbs'][] = ['label' => 'Datas', 'url' => ['index']];

?>
<div class="data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
