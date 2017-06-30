<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\searchs\ShopInfo */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '商家申请列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'owner_phone',
            'owner_name',
            'compay_account',
            [
                'attribute'=>'verify_status',
                'value' => function($data) use ($statusMap){
                return isset($statusMap[$data->verify_status])?$statusMap[$data->verify_status]:'未定义';
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
