<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OptionValue */

$this->title = 'Update Option Value: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Option Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="option-value-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'option'=>$option,
    ]) ?>

</div>
