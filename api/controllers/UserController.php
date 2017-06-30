<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use common\models\searchs\User as UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\helpers\DataHelper;
use common\models\UserInfo;
use common\helpers\SmsHelper;
use common\helpers\EmailHelper;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'verifyStatusMap' => DataHelper::getVerifyStatus(),
            'statusMap' => DataHelper::getGeneralStatus(),
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $userInfo = UserInfo::find()->where(['user_id'=>$id])->one();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'userInfo' => $userInfo,
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
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
                if ($model->verify_status == User::STATUS_VERIFY_FAILED)
                {
                    SmsHelper::sendSms('user-verify', '实名认证失败，失败原因：'.$model->verify_reason);
                }
                elseif ($model->verify_status == User::STATUS_VERIFIED)
                {
                    SmsHelper::sendSms('user-verify', '恭喜您，实名认证成功');
                    EmailHelper::send();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $userInfo = UserInfo::find()->where(['user_id'=>$id])->one();
            return $this->render('update', [
                'model' => $model,
                'userInfo' => $userInfo,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
