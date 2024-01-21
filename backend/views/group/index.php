<?php

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
        <?= Html::a('Create Group', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'group_name',
            [
                'attribute' => 'course_id',
                'value' => static function ($model) {
                    return $model->course ? $model->course->name : '';
                }
            ],

            [
                'attribute' => 'days',
                'value' => function ($model) {
                    return DaysEnums::LABELS[$model->days] ?? '';
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
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Group $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
