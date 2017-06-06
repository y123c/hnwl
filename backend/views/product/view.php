<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\DataHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '商品管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('编辑', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '您确定更要删除吗？',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute'=>'cover',
                'value' => '<img src="'.\Yii::getAlias('@web').$model->cover.'" />',
                'format'=>'html',
            ],
            [
                'attribute'=>'status',
                'value' => DataHelper::getValue(DataHelper::getGeneralStatus(), $model->status),
            ],
            [
                'attribute'=>'created_at',
                'format' => ['date', 'php:Y-m-d H:i:s']
            ],
            [
                'attribute'=>'updated_at',
                'format' => ['date', 'php:Y-m-d H:i:s']
            ],
            [
                'attribute'=>'desc',
                'format'=>'html',
            ],
        ],
    ]) ?>

</div>
