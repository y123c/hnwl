<?php

namespace backend\controllers;

use Yii;
use common\models\ShopInfo;
use common\models\searchs\ShopInfo as ShopInfoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\helpers\DataHelper;
use common\helpers\SmsHelper;
use common\helpers\EmailHelper;
use common\models\ShopUser;
use common\models\Shop;

/**
 * ShopInfoController implements the CRUD actions for ShopInfo model.
 */
class ShopInfoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ShopInfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ShopInfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'statusMap' => DataHelper::getVerifyStatus()
        ]);
    }

    /**
     * Displays a single ShopInfo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ShopInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ShopInfo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ShopInfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $old_verify_status = $model->verify_status;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($old_verify_status != $model->verify_status)
            {
                if ($model->verify_status == ShopInfo::STATUS_VERIFY_FAILED)
                {
                    SmsHelper::sendSms('shopinfo-verify', '实名认证失败，失败原因：'.$model->verify_reason);
                }
                elseif ($model->verify_status == ShopInfo::STATUS_VERIFIED)
                {
                    $shop_id = Shop::newShop($model);
                    if ($shop_id != null)
                    {
                        $model->shop_id = $shop_id;
                        $model->save();
                    }
                    else
                    {
                        $model->verify_status = $old_verify_status;
                        $model->save();
                        \Yii::$app->session->setFlash('verifyError','服务器出错了,请联系技术员解决');
                    }
                    
                    $rand_pwd = ShopUser::signup($model);
                    if ($rand_pwd != null)
                    {
                        \Yii::$app->session->setFlash('rand_pwd',$rand_pwd);
                        SmsHelper::sendSms('shopinfo-verify', '恭喜您，您的商家信息验证成功，这是您的密码：'.$rand_pwd.'，请及时修改。');
                        EmailHelper::send();
                    }
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ShopInfo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ShopInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ShopInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ShopInfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
