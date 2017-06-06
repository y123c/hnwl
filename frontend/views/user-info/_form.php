<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\DateTimePickerAsset;

/* @var $this yii\web\View */
/* @var $model common\models\UserInfo */
/* @var $form yii\widgets\ActiveForm */

DateTimePickerAsset::register($this);
?>

<div class="user-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true,'style'=>'width:50%;']) ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true, 'style'=>'width:20%;']) ?>

    <?= $form->field($model, 'profession')->textInput(['maxlength' => true, 'style'=>'width:20%;']) ?>

    <?= $form->field($model, 'birthday')->textInput(['readonly'=>true, 'style'=>'width:20%;']) ?>
    
    <?= $form->field($model, 'gender')->radioList([1 => '男',2 => '女'], ['class' => 'radio']) ?>
    
    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php $this->beginBlock('test') ?>  
$('#userinfo-birthday').datetimepicker({
	format: 'yyyy-mm-dd',
	language:  'zh-CN',
	weekStart: 1,
	todayBtn:  1,
	autoclose: 1,
	todayHighlight: 1,
	minView:2,
});
<?php $this->endBlock() ?>  
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
