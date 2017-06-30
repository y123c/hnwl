<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\helpers\DataHelper;


/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php
    ?>
    <?= $form->field($model, 'category_id')->dropDownList($cate_id,['style'=>'width:20%;']) ?>

    <?= $form->field($model, 'cover_file')->fileInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'style'=>'width:60%;']) ?>

    <?= $form->field($model, 'status')->dropDownList(DataHelper::getGeneralStatus(),['style'=>'width:20%;']) ?>

    <?= $form->field($model, 'desc')->textarea()?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
