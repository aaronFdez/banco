<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArtistaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Artistas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artista-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Añadir artista', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
            'label' => 'Nombre',
            'attribute'=>'nombre',
            'value' => function ($model, $key, $index, $column) {
                return Html::a(
                    $model->nombre,
                    ['artistas/view', 'id' => $model->id]
                );
            },
            'format' => 'html',
        ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
