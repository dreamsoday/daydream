<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_wallet".
 *
 * @property integer $wallet_id
 * @property string $wallet_name
 * @property integer $wallet_num_price
 * @property string $wallet_price
 * @property string $wallet_share
 * @property string $wallet_sharing
 * @property integer $wallet_show
 * @property string $wallet_template
 * @property integer $created_at
 * @property integer $updated_at
 */
class Wallet extends \yii\db\ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_wallet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        
        return [
            [['wallet_num_price', 'wallet_show', 'created_at', 'updated_at'], 'integer'],
            [['wallet_price', 'wallet_share', 'wallet_sharing'], 'number'],
            [['wallet_name'], 'string', 'max' => 50],
            [['wallet_template'], 'string', 'max' => 255],
            ['wallet_name','unique','targetClass'=>'frontend\models\Wallet','message'=>'红包名称已存在!'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'wallet_id' => 'Wallet ID',
            'wallet_name' => 'Wallet Name',
            'wallet_num_price' => 'Wallet Num Price',
            'wallet_price' => 'Wallet Price',
            'wallet_share' => 'Wallet Share',
            'wallet_sharing' => 'Wallet Sharing',
            'wallet_show' => 'Wallet Show',
            'wallet_template' => 'Wallet Template',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     *  红包的查询
     */
    public function selectwallet()
    {
        return Wallet::find()->asArray()->all();
    }

    /**
     *  红包的删除
     */
    public function walletdel($wallet_id)
    {
        return Wallet::deleteAll("wallet_id in ($wallet_id)");
    }

    /**
     *  红包的添加
     */
    public function walletadd($data)
    {
        $wallet = new Wallet;
        $wallet->wallet_name = $data['Wallet']['wallet_name'];
        $wallet->wallet_num_price = $data['wallet_num_price'];
        if($data['Wallet']['wallet_price']=="") {$data['Wallet']['wallet_price']=2;}
        if($data['Wallet']['wallet_share']=="") {$data['Wallet']['wallet_share']=1;}
        if($data['Wallet']['wallet_sharing']=="") {$data['Wallet']['wallet_sharing']=1;}
        $wallet->wallet_share = $data['Wallet']['wallet_share'] ;
        $wallet->wallet_sharing = $data['Wallet']['wallet_sharing'] ;
        $wallet->wallet_price = $data['Wallet']['wallet_price'] ;
        $wallet->created_at = time();
        $wallet->wallet_show = '1';
        $wallet->updated_at = time() ;
        return $wallet->save();
    }

    /**
     *  条件查询
     */
    public function walletsearch($id)
    {
        return Wallet::find()->where(array('wallet_id'=>$id))->asArray()->all();
    }
    /**
     *  红包的修改
     */
    public function walletupdate($data)
    {
        $updated_at = time();
        return Wallet::updateAll(array("wallet_name"=>$data['Wallet']['wallet_name'],'wallet_num_price'=>$data['wallet_num_price'],'wallet_price'=>$data['Wallet']['wallet_price'],'wallet_share'=>$data['Wallet']['wallet_share'],'wallet_sharing'=>$data['Wallet']['wallet_sharing'],'updated_at'=>$updated_at),"wallet_id = :wallet_id",array(":wallet_id"=>$data['wallet_id']));
    }

    /** 
     *   红包状态的修改
     */
    public function wallet_show($wallet_id,$status)
    {
        if($status == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        $wallet = Wallet::find()->where(['wallet_id' => $wallet_id])->one();
        $wallet->wallet_show = $status;
        return $wallet->save();
    }
}
