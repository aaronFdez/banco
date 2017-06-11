<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TemaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Temas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tema-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Añadir tema', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'artista.nombre:text:Artista',
            'titulo',
            'album.titulo:text:Album',
            'tiempo:text:Duración',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
