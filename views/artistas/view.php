<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Artista */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Artistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artista-view">

    <h1><?= Html::encode($this->title) ?></h1>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'nombre',
                    ],
                ]) ?>

        <?= Html::img($model->foto, ['title' => $model->nombre , 'width' => '500px', 'height'=>'auto']); ?>
        <br  /><br  />

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que quieres borrar a ' . $model->nombre .  '?',
                'method' => 'post',
            ],
            ]) ?>
        </p>
</div>