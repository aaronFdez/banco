<?php

/* @var $this yii\web\View */
use app\models\Album;
use app\models\Artista;
use yii\helpers\Html;

$this->title = 'Banco Manolito';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Música Sí</h1>
    </div>

    <div class="body-content" style="text-align:center">

        <div class="row">
            <div class="col-lg-4">
                <h2>Artistas</h2>
                <?= Html::img(Artista ::findOne(1)->foto, [ 'width' => '300px', 'height'=>'300px']); ?>
            </div>
            <div class="col-lg-4">
                <h2>Albumes</h2>
                    <?= Html::img(Album::findOne(1)->foto, [ 'width' => '300px', 'height'=>'300px']); ?>
            </div>
            <div class="col-lg-4">
                <h2>Temas</h2>
                <?= Html::img("https://lh6.googleusercontent.com/-3W3oL4lzCvs/T7qnN39ogJI/AAAAAAAAGSk/FEWJ8v40K-I/s800/homero-tema-musical-series.jpg", [ 'width' => '300px', 'height'=>'300px']); ?>
            </div>
        </div>

    </div>
</div>
