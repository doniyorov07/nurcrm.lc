<?php

use common\components\buttons\GroupFormButton;
use common\enums\DaysEnums;
use common\models\Group;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\search\Group $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <?= GroupFormButton::create()?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                    'attribute' => 'group_name',
                    'format' => 'raw',
                    'value' => function($model)
                    {
                        return Html::a($model->group_name, ['view', 'id' => $model->id]);
                    }
            ],
            [
                'attribute' => 'course_id',
                'value' => static function ($model) {
                    return $model->course ? $model->course->name : '';
                }
            ],
            [
                'attribute' => 'days',
                'value' => static function ($model) {
                    $decoded = json_decode($model->days, true);
                    return is_array($decoded) ? implode('  ', $decoded) : '';
                },
            ],
            [
                'attribute' => 'hour',
                'value' => function ($model) {
                    return $model->hour ? $model->hour : '';
                },
            ],

            //'lesson_start',
            //'lesson_end',
            //'status',

        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
