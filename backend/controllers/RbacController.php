<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginForm;
use backend\models\SignupForm;

/**
 * Site controller
 */
class RbacController extends Controller
{
    public function actionInit ()
    {
        $auth = Yii::$app->authManager;
        // 添加 "/blog/index" 权限
        $blogIndex = $auth->createPermission('/user/index');
        $blogIndex->description = 'huiyuan列表';
        $auth->add($blogIndex);
        // 创建一个角色blogManage，并为该角色分配"/blog/index"权限
        $blogManage = $auth->createRole('huiyuan管理');
        $auth->add($blogManage);
        $auth->addChild($blogManage, $blogIndex);
        // 为用户 test1（该用户的uid=1） 分配角色 "博客管理" 权限
        $auth->assign($blogManage, 1); // 1是test1用户的uid
    }

    public function actionInit2 ()
    {
        $auth = Yii::$app->authManager;

        // 添加权限
        $blogView = $auth->createPermission('/user/view');
        $auth->add($blogView);
        $blogCreate = $auth->createPermission('/user/create');
        $auth->add($blogCreate);
        $blogUpdate = $auth->createPermission('/user/update');
        $auth->add($blogUpdate);
        $blogDelete = $auth->createPermission('/user/delete');
        $auth->add($blogDelete);

        // 分配给我们已经添加过的"博客管理"权限
        $blogManage = $auth->getRole('博客管理');
        $auth->addChild($blogManage, $blogView);
        $auth->addChild($blogManage, $blogCreate);
        $auth->addChild($blogManage, $blogUpdate);
        $auth->addChild($blogManage, $blogDelete);
    }
}
