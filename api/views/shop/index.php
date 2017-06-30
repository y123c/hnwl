<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\searchs\Shop */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '商家列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
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
