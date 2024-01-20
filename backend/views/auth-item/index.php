<?php

use common\models\AuthItem;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\search\AuthItemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Auth Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Auth Item', ['create'], ['class' => 'btn btn-success', 'id' => 'create-button']) ?>
    </p>

    <?php Pjax::begin(['id' => 'prl-pjax']); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'type',
                'value' => static function ($model) {
                    return $model->type == 1 ? 'Role' : 'Permission';
                }
            ],
            'description:ntext',
            //'rule_name',
           // 'data',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function($url, $model){
                        return Html::a(
                            '<span class="fas fa-edit"></span>',
                            $url, ['class' => 'update-edit']);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'update') {
                        return ['auth-item/update', 'name' => $model->name];
                    } elseif ($action === 'delete') {
                        return ['auth-item/delete', 'name' => $model->name];
                    }
                    // Other actions go here if needed
                },
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>


<?php
Modal::begin([
    'id' => 'myModal',
]);

echo "<div id='modalContent'> Content</div>";

Modal::end();