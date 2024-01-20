<?php

use common\models\AuthAssignment;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\AuthAssignment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(['id' => 'form-id']); ?>

    <?= $form->field($model, 'item_name')->dropDownList(
        AuthAssignment::getAuthItems(),
    ) ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        AuthAssignment::getUsers(),
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'id' => 'save']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
