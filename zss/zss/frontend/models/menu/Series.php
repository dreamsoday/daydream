<?php

namespace frontend\models\menu;

use Yii;

/**
 * This is the model class for table "zss_series".
 *
 * @property integer $series_id
 * @property string $series_name
 * @property integer $series_status
 * @property integer $series_sort
 * @property integer $created_at
 * @property integer $updated_at
 */
class Series extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'zss_series';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [[['series_status', 'series_sort', 'created_at', 'updated_at'], 'integer'], [['series_name'],
            'string', 'max' => 20], [['series_name'], 'string', 'max' => 20, 'tooLong' =>
            '菜品分类名不能超过20'], ['series_name', 'required', 'message' => '菜品分类名不能为空'], ['series_sort',
            'required', 'message' => '菜品排序不能为空'], ['series_sort', 'integer', 'min' => 0,
            'max' => 100, 'message' => '请输入100之内的数'], 
            ['updated_person',"string"],];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ['series_id' => 'Series ID', 'series_name' => 'Series Name',
            'series_status' => 'Series Status', 'series_sort' => 'Series Sort', 'created_at' =>
            'Created At', 'updated_at' => 'Updated At', ];
    }
    /**
     *@type  菜品分类列表查询
     */
    public function type()
    {
        $model = Series::find();
        return $arr = $model->orderBy("series_sort Desc")->all();
    }
    /**
     * @addtype 菜品分类添加
     */
    public function addtype($post)
    {
        $this->series_name = $post['SeriesForm']['series_name'];
        $this->series_sort = $post['SeriesForm']['series_sort'];
        $this->series_status = 1;
        $this->created_at = time();
        $this->updated_at = time();
        return $this->save();
    }
    /**
     *  菜品分类删除
     */
    public function del($series_id)
    {
        $connection = Yii::$app->db;
        return $connection->createCommand()->delete('zss_series', "series_id in($series_id)")->
            execute();
    }
    /**
     * 菜品分类修改前查询
     */
    public function seleone($series_id)
    {
        $model = Series::find();
        return $arr = $model->where("series_id=$series_id")->one();

    }
    /**
     * 菜品分类修改
     */

    public function upone($post, $series_id)
    {
        $connection = Yii::$app->db;
        $cookies = Yii::$app->request->cookies;
        $username = $cookies->getValue('username');
        return $connection->createCommand()->update("zss_series", ["series_name" => $post['Series']['series_name'],
            "series_sort" => $post['Series']['series_sort'], "updated_at" => time(),'updated_person'=>$username],
            "series_id=" . $series_id)->execute();

    }


}
