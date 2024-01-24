<?php

use common\enums\DaysEnums;
use common\enums\GroupStatusEnums;
use common\models\Group;

use common\models\ModelToData;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Group $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'course_id')->dropDownList(
        ModelToData::getCourse(),
    )
    ?>

    <?= $form->field($model, 'group_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'days')->widget(Select2::classname(), [
        'name' => 'status',
        'hideSearch' => true,
        'data' => [
            DaysEnums::ODD_DAYS => 'Toq kunlar',
            DaysEnums::EVEN_DAYS => 'Juft kunlar',
        ],
        'options' => ['placeholder' => 'Darsni kunini tanlang...'],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ])?>


    <?= $form->field($model, 'hour')->dropDownList(
        ModelToData::getHour(),
    )
    ?>

    <?= $form->field($model, 'lesson_start')->widget(DatePicker::classname(), [
        'name' => 'check_issue_date',
        'options' => ['placeholder' => 'Darsni boshlanish sanasi...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'autoclose' => true,
        ],
    ]);
    ?>

    <?= $form->field($model, 'lesson_end')->widget(DatePicker::classname(), [
        'name' => 'check_issue_date',
        'options' => ['placeholder' => 'Darsni tugash sanasi...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'autoclose' => true,
        ],
    ]);
    ?>

    <?= $form->field($model, 'status')->widget(Select2::classname(), [
        'name' => 'status',
        'hideSearch' => true,
        'data' => [
            GroupStatusEnums::WAITING => 'Guruh yig\'ilyapti',
            GroupStatusEnums::ACTIVE => "Guruh faol",
            GroupStatusEnums::INACTIVE => "Guruh yopilgan",
        ],
        'options' => ['placeholder' => 'Darsni kunini tanlang...'],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ])
    ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
