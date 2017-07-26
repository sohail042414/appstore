<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ApplicationImage */

$this->title = 'Update Application Image: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Application Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="application-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
