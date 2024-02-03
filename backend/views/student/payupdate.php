<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Lids $payment */


?>
<div class="lids-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_payform', [
        'payment' => $payment,
    ])
    ?>

</div>