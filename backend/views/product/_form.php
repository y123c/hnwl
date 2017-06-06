<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\helpers\DataHelper;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php 
    $pluginOptions = [
        'showPreview' => true,
        'showCaption' => true,
        'showRemove' => false,
        'showUpload' => false,
    ];
    if (!$model->isNewRecord && !empty($model->cover)) {
        $pluginOptions['initialPreview'] = \Yii::getAlias('@web').$model->cover;
        $pluginOptions['initialPreviewAsData'] = true;
    }
    ?>
	<?= $form->field($model, 'cover_file')->widget(FileInput::classname(), ['options' => ['accept' => 'image/jpg,image/jpeg,image/png'],
	    'pluginOptions' => $pluginOptions
	])->hint('jpg\png, 2MB');?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'style'=>'width:60%;']) ?>

    <?= $form->field($model, 'status')->dropDownList(DataHelper::getGeneralStatus(),['style'=>'width:20%;']) ?>

    <?= $form->field($model, 'desc')->widget('kucha\ueditor\UEditor'); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
