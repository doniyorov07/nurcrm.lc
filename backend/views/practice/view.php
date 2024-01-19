<?php

use common\enums\StatusEnums;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Practice $model */

$this->params['breadcrumbs'][] = ['label' => 'Practice', 'url' => ['index']];
\yii\web\YiiAsset::register($this);
?>
<div class="practice-view">
        <p>
        <?= Html::a('Tahrirlash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'title',
            'text:ntext',
            'date',
            'type_id',
            'video_url:url',
            [
                'attribute' => 'image',
                'format' => 'html',
                'label' => 'Foto',
                'value' => function($model){
                    return Html::img('/practice/image/' . $model->image,
                        ['
                        width' => '60px',
                            'heigth' => '100px'
                        ],
                    );
                },
            ],
            'file',
            'number',
            'views_count',
            'download_count',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    return StatusEnums::COLOR[$model->status] ?? '';
                },
            ],
        ],
    ]) ?>

</div>
