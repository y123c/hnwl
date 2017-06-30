<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OptionValue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="option-value-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'option_id')->dropDownList([$option[0]['id']=>$option[0]['name']],['style'=>'width:20%;']) ?>

    <?= $form->field($model, 'key')->textInput() ?>

    <?= $form->field($model, 'value')->textInput() ?>
    <?php if($model->isNewRecord){$model->is_show = 0;}?>
    <?= $form->field($model, 'is_show')->radioList([0=>'是',1=>'否']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
