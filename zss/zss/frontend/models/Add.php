<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_add".
 *
 * @property integer $add_id
 * @property string $add_price
 * @property integer $giveaway_id
 * @property integer $add_show
 * @property integer $created_at
 * @property integer $updated_at
 */
class Add extends \yii\db\ActiveRecord
{/*
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_add';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['add_price'], 'number'],
            [['giveaway_id', 'add_show', 'created_at', 'updated_at'], 'integer'],
            ['add_price','required','message'=>'不能为空!'],
            ['add_price','number','max'=>9999999,'min'=>1,'message'=>'格式错误!'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'add_id' => 'Add ID',
            'add_price' => 'Add Price',
            'giveaway_id' => 'Giveaway ID',
            'add_show' => 'Add Show',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     *  满赠的显示  联表联查
     */
     public function addshow()
    {

        return Add::find()
               ->select('*')
               ->innerJoin('`zss_giveaway` on `zss_add`.`giveaway_id` =`zss_giveaway`.`giveaway_id`')
               ->asArray()
               ->all();

    }
    /**
     * 满赠的添加
     * @ $data 是接收表单的值
     */
    public function addpro($data)
    {
        $add = new Add;
        $created_at = time();
        $add->add_price = $data['Add']['add_price'];
        $add->giveaway_id = $data['giveaway_id'];
        $add->created_at = $created_at;
        $add->updated_at = $created_at;
        return $add->save();
    }

    /**
     *  满赠的删除
     */
    public function adddel($add_id)
    {
        return   Add::deleteAll("add_id in ($add_id)");
    }
    /**
     *  满赠根据条件查询
     */
    public function addsearch($add_id)
    {
        return Add::find()
               ->select('*')
               ->innerJoin('`zss_giveaway` on `zss_add`.`giveaway_id` =`zss_giveaway`.`giveaway_id`')
               ->where(['zss_add.add_id'=>$add_id])
               ->asArray()
               ->all();
    }

    /**
     *  满赠的修改
     */
    public function addupdate($data)
    {
        $updated_at = time();
        return Add::updateAll(array('add_price'=>$data['Add']['add_price'],'giveaway_id'=>$data['giveaway_id'],'updated_at'=>$updated_at),'add_id=:add_id',array(":add_id"=>$data['add_id']));
    }

    /** 
     *   满赠状态的修改
     */
    public function add_show($add_id,$status)
    {
        if($status == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        $add = Add::find()->where(['add_id' => $add_id])->one();
        $add->add_show = $status;
        return $add->save();
    }
}
