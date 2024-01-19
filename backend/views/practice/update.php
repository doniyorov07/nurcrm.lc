<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Practice $model */

$this->title = 'Tahrirlash';
$this->params['breadcrumbs'][] = ['label' => 'Practices', 'url' => ['index']];
?>
<div class="practice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
