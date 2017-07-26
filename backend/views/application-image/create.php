<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ApplicationImage */

$this->title = 'Create Application Image';
$this->params['breadcrumbs'][] = ['label' => 'Application Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
