<?php

use common\components\buttons\TeacherFormButton;
use common\models\Teacher;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\TeacherSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Teachers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= TeacherFormButton::create() ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'full_name',
                'format' => 'raw',
                'value' => function($model)
                {
                    return Html::a($model->full_name, ['view', 'id' => $model->id]);
                }
            ],

            'number',
            //'birth_day',
            //'gender',
            //'password',
            //'status',
            [
                'class' => ActionColumn::className(),
                'template' => '{update}',
                'urlCreator' => function ($action, Teacher $model, $key, $index, $column) {
                    if ($action === 'update') {
                        return Url::toRoute(['teacher/update', 'id' => $model->id]);
                    }
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                 'buttons' => [
                 'update' => function ($url, $model, $key) {
                  return TeacherFormButton::update($model->id);
        },
    ],
            ],
        ],
    ]); ?>


</div>
