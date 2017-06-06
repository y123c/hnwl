<?php

namespace common\helpers;

/**
 * Created by PhpStorm.
 * User: teavoid
 * Date: 16/9/26
 * Time: 22:23
 */
class DataHelper {
    static public function getValue($data,$key)
    {
        if (isset($data[$key]))
        {
            return $data[$key];
        }
        else
        {
            return '未定义';
        }
    }
    
    static public function getGeneralStatus()
    {
        return [
            10=>'正常',
            0=>'未激活',
        ];
    }
    
    static public function getYesOrNo()
    {
        return [
            0=>\Yii::t('app', 'No'),
            1=>\Yii::t('app', 'Yes'),
        ];
    }
}