<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\search\Practice $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="practice-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'text') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'type_id') ?>

    <?php // echo $form->field($model, 'video_url') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'number') ?>

    <?php // echo $form->field($model, 'views_count') ?>

    <?php // echo $form->field($model, 'download_count') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
