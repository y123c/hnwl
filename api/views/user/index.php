<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\searchs\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '会员管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'username',
            'email',
            'nickname',
            [
                'attribute'=>'verify_status',
                'value' => function($data) use ($verifyStatusMap){
                return isset($verifyStatusMap[$data->verify_status])?$verifyStatusMap[$data->verify_status]:'未定义';
                },
                'filter' => $verifyStatusMap
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
