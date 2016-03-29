<?php
namespace frontend\models\picture;
use yii;
use yii\base\Model;
use yii\web\UploadedFile;
class BannerGroupForm extends Model
{
    public $group_isshow;
    public $group_desc;
    public $group_name;
    public $group_starttime;
    public $group_endtime;
    public $group_addtime;

    public function rules()
    {
        return [[['group_addtime', 'group_starttime', 'group_endtime'], "string"], [['group_isshow'],
            'integer'], [['group_desc'], 'string', 'max' => 200], [['group_name'], 'string',
            'max' => 30], [['group_isshow', "group_starttime", "group_endtime", "group_name",
            "group_desc"], "required", "message" => "不能为空"], ["group_name", "unique",
            "targetClass" => "frontend\models\ZssBannerGroup", "message" => "不能重复添加"], ];
    }
}
