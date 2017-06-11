<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tema */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Temas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tema-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'titulo',
            'artista.nombre',
            'album.titulo:text:Album',
            'tiempo:text:Duración',

        ],
    ]) ?>
    <div class="row">
        <div class="col-lg-5">
            <h2>Portada</h2>
            <?= Html::img($model->album->foto, [ 'width' => '300px', 'height'=>'300px']); ?>
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
                'confirm' => '¿Seguro que desea borrar el tema ' . $model->titulo . '?',
                'method' => 'post',
            ],
            ]) ?>
        </p>

</div>
