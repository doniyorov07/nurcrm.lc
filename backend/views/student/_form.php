<?php

use common\enums\LidsEnums;
use common\models\ModelToData;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Lids $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lids-form">

    <?php $form = ActiveForm::begin(['id' => 'form-id']); ?>

    <?= $form->field($model, 'group_id')->dropDownList(
        ModelToData::getGroup(),
    )
    ?>

       <?= $form->field($model, 'group_created_at')->widget(DatePicker::classname(), [
        'name' => 'check_issue_date',
        'options' => ['placeholder' => 'Guruhga qo\'shilgan sana'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
            'todayHighlight' => true,
        ],
    ]);
      ?>


    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success', 'id' => 'save']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>

<?php if ($result['success']) : ?>
    <div class="alert alert-danger">
        <?= $result['error'] ?>
    </div>
<?php endif; ?>