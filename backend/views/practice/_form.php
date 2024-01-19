<?php

use kartik\date\DatePicker;
use kartik\file\FileInput;
use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Practice $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="practice-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'image')->widget(FileInput::classname(),[
                    'name' => 'attachment_53',
                    'pluginOptions' => [
                        'showCaption' => false,
                        'showRemove' => false,
                        'showUpload' => false,
                        'browseClass' => 'btn btn-primary btn-block',
                        'browseIcon' => '<i class="fas fa-camera"></i> ',
                        'browseLabel' =>  'Rasmni yuklang'
                    ],
                    'options' => ['accept' => 'image/*']
                ]); ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'file')->widget(FileInput::classname(),[
                    'name' => 'attachment_53',
                    'pluginOptions' => [
                        'showCaption' => false,
                        'showRemove' => false,
                        'showUpload' => false,
                        'browseClass' => 'btn btn-primary btn-block',
                        'browseIcon' => '<i class="fas fa-file"></i> ',
                        'browseLabel' =>  'Fayl yuklang'
                    ],
                    'options' => ['accept' => 'file/*']
                ]); ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'text')->textarea(['rows' => 1]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
                    'name' => 'check_issue_date',
                    'options' => ['placeholder' => 'E\'lon qilish sanasi...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd', // MySQL formatiga mos ravishda sozlangan
                        'todayHighlight' => true,
                    ],
                ]);
                ?>

            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'type_id')->textInput() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'video_url')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'number')->textInput() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                        'size' => 'mini',
                        'onColor' => 'success',
                        'offColor' => 'danger',
                        'onText' => "On",
                        'offText' => "Off",
                    ]
                ])?>
            </div>
            <div style="margin-top: 20px" class="col-md-6">
                <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
            </div>

        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
