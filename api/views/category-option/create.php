<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CategoryOption */

$this->title = '创建 分类属性';
$this->params['breadcrumbs'][] = ['label' => '商品分类', 'url' => ['category/index']];
$this->params['breadcrumbs'][] = ['label' => '分类属性', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-option-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category'=>$category
    ]) ?>

</div>
