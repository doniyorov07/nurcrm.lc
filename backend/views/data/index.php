<?php

use common\enums\StatusEnums;
use common\models\Data;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\Data $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?php //= Html::a('<i class="fa fa-plus" aria-hidden="true"> Qo\'shish</i>', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'key',
            'value',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    return StatusEnums::COLOR[$model->status] ?? '';
                },
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{update}',
                'urlCreator' => function ($action, Data $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
            ],
        ],
    ]); ?>


</div>
