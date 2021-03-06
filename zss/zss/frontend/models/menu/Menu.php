<?php

namespace frontend\models\menu;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "zss_menu".
 *
 * @property integer $menu_id
 * @property string $menu_name
 * @property integer $series_id
 * @property string $menu_price
 * @property string $menu_introduce
 * @property string $menu_desc
 * @property integer $menu_status
 * @property integer $shop_show
 * @property integer $menu_sort
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $shop_id
 * @property string $image_url
 * @property string $image_wx
 * @property string $image_pc
 * @property integer $menu_num
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [[['series_id', 'menu_status', 'shop_show', 'menu_sort', 'created_at',
            'updated_at'], 'integer'], 
             [['image_url'], 'file', 'extensions' =>
            'jpeg,png,jpg,gif'], 
            [['menu_price'], 'number'], [['menu_name'], 'string', 'max' =>
            30, "tooLong" => "菜品名不能过长"], ['menu_introduce', 'string', 'max' => 200], [['menu_desc'],
            'string', 'max' => 50, "tooLong" => "菜品描述不能过长"], ['menu_name', 'required',
            'message' => '菜品名不能为空'], ['menu_price', 'required', 'message' => '菜品价格不能为空'], ['menu_desc',
            'required', 'message' => '菜品描述不能为空'], 
              [['menu_starttime','menu_endtime'],"required","message"=>"请选择时间"],
           ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ['menu_id' => 'Menu ID', 'menu_name' => 'Menu Name', 'series_id' =>
            'Series ID', 'menu_price' => 'Menu Price', 'menu_introduce' => 'Menu Introduce',
            'menu_desc' => 'Menu Desc', 'menu_status' => 'Menu Status', 'shop_show' =>
            'Shop Show', 'menu_sort' => 'Menu Sort', 'created_at' => 'Created At',
            'updated_at' => 'Updated At', //'shop_id' => 'Shop ID',
            'menu_starttime' => 'Menu Starttime',
            'menu_endtime' => 'Menu Endtime',
            'image_url' => 'Image Url', 'image_wx' => 'Image Wx', 'image_pc' => 'Image Pc',
            //'menu_num' => 'Menu Num',
            ];
    }
    /**
     * 菜品的关联表
     */
    public function getSeries()
    {
        return $this->hasOne(Series::className(), ['series_id' => 'series_id']);
    }
    /**
     * 菜品内容展示
     */
    public function menucontent($series_id)
    {
        if ($series_id == 0) {
            $menuname = Menu::find()->with('series')->orderBy("menu_sort desc")->all();
        } else {
            $menuname = Menu::find()->with('series')->orderBy("menu_sort desc")->where("zss_menu.series_id = $series_id")->
                all();
        }
        return $menuname;
    }
    /**
     *  菜品的删除
     */
    public function delmenu($menu_id)
    {
        $model = Yii::$app->db;
        return $model->createCommand()->delete("zss_menu", "menu_id in($menu_id)")->
            execute();
    }
    /**
     * 菜品修改前的查询
     */
    public function editormenu($menu_id)
    {
        $app = Menu::find();
        return $app->where("menu_id=$menu_id")->One();
    }
    /**
     * 菜品内容添加
     */
    public function addmenu($post, $imgname)
    {
    
        $imgname['created_at'] = time();
        $imgname['updated_at'] = time();
        $imgname['menu_status'] = 1;
        $imgname['shop_show'] = 1;
        $post['MenuForm']['menu_starttime'] = strtotime($post['MenuForm']['menu_starttime']);
        $post['MenuForm']['menu_endtime'] = strtotime($post['MenuForm']['menu_endtime']);
        foreach ($imgname as $key => $value) {
            $this->$key = $value;
            $this->menu_name = $post['MenuForm']['menu_name'];
            $this->menu_price = $post['MenuForm']['menu_price'];
            $this->menu_desc = $post['MenuForm']['menu_desc'];
            $this->series_id = $post['series_id'];
            $this->menu_starttime = $post['MenuForm']['menu_starttime'];
            $this->menu_endtime = $post['MenuForm']['menu_endtime'];
        }
     
        return $this->save();
    }
    /**
     * 菜品内容修改
     */
    public function editor($post, $imgname)
    {
       
        $connection = Yii::$app->db;
        $menu_id = $post['menu_id'];
        if ($imgname == 1) {
            return $connection->createCommand()->update("zss_menu", ["series_id" => $post['series_id'],
                "menu_name" => $post['MenuForm']['menu_name'], "menu_price" => $post['MenuForm']['menu_price'],
                "menu_desc" => $post['MenuForm']['menu_desc'], "updated_at" => time()], "menu_id=" .
                $menu_id)->execute();

        } else {

            return $connection->createCommand()->update("zss_menu", ["series_id" => $post['series_id'],
                "menu_name" => $post['MenuForm']['menu_name'], "menu_price" => $post['MenuForm']['menu_price'],
                "image_url" => $imgname['image_url'], "menu_desc" => $post['MenuForm']['menu_desc'],
                "updated_at" => time(), "image_wx" => $imgname['image_wx'], "image_pc" => $imgname['image_pc']],
                "menu_id=" . $menu_id)->execute();
        }
    }
}
