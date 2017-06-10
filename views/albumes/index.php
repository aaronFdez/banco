<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlbumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Albumes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar álbum', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
            'attribute' => 'titulo',
            'value' => function ($model, $key, $index, $column) {
                return Html::a(
                    $model->titulo,
                    ['albumes/view', 'id' => $model->id]
                );
            },
            'format' => 'html',
        ],
            [
            'label' => 'Artista',
            'attribute'=>'artista_id',
            'value' => function ($model, $key, $index, $column) {
                return Html::a(
                    $model->artista->nombre,
                    ['artistas/view', 'id' => $model->artista->id]
                );
            },
            'format' => 'html',
        ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
