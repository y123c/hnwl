<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\helpers\DataHelper;
use common\models\ShopInfo;

/* @var $this yii\web\View */
/* @var $model common\models\ShopInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if (Yii::$app->session->hasFlash('verifyError')) {?>
<div class="alert alert-danger" role="alert">
<?php echo Yii::$app->session->getFlash('verifyError')?>
</div>
<?php }?>
	
<div class="shop-info-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'owner_phone')->textInput(['disabled'=>true, 'maxlength' => true,'style'=>'width:50%;']) ?>

    <?= $form->field($model, 'owner_name')->textInput(['disabled'=>true, 'maxlength' => true,'style'=>'width:50%;']) ?>

    <?= $form->field($model, 'owner_idcard')->textInput(['disabled'=>true, 'maxlength' => true,'style'=>'width:50%;']) ?>

    <?= $form->field($model, 'compay_email')->textInput(['disabled'=>true, 'maxlength' => true,'style'=>'width:50%;']) ?>

    <?= $form->field($model, 'compay_account')->textInput(['disabled'=>true, 'maxlength' => true,'style'=>'width:50%;']) ?>

    <?= $form->field($model, 'compay_address')->textInput(['disabled'=>true, 'maxlength' => true,'style'=>'width:50%;']) ?>

    <?= $form->field($model, 'business_license')->textInput(['disabled'=>true, 'maxlength' => true,'style'=>'width:50%;']) ?>

    <?= $form->field($model, 'organization_code')->textInput(['disabled'=>true, 'maxlength' => true,'style'=>'width:50%;']) ?>

    <?= $form->field($model, 'social_credit_code')->textInput(['disabled'=>true, 'maxlength' => true,'style'=>'width:50%;']) ?>

    <?= $form->field($model, 'taxpayer_code')->textInput(['disabled'=>true, 'maxlength' => true,'style'=>'width:50%;']) ?>

    <?= $form->field($model, 'verify_status')->dropDownList(DataHelper::getVerifyStatus(),['style'=>'width:20%;']) ?>
    
    <?= $form->field($model, 'verify_reason')->textarea(['maxlength'=>true,'style'=>'width:20%;']) ?>

    <div class="form-group">
        <?= Html::submitButton('更新', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
<?php $this->beginBlock('test') ?>  
toggleReason();

$('#shopinfo-verify_status').change(function(){
	toggleReason();
});

function toggleReason()
{
	if ($('#shopinfo-verify_status').val() == <?php echo ShopInfo::STATUS_VERIFY_FAILED?>)
	{
		$('.field-shopinfo-verify_reason').show();
	}
	else
	{
		$('.field-shopinfo-verify_reason').hide();
	}
}
<?php $this->endBlock() ?>  
</script>
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>