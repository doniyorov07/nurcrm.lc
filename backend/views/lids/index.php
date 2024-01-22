<?php

use common\models\Lids;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\search\LidsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lids';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lids-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lids', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'username',
            'full_name',
            'number',
//            [
//                    'attribute' => 'teacher',
//                    'value' => static  function($model)
//                    {
//                        return $model->id;
//                    }
//            ],
            //'parent_number',
            //'parent_name',
            //'gender',
            //'password',
            //'telegram',
            //'location',
            [   
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Lids $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>



