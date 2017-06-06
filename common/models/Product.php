<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\helpers\UtilHelper;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $cover
 * @property string $desc
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Product extends \yii\db\ActiveRecord
{
    public $cover_file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
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
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['cover'], 'string', 'max' => 255],
            [['desc'], 'string'],
            [['cover_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxSize' => 1024*1024*2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'cover' => '封面',
            'cover_file' => '封面',
            'desc' => '详情',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '上次更新时间',
        ];
    }
    
    public function uploadCover($dirName='product/images')
    {
        if (empty($this->cover_file))
        {
            return false;
        }
        return UtilHelper::upload($this->cover_file, $dirName, 230, 230);
    }
}
