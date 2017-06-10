<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Album */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Albumes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'titulo',
            'artista.nombre'
        ],
    ]) ?>
    <div class="row">
        <div class="col-lg-5">
            <h2>Portada</h2>
            <?= Html::img($model->foto, [ 'width' => '300px', 'height'=>'300px']); ?>
        </div>
        <div class="col-lg-5">
            <h2><?= "Artista:" . $model->artista->nombre ?></h2>
            <?= Html::img($model->artista->foto, [ 'width' => '300px', 'height'=>'300px']); ?>
        </div>
    </div>
    <br/>

</br/>
    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que quieres borrar el álbum ' . $model->titulo . '?',
                'method' => 'post',
            ],
            ]) ?>
        </p>

</div>
