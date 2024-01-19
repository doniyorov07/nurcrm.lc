<?php

use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\AuthItem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="auth-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->radioList(
        [1 => 'Role', 2 => 'Permission'],
        [
            'value' => $model->isNewRecord ? 1 : $model->type,
        ]
    ) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

<!--    --><?php //= $form->field($model, 'rule_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data')->textInput() ?>

<!--    --><?php //= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?php //= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

Modal::begin([
    'title' => '<h4>' . Yii::t('app', 'Create New Item') . '</h4>',
    'toggleButton' => ['label' => 'Create New', 'class' => 'btn btn-success'],
    'footer' => Html::submitButton('Save', ['class' => 'btn btn-success']),
]);

// ActiveForm orqali modalni ichini to'ldirish
$form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data'], // Agar fayllarni yuborishni qo'shmoqchi bo'lsangiz
    'action' => ['create'], // Create actionni o'zgartiring
]);

// Modelni o'zgartirish uchun shakl qo'shing
echo $form->field($model, 'description')->textInput();
echo $form->field($model, 'description')->textInput();

ActiveForm::end();

// Modalni yakunlash
Modal::end();
