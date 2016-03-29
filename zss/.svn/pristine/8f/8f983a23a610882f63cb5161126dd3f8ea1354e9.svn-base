<?php
namespace frontend\models\picture;
use yii;
use yii\base\Model;
use yii\web\UploadedFile;
class BannerForm extends Model
{
    public $group_id;
    public $banner_title;
    public $banner_url;
    public $banner_desc;
    public $banner_thumb;

    public function rules()
    {
        return [[['group_id'], 'integer'], [['banner_title', 'banner_url'], 'string',
            'max' => 30], [['banner_desc'], 'string', 'max' => 100], [['banner_title',
            'banner_desc', 'banner_url'], "required", 'message' => "不能为空"], ['banner_title',
            'unique', 'targetClass' => "frontend\models\ZssBanner", "message" =>
            "图片标题不能重复"],
             ['banner_thumb','file',
            'extensions'=>['jpg','png','gif'],'wrongExtension'=>'只能上传{extensions}类型文件！',
            'maxSize'=>1024*1024*2,'tooBig'=>'文件上传过大！',
           'uploadRequired'=>'请上传文件！',
            'message'=>'上传失败！'
         ],
            ];
    }
    public function upload(){
        $model = new BannerForm;
        $dir = "assets/upload/".date("Y-m-d")."/";
        if(! is_dir($dir)){
            mkdir($dir,0777,true);
        }
        
            $this->banner_thumb->saveAs($dir . time() . '.' . $this->banner_thumb->extension);
       return $dir . time() . '.' . $this->banner_thumb->extension;   
     
 
    }
}
?>