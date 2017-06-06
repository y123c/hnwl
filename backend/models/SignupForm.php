<?php
namespace backend\models;

use yii\base\Model;
use common\models\AdminUser;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $password;
    public $repassword;
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => '手机号',
            'password' => '密码',
            'repassword' => '确认密码',
        ];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\AdminUser', 'message' => '手机号已注册！'],
            //[['username'],'match','pattern'=>'/^[1][358][0-9]{9}$/'],

            [['password','repassword'], 'required'],
            [['password','repassword'], 'string', 'min' => 6],
            ['repassword', 'compare', 'compareAttribute' => 'password','message'=>'确认密码不一致！'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new AdminUser();
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        if ($user->save())
        {
            return $user;
        }
        else
        {
            return null;
        }
    }
}
