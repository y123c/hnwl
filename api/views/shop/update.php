<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Shop */

$this->title = '编辑商家：' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '商家列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="shop-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
