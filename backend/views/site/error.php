<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception*/

use yii\helpers\Html;

$this->title = $name;
?>


<section class="content">
    <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>

        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Voooy! <?= nl2br(Html::encode($message)) ?>
            </h3>

            <p>
                Siz qidirgan sahifani topa olmadik. Shu bilan birga,
                siz <a href="<?= \yii\helpers\Url::to(['/'])?>">bosh sahifaga</a> qaytishingiz mumkin.
            </p>

        </div>
        <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
</section>