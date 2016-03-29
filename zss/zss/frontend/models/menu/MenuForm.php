<?php

namespace frontend\models\menu;
use yii;
use yii\base\Model;
use yii\web\UploadedFile;
class MenuForm extends Model
{
    public $menu_price;
    public $menu_name;
    public $image_url;
    public $image_wx;
    public $image_pc;
    public $shop_show;
    public $created_at;
    public $updated_at;
    public $series_id;
    public $menu_desc;
    public $menu_status;
    public $menu_sort;
    public $menu_introduce;
    public $menu_starttime;
    public $menu_endtime;
    public function rules()
    {
        return [
        [['series_id', 'menu_status', 'shop_show', 'menu_sort', 'created_at','updated_at'], 'integer'], 
           ['image_url','file',
            'extensions'=>['jpg','png','gif'],'wrongExtension'=>'只能上传{extensions}类型文件！',
            'maxSize'=>1024*1024*2,'tooBig'=>'文件上传过大！',
            'uploadRequired'=>'请上传文件！',
            'message'=>'上传失败！'
         ],
        
			
         [['menu_starttime','menu_endtime'],"required","message"=>"请选择时间"],
         
             [['menu_price'], 'number'], [['menu_name'], 'string', 'max' =>30, "tooLong" => "菜品名不能过长"],
             ['menu_introduce', 'string', 'max' => 200],
              [['menu_desc'],'string', 'max' => 50, "tooLong" => "菜品描述不能过长"],
               ['menu_name', 'required',
            'message' => '菜品名不能为空'], ['menu_price', 'required', 'message' => '菜品价格不能为空'], 
            
            [['menu_price'], 'number'], [['menu_name'], 'string', 'max' =>
            30, "tooLong" => "菜品名不能过长"], ['menu_introduce', 'string', 'max' => 200], [['menu_desc'],
            'string', 'max' => 50, "tooLong" => "菜品描述不能过长"], ['menu_name', 'required',
            'message' => '菜品名不能为空'], ['menu_price', 'required', 'message' => '菜品价格不能为空'], ['menu_desc',

            'required', 'message' => '菜品描述不能为空'], ["menu_name", "unique", "targetClass" =>
            "frontend\models\menu\Menu", "message" => "菜品名不能重复"]];
    }
    /**
     * @upload 菜品图片上传
     */
    public function upload()
    {
        $dir = "assets/uploads/" . date("Y-m-d") . "/"; //原图片的保存路径;
        //原图
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
         $type = $this->image_url->extension;
         $array = array('jpg','jpeg','gif','png');
        
         $result = in_array($type,$array);
        
         if($result){
             $this->image_url->saveAs($dir . time() . '.' . $this->image_url->extension);
             return $dir . time() . '.' . $this->image_url->extension;
         }else{
            return 0;
         }
       
        /*  } else {
        return 0;
        }
        */

    }
    /**
     * 生成pc端和wx端的图片
     */
    public function imgthumb($dir)
    {
        $thumbdir = "assets/thumb/" . date("Y-m-d") . "/"; //缩略图的保存路径*/
        $pcdir = "assets/pc/" . date("Y-m-d") . "/"; //缩略图的保存路径*/
        if (!is_dir($thumbdir)) {
            mkdir($thumbdir, 0777, true);
        }
        if (!is_dir($pcdir)) {
            mkdir($pcdir, 0777, true);
        }
        $imgage = getimagesize($dir); //得到原始大图片
        switch ($imgage[2]) { // 图像类型判断
            case 1:
                $im = imagecreatefromgif($dir);
                break;
            case 2:
                $im = imagecreatefromjpeg($dir);
                break;
            case 3:
                $im = imagecreatefrompng($dir);
                break;
        }
        $src_W = $imgage[0]; //获取大图片宽度
        $src_H = $imgage[1]; //获取大图片高度
        //设置缩略图的大小
        $thumbwidth = 100;
        $thumbheight = 100;
        $thumbname = $thumbdir . time() . ".jpg";
        $tn = imagecreatetruecolor($thumbwidth, $thumbheight); //创建缩略图
        imagecopyresampled($tn, $im, 0, 0, 0, 0, $thumbwidth, $thumbheight, $src_W, $src_H); //复制图像并改变大小
        imagejpeg($tn, $thumbname); //输出图像

        //pc端
        $widths = 200;
        $heights = 200;
        $pcname = $pcdir . time() . ".jpg";
        $tn = imagecreatetruecolor($widths, $heights); //创建缩略图
        imagecopyresampled($tn, $im, 0, 0, 0, 0, $widths, $heights, $src_W, $src_H); //复制图像并改变大小
        imagejpeg($tn, $pcname); //输出图像
        $imgdir['image_wx'] = $thumbname;
        $imgdir['image_pc'] = $pcname;
        $imgdir['image_url'] = $dir;
        return $imgdir;
    }
}
?>