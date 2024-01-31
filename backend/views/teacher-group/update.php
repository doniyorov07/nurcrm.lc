<?php


use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Teacher $model */

$this->title = 'Update Teacher-Group: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Teacher-Group', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="teacher-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
