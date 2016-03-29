<?php

namespace frontend\models;

use yii\base\Model;

class Levelform extends Model
{
    public $vip_discount;
    public $vip_price;
    public $vip_subtract;
    public $vip_name;
    public function rules()
    {
        return  [
            ['vip_discount', 'integer', 'min' => 0, 'max' => 100, 'message' => '只能输入到100,多了可不好使!'],
            ['vip_discount', 'required','message' => '你发现了么,少添东西了!'],
            ['vip_price', 'number', 'min' => 0, 'max' => 9999, 'message' => '只能输入4位数,多了可不好使!'],
            ['vip_price', 'required','message' => '你发现了么,少添东西了!'],
            ['vip_subtract', 'number', 'min' => 0, 'max' => 9999, 'message' => '只能输入4位数,多了可不好使!'],
            ['vip_subtract', 'required','message' => '你发现了么,少添东西了!'],
            ['vip_name', 'string', 'max' => 5, 'message' => '输入错误了哦,这个只能输入五个字!'],
            ['vip_name', 'required','message' => '你发现了么,少添东西了!'],
            ['vip_name', 'unique', 'targetClass' => 'frontend\models\Vip', 'message' => '等级名已经存在了,换一个试试吧!'],
        ];
    }
}