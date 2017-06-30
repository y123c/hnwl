<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList($cate_id,['style'=>'width:20%;']) ?>

    <div>
        <p>电机铁芯：
        <select id="select1" >
            <option value="DLMT">有铁芯</option>
            <option value="DLMU">无铁芯</option>
            <option value="DLMF">水冷</option>
        </select>
        </p>
    </div>
    <div>
        <p>马达型号：
            <select id="select2" >
                <option value="A">A系列</option>
                <option value="S">S系列</option>
                <option value="C">C系列</option>
            </select>
            <input id="" value="">（0-17）
        </p>
    </div>
    <div>
        <p>动子数量：
           <input id="" value="">
        </p>
    </div>
    <div>
        <p>行程(mm)：
            <input id="" value="">
        </p>
    </div>
    <div>
        <p>位置回馈：
            <select id="selectID" >
                <option value=""></option>
            </select>
        </p>
    </div>
    <div>
        <p>拖链方式：
            <select id="selectID" >
                <option value=""></option>
            </select>
        </p>
    </div>
    <div>
        <p>防尘装置：
            <select id="selectID" >
                <option value=""></option>
            </select>
        </p>
    </div>
    <div>
        <p>安装方式：
            <select id="selectID" >
                <option value=""></option>
            </select>
        </p>
    </div>
    <div>
        <p>线缆长度：
            <select id="selectID" >
                <option value=""></option>
            </select>
        </p>
    </div>
    <div>
        <p>型材宽度：
            <select id="selectID" >
                <option value=""></option>
            </select>
        </p>
    </div>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cover')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->radioList(array(0=>'开启',1=>'关闭')) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
