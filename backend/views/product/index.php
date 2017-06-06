<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\searchs\Product */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '商品管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增商品', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name',
            [
                'attribute'=>'cover',
                'value' => function($data){
                    return '<img src="'.\Yii::getAlias('@web').$data->cover.'" width="100" />';
                },
                'format'=>'html',
                'filterInputOptions' => ['class' => 'form-control','disabled'=>true]
            ],
            [
                'attribute'=>'status',
                'value' => function($data) use ($statusMap){
                    return isset($statusMap[$data->status])?$statusMap[$data->status]:'未定义';
                },
                'filter' => $statusMap
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
                'filterInputOptions' => ['class' => 'form-control','disabled'=>true]
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
