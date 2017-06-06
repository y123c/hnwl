<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $serial_id
 * @property string $total_money
 * @property integer $pay_status
 * @property string $paid_money
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serial_id'], 'required'],
            [['total_money', 'paid_money'], 'number'],
            [['pay_status', 'status', 'created_at', 'updated_at'], 'integer'],
            [['serial_id'], 'string', 'max' => 100],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serial_id' => 'Serial ID',
            'total_money' => 'Total Money',
            'pay_status' => 'Pay Status',
            'paid_money' => 'Paid Money',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
