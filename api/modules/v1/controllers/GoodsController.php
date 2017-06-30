<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\web\Response;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
class GoodsController extends ActiveController
{
//https://github.com/y123c/hnwl.git;
    public $modelClass = 'api\modules\v1\models\Goods';
//    public function behaviors()
//    {
//        $behaviors = parent::behaviors();
//        #定义返回格式是：JSON
//        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
//        return $behaviors;
//    }


    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
                HttpBasicAuth::className(),
                HttpBearerAuth::className(),
                QueryParamAuth::className(),
            ],
        ];
        return $behaviors;
    }
    /**
     * @inheritdoc
     */
    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
            'view' => ['GET', 'HEAD'],
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH'],
            'delete' => ['DELETE'],
        ];
    }

    public function actions()
    {
        $actions = parent::actions();

        // 注销系统自带的实现方法
        unset($actions['index']);
        unset($actions['create']);
        unset($actions['update']);
        unset($actions['delete']);

        return $actions;
    }

//覆盖父类的actionIndex方法,并进行重写
    public function actionIndex()
    {
        return [11];
    }

    public function actionTest()
    {
       echo 1;
    }

}
