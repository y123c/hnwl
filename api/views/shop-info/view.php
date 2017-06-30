<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\DataHelper;

/* @var $this yii\web\View */
/* @var $model common\models\ShopInfo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '商家申请列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-info-view">

	<?php if (Yii::$app->session->hasFlash('rand_pwd')) {?>
	<div class="alert alert-warning" role="alert">
	<?php echo Yii::$app->session->getFlash('rand_pwd')?>，这是刚发放的随机密码，测试用，此消息只出现一次
	</div>
	<?php }?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('编辑', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除吗？',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
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
                'value' => DataHelper::getValue(DataHelper::getVerifyStatus(), $model->verify_status),
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
