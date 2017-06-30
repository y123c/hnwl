<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OptionValueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '属性值';
$this->params['breadcrumbs'][] = ['label' => '商品分类', 'url' => ['category/index']];
$this->params['breadcrumbs'][] = ['label' => $option[0]['name'],'url' => ['category-option/index','category_id'=>$option[0]['category_id']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="option-value-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建 属性值', ['create','option_id'=>$option[0]['id']], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'option_id',
            'key',
            'value',
            'is_show',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
