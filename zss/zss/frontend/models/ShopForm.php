<?php

/**
 * @author 刘国洋
 * @copyright 2016
 */

namespace frontend\models;

//use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
class ShopForm extends Model{
    public $shop_open;
    public $shop_over;
    public $shop_opens;
    public $shop_overs;
    public $shop_support;
    public $shop_status;
    public $shop_sort;
    public $created_at;
    public $updated_at;
    public $shop_name;
    public $shop_phone;
    public $shop_addr;
    public $shop_logitude;
    public $shop_latitude;
    public $shop_remarks;
    public $imageFile;

    public function rules()
    {
        return [
            [['shop_open', 'shop_over', 'shop_opens', 'shop_overs', 'shop_support', 'shop_status', 'shop_sort'],'required','message'=>'请选择'],
            ['shop_name','required','message'=>'用户名不能为空'],
            ['shop_name', 'string', 'min' => 3,'max' => 10,'tooLong'=>'门店名不得大于10位', 'tooShort'=>'门店名不得小于3位'],
            //['shop_name', 'string', 'min' => 6, 'max' => 16, 'message' => '用户名不得大于16位,不得小于6位'],
            ['shop_phone','match','pattern' => '/^(13|15|18)[0-9]{9}$/','message'=>'手机号格式不正确'],
            ['shop_addr','required','message'=>'地址不能为空'],
            ['shop_addr', 'string', 'min' => 3,'max' => 50,'tooLong'=>'地址不得大于50位', 'tooShort'=>'地址不得小于20位'],
            ['shop_logitude', 'string', 'max' => 20],
            ['shop_latitude', 'string', 'max' => 20],
            ['shop_remarks','required','message'=>'描述不能为空'],
            [['imageFile'], 'file', 'extensions' => 'png, jpg']
        ];
    }
    //文件上传
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            
            return true;
        } else {
            return false;
        }
    }
}


?>