<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserInfo */

$this->title = '个人信息';
$this->params['breadcrumbs'][] = '个人信息';
?>
<div class="user-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
