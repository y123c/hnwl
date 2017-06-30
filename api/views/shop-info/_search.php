<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\searchs\ShopInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'shop_id') ?>

    <?= $form->field($model, 'owner_phone') ?>

    <?= $form->field($model, 'owner_name') ?>

    <?= $form->field($model, 'owner_idcard') ?>

    <?php // echo $form->field($model, 'compay_email') ?>

    <?php // echo $form->field($model, 'compay_account') ?>

    <?php // echo $form->field($model, 'compay_address') ?>

    <?php // echo $form->field($model, 'business_license') ?>

    <?php // echo $form->field($model, 'organization_code') ?>

    <?php // echo $form->field($model, 'social_credit_code') ?>

    <?php // echo $form->field($model, 'taxpayer_code') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
