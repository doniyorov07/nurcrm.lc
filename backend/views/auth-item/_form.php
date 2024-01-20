<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\AuthItem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="auth-item-form">

    <?php $form = ActiveForm::begin(['id' => 'form-id']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->radioList(
        [1 => 'Role', 2 => 'Permission'],
        [
            'value' => $model->isNewRecord ? 1 : $model->type,
        ]
    ) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>



    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success', 'id' => 'save']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
