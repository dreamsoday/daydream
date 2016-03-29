<?php
namespace frontend\models;
use Yii;
use yii\base\Model;
class Login extends Model
{
    public $pwd;
    public $name;
    public $verifyCode;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // verifyCode needs to be entered correctly
            [['name', 'pwd'], 'required'],
            ['verifyCode', 'captcha'],
        ];
    }
    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => '',
            'name' => '用户名',
            'pwd' => '密码',
        ];
    }
}
 ?>
