<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\DataHelper;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = '编辑会员：' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '会员管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <h3>会员信息</h3>
    
    <?= DetailView::widget([
        'model' => $userInfo,
        'attributes' => [
            'company',
            'full_name',
            [
                'attribute'=>'idcard_front',
                'value' =>"<img src='".QIANTAI.$userInfo->idcard_front."'/>",
                'format'=>'raw',
            ],
            [
                'attribute'=>'idcard_negative',
                'value' =>"<img src='".QIANTAI.$userInfo->idcard_negative."'/>",
                'format'=>'raw',
            ],
            'birthday',
            [
                'attribute'=>'gender',
                'value' => DataHelper::getValue(DataHelper::getGender(), $userInfo->gender),
            ],
            'profession'
        ],
    ]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
