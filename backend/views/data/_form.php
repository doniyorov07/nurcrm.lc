<?php

use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Data $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => true, 'disabled' => true]) ?>


    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
        'pluginOptions' => [
            'size' => 'mini',
            'onColor' => 'success',
            'offColor' => 'danger',
            'onText' => "On",
            'offText' => "Off",
        ]
    ])?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
