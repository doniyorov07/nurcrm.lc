<?php

use common\components\buttons\TeacherGroupButton;
use common\models\Group;
use common\models\TeacherGroup;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\TeacherSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Teacher Group';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="teacher-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= TeacherGroupButton::create() ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'teacher_id',
                'format' => 'raw',
                'value' => function($model)
                {
                    return $model->teacher->full_name;
                }
            ],
            [
                'attribute' => 'group_id',
                'format' => 'raw',
                'value' => function($model)
                {
                    $decoded = json_decode($model->group->days, true);
                    $daysString = is_array($decoded) ? implode(', ', $decoded) : '';
                    return '<i class="badge badge-danger "> ' . $model->group->group_name . '</i> <i class="badge badge-warning">' . $daysString . ' </i> <i class="badge badge-primary">' . $model->group->hour . '</i>';
                }
            ],


            [
                'class' => ActionColumn::className(),
                'template' => '{update} &nbsp {delete}',
                'urlCreator' => function ($action, TeacherGroup $model, $key, $index, $column) {
                    if ($action === 'update') {
                        return Url::toRoute(['teacher-group/update', 'id' => $model->id]);
                    } elseif ($action === 'delete') {
                        return Url::toRoute(['teacher-group/delete', 'id' => $model->id]);
                    }
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return TeacherGroupButton::update($model->id);
                    },
                ],
            ],

        ],
    ]); ?>


</div>
