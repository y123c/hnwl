<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\DataHelper;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => '会员管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <p>
        <?= Html::a('编辑', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
    <h3>会员信息</h3>
    
    <?= DetailView::widget([
        'model' => $userInfo,
        'attributes' => [
            'company',
            'full_name',
            'idcard_front',
            'idcard_negative',
            'birthday',
            [
                'attribute'=>'gender',
                'value' => DataHelper::getValue(DataHelper::getGender(), $userInfo->gender),
            ],
            'profession'
        ],
    ]) ?>

	<h3>账户信息</h3>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email',
            'nickname',
            [
                'attribute'=>'verify_status',
                'value' => DataHelper::getValue(DataHelper::getVerifyStatus(), $model->verify_status),
            ],
            [
                'attribute'=>'verify_reason',
                'value' => empty($model->verify_reason)?'无':$model->verify_reason,
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
        ],
    ]) ?>

</div>
