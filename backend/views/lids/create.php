<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Lids $model */

$this->title = 'Create Lids';
$this->params['breadcrumbs'][] = ['label' => 'Lids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lids-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
