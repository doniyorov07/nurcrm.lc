<?php

use common\models\AuthAssignment;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var common\models\search\AuthAssigmentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Auth Assignments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Auth Assignment', ['create'], ['class' => 'btn btn-success',  'id' => 'create-button']) ?>
    </p>


    <?php Pjax::begin(['id' => 'prl-pjax']); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'item_name',
            [
                    'attribute' => 'user_id',
                   'value' => static function($model){
                        return $model->username->username;
                   }
            ],
            [
                'attribute' => 'created_at',
                'value' => function ($model) {
                    return Yii::$app->formatter->asDatetime($model->created_at);
                },
            ],
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
                        return ['auth-assigment/update', 'item_name' => $model->item_name, 'user_id' => $model->user_id];
                    } elseif ($action === 'delete') {
                        return ['auth-assigment/delete', 'item_name' => $model->item_name, 'user_id' => $model->user_id];
                    }
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
