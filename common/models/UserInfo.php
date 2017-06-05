<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_info".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $full_name
 * @property string $birthday
 * @property integer $gender
 * @property string $company
 * @property string $profession
 */
class UserInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['user_id','unique'],
            [['user_id'], 'required'],
            [['user_id', 'gender'], 'integer'],
            [['birthday'], 'safe'],
            [['full_name'], 'string', 'max' => 20],
            [['company'], 'string', 'max' => 100],
            [['profession'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'full_name' => '姓名',
            'birthday' => '生日',
            'gender' => '性别',
            'company' => '公司',
            'profession' => '职位',
        ];
    }
    
    static public function newUserInfo($user_id)
    {
        $model= new UserInfo();
        $model->user_id = $user_id;
        $model->save();
        return $model;
    }
}
