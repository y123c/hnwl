<?php

use yii\helpers\Html;
use common\helpers\UtilHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = '汉诺威力商城';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>汉诺威力商城欢迎您！</h1>

        <p class="lead">您可以开始愉快的购物体验了。</p>
    </div>
</div>

<div class="product-list">
	<?php $i=1; foreach ($products as $p) {?>
	<div class="box<?php if ($i%4!=0)echo ' mr';?>">
		<div class="cover"><a href="<?php echo Url::toRoute(['product/detail', 'id'=>$p->id])?>"><img src="<?php echo \Yii::getAlias('@web').UtilHelper::getThumb($p->cover)?>" /></a></div>
		<div class="name"><a href="<?php echo Url::toRoute(['product/detail', 'id'=>$p->id])?>"><?php echo Html::encode($p->name);?></a></div>
	</div>
	<?php $i++;}?>
	
	<div class="clear"></div>
</div>