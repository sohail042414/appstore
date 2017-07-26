<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Application */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="application-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'playstore_url')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'version')->textInput() ?>

    <?= $form->field($model, 'special')->checkbox() ?>

    <?= $form->field($model, 'featured')->checkbox() ?>

    <?= $form->field($model, 'status')->dropDownList(array(1 => 'Active', 0 => 'Disabled')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
