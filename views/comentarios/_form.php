<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Comentario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comentario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'comentario')->textarea(['rows' => 6, 'column' =>100]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Publicar comentario' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
