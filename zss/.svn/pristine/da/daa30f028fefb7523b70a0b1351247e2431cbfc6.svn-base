<?php 
namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'extensions' => 'png, jpg,gif'],
        ];
    }
    
    public function upload()
    {
        //$uploadedFile = $this->imageFile->baseName;
        //$file_ext = $uploadedFile->getExtension();
        if ($this->validate()) {
            @$img_path = 'assets/uploads/' . date("YmdHis").'_'.rand(10000,99999) . '.' . $this->imageFile->extension;
        @$this->imageFile->saveAs($img_path);
            
            return $img_path;
            
        } else {
            return false;
        }
    }
}


?>