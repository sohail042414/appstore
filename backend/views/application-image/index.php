<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchApplicationImage */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Application Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-image-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Application Image', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'application_id',
            'name',
            'type',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
