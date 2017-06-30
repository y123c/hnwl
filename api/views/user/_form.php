<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\helpers\DataHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'verify_status')->dropDownList(DataHelper::getVerifyStatus(),['style'=>'width:20%;']) ?>
	<?= $form->field($model, 'verify_reason')->textarea(['maxlength'=>true,'style'=>'width:20%;']) ?>
	<?= $form->field($model, 'status')->dropDownList(DataHelper::getGeneralStatus(),['style'=>'width:20%;']) ?>

    <div class="form-group">
        <?= Html::submitButton('更新', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
<?php $this->beginBlock('test') ?>  
toggleReason();

$('#user-verify_status').change(function(){
	toggleReason();
});

function toggleReason()
{
	if ($('#user-verify_status').val() == <?php echo User::STATUS_VERIFY_FAILED?>)
	{
		$('.field-user-verify_reason').show();
	}
	else
	{
		$('.field-user-verify_reason').hide();
	}
}
<?php $this->endBlock() ?>  
</script>
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>