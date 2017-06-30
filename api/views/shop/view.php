<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\DataHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Shop */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '商家列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>
    
    <h3>认证信息</h3>
    
    <?= DetailView::widget([
        'model' => $shopinfo,
        'attributes' => [
            'id',
            'owner_phone',
            'owner_name',
            'owner_idcard',
            'compay_email',
            'compay_account',
            'compay_address',
            'business_license',
            'organization_code',
            'social_credit_code',
            'taxpayer_code',
            [
                'attribute'=>'verify_status',
                'value' => DataHelper::getValue(DataHelper::getVerifyStatus(), $shopinfo->verify_status),
            ],
        ],
    ]) ?>

</div>
