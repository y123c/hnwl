<?php

namespace frontend\controllers;

use common\models\Product;
use yii\web\NotFoundHttpException;

class ProductController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDetail($id)
    {
        $product = Product::findOne($id);
        if (!is_object($product))
        {
            throw new NotFoundHttpException('参数错误');
        }
        
        return $this->render('detail',[
            'product' => $product
        ]);
    }
}
