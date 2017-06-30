<?php

namespace backend\controllers;

use common\models\CategoryOption;
use Yii;
use common\models\OptionValue;
use common\models\OptionValueSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OptionValueController implements the CRUD actions for OptionValue model.
 */
class OptionValueController extends Controller
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
     * Lists all OptionValue models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OptionValueSearch();
        $option_id=yii::$app->request->get('option_id');
        $query = OptionValue::find();
        $option=CategoryOption::find()->where(['id'=>$option_id])->all();
        $dataProvider = new ActiveDataProvider([
            'query' => $query->where(['option_id'=>$option_id]),
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'option' => $option
        ]);
    }

    /**
     * Displays a single OptionValue model.
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
     * Creates a new OptionValue model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OptionValue();
        $option_id=yii::$app->request->get('option_id');
        $option=CategoryOption::find()->where(['id'=>$option_id])->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'option'=>$option
            ]);
        }
    }

    /**
     * Updates an existing OptionValue model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $option=CategoryOption::find()->where(['id'=>$model->option_id])->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'option'=>$option
            ]);
        }
    }

    /**
     * Deletes an existing OptionValue model.
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
     * Finds the OptionValue model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OptionValue the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OptionValue::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
