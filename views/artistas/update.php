<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Artista */

$this->title = 'Modificando a ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Artistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="artista-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
