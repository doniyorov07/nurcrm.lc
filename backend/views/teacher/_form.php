<?php

use common\enums\LidsEnums;
use common\enums\StatusEnums;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var common\models\Teacher $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="teacher-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->widget(MaskedInput::className(), [
        'name' => 'input-1',
        'mask' => ['99 999 99 99']
    ]) ?>


    <?= $form->field($model, 'birth_day')->widget(DatePicker::classname(), [
        'name' => 'check_issue_date',
        'options' => ['placeholder' => 'Tug\'ilsan sana...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'autoclose' => true,
        ],
    ]);
    ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'gender')->radioList([
                LidsEnums::MALE => 'Erkak',
                LidsEnums::FEMALE => 'Ayol',
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'status')->radioList([
                StatusEnums::ACTIVE => 'Faol',
                StatusEnums::INACTIVE => 'No Faol',
            ]) ?>
        </div>

    </div>


    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
