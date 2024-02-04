<?php

use common\models\ModelToData;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\web\JsExpression;
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
        <?= Html::submitButton('Save', [
            'class' => 'btn btn-success',
            'onclick' => new JsExpression('
           $.ajax({
                type: "POST",
                url: $(this).closest("form").attr("action"),
                data: $(this).closest("form").serialize(),
                success: function(data) {
                    console.log(data); 
                    if (data && data.success) {
                        location.reload();
                    } else {
                        var errorMessage = data && data.error ? data.error : "Guruhni o\'qituvchiga biriktirib bo\'lmaydi.";
                        alert(errorMessage);
                    }
                },
            });

            return false;
        ')
        ]) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
