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
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'course_id')->dropDownList(
                ModelToData::getCourse(),
            )
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'group_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <?= $form->field($model, 'days')->checkboxList(ModelToData::getDays()) ?>


    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'hour')->dropDownList(
                ModelToData::getHour(),
            )
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">

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
        </div>
        <div class="col-md-6">
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
        </div>
    </div>

            <?= $form->field($model, 'status')->widget(Select2::classname(), [
                'name' => 'status',
                'hideSearch' => true,
                'data' => GroupStatusEnums::LABELS,
                'options' => ['placeholder' => 'Guruh holatini tanlang'],
                'pluginOptions' => [
                    'allowClear' => true
                ]
            ])
            ?>





    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
