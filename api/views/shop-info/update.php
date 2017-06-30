<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ShopInfo */

$this->title = 'Update Shop Info: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Shop Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shop-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
