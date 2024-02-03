<?php

use common\models\ModelToData;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Lids $payment */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lids-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($payment, 'group_id')->dropDownList(
        ModelToData::getGroup(),
    )
    ?>

    <?= $form->field($payment, 'pay_amount')->textInput(); ?>


    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
