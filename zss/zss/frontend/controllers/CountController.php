<?php
namespace frontend\controllers;
header("content-type:text/html;charset=utf-8");
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Admin;
use frontend\models\AmountExcel;
use frontend\models\SalesExcel;
use frontend\models\Shop;
use frontend\models\Order;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * @author 徐建
 * @统计管理
 * @begintime:2016/15：54
 */
class CountController extends Controller
{ 
    /**
     * @财务统计
     * @finance
     */
     public function actionFinance()
     {
       //获取登陆用户
       $user = $_COOKIE['username'];
       $admin = new Admin();
       $admin_user_message = $admin->adminuser($user);
       //print_r($admin_user_message);die;
       $shop_name = $admin_user_message[0]['shop_name'];
       //判断用户身份
       if($admin_user_message[0]['role_id']=='1')
       {
           //实例化model
           $Order = new Order();
           $order_realamount = $Order->order();
           if(empty($order_realamount))
           {
               $amount = 0;
           }else
           {
             //求出总额
           foreach($order_realamount as $v)
           {
               $amountinfo[] = $v['order_realamount'];
           }
           $amount = array_sum($amountinfo);
           //echo $amount;die;  
           }
           
           return $this->render('finance',['order_realamount'=>$order_realamount,'amount'=>$amount,'role_id'=>$admin_user_message[0]['role_id'],'shop_name'=>$shop_name]);
       }else
       {
       //实例化model
       $Shop = new Shop();
       $order_realamount = $Shop->myshoporder($shop_name);
       if(empty($order_realamount))
       {
           $amount = 0;
       }else
       {
             foreach($order_realamount as $v)
            {
            $amountinfo[] = $v['order_realamount'];
            }
       //求出本店收入总价格
       $amount = array_sum($amountinfo);        
       }

       return $this->render('finance',['order_realamount'=>$order_realamount,'amount'=>$amount,'role_id'=>$admin_user_message[0]['role_id'],'shop_name'=>$shop_name]);
       }
     }
     /**  
      * @销量统计
      * @Sales
      */
     public function actionSales()
     {
       //获取用户信息
       $user=$_COOKIE['username'];
       //查询此用户信息
       $admin = new Admin();
       $admin_user_message = $admin->adminuser($user);
       //print_r($admin_user);die;
       $shop_name=$admin_user_message[0]['shop_name'];
       //判断用户身份
       if($admin_user_message[0]['role_id']==1)
       {
           //实例化model
           $Order = new Order();
           $salesinfo = $Order->sales();
           //print_r($salesinfo);die;
           return $this->render('sales',['salesinfo'=>$salesinfo,'role_id'=>$admin_user_message[0]['role_id'],'shop_name'=>$shop_name]);
       }else
       {
           //实例化model
           $Shop = new Shop();
           $salesinfo = $Shop->myshopsales($shop_name);
           return $this->render('sales',['salesinfo'=>$salesinfo,'role_id'=>$admin_user_message[0]['role_id'],'shop_name'=>$shop_name]);
       }

     }
     /**
      * @财务统计导出
      * @excelout1
      */
     public function actionExcelout1()
     {
       //从数据库取得需要导出的数据
       $request = Yii::$app->request;
       $role_id = $request->get('role_id','');
       $shop_name = $request->get('shop_name','');
       $begintime = $request->get('begintime','');    
       $endtime = $request->get('endtime','');
       $strbegintime = strtotime($begintime);
       $strendtime = strtotime($endtime);
       //echo $strbegintime;die;
       if($role_id==1)
       {
           if($strbegintime == "")
           {
                //实例化model
                $Order = new Order();
                $order_realamount = $Order->order();               
           }else
           {
                //实例化model
                $Order = new Order();
                $order_realamount = $Order->ordersearch($strbegintime,$strendtime);
           }

             //求出总额
             //print_r($order_realamount);die;
             //实例化model
             $AmountExcel = new AmountExcel();
             $AmountExcel->amount($order_realamount);
       }else
       {
           if($strbegintime=='')
           {
             //实例化model
             $Shop = new Shop();
             $order_realamount = $Shop->myshoporder($shop_name);
           }else
           {
             //实例化model
             $Shop = new Shop();
             $order_realamount = $Shop->myshopordersearch($shop_name,$strbegintime,$strendtime);
           }
             //实例化model
             $AmountExcel = new AmountExcel();
             $AmountExcel = amount($order_realamount);
       }

     }
     /**
      * @销量报表导出
      * @Excelout2
      */
     public function actionExcelout2()
     {

       //从数据库取得需要导出的数据
       $request = Yii::$app->request;
       $role_id = $request->get('role_id','');
       $shop_name = $request->get('shop_name','');
       $begintime = $request->get('begintime','');    
       $endtime = $request->get('endtime','');
       $strbegintime = strtotime($begintime);
       $strendtime = strtotime($endtime);
     if($role_id==1)
     {     
        if($strbegintime=='')
        {
           //实例化model
           $Order = new Order();
           $salesinfo = $Order->sales();
        }else
        {
                    //实例化model
           $Order = new Order();
           $salesinfo = $Order->salessearch($strbegintime,$strendtime);   
        }
           //print_r($salesinfo);die;
           //实例化model
           $SalesExcel = new SalesExcel();
           $SalesExcel->sales($salesinfo);
     }else{
         if($strbegintime=='')
         {
           //实例化model
           $Shop = new Shop();
           $salesinfo = $Shop->myshopsales($shop_name);             
         }else
         {
           //实例化model
           $Shop = new Shop();
           $salesinfo = $Shop->myshopsalessearch($shop_name,$strbegintime,$strendtime);
         }

           //实例化model
           $SalesExcel = new SalesExcel();
           $SalesExcel->sales($salesinfo);
     }
  }
    /**
      * @根据时间查询财务数据
      */
     public function actionSearch()
     {
       $request = Yii::$app->request;
       $begintime = $request->get('begintime','');    
       $endtime = $request->get('endtime','');
       $strbegintime = strtotime($begintime);
       $strendtime = strtotime($endtime);
       $user = $_COOKIE['username'];
       $admin = new Admin();
       $admin_user_message = $admin->adminuser($user);
       //print_r($admin_user_message);die;
       $shop_name = $admin_user_message[0]['shop_name'];
       //判断用户身份
       if($admin_user_message[0]['role_id']=='1')
       {
           //实例化model
           $Order = new Order();
           $order_realamount = $Order->ordersearch($strbegintime,$strendtime);
           //print_r($order_realamount);die;
           if(empty($order_realamount))
           {
               $amount = 0;
           }else
           {
               //求出总额
                foreach($order_realamount as $v)
                {
                    $amountinfo[] = $v['order_realamount'];
                }
                $amount = array_sum($amountinfo);
           }
           //echo $amount;die;
           return $this->renderPartial('finance2',['order_realamount'=>$order_realamount,'amount'=>$amount,'role_id'=>$admin_user_message[0]['role_id'],'shop_name'=>$shop_name,'begintime'=>$begintime,'endtime'=>$endtime]);
       }else
       {
       //实例化model
       $Shop = new Shop();
       $order_realamount = $Shop->myshopordersearch($shop_name,$strbegintime,$strendtime);
       if(empty($order_realamount))
       {
           $amount = 0;
       }else
       {
            foreach($order_realamount as $v)
            {
            $amountinfo[] = $v['order_realamount'];
            }
       //求出本店收入总价格
       $amount = array_sum($amountinfo);
       //echo $shop_realamount;die;
       }
       return $this->render('finance2',['order_realamount'=>$order_realamount,'amount'=>$amount,'role_id'=>$admin_user_message[0]['role_id'],'shop_name'=>$shop_name,'begintime'=>$begintime,'endtime'=>$endtime]);
       }
     }
     /*
      * @根据时间查询销量数据
      * 
      */
     public function actionSearchsales()
     {
       $request = Yii::$app->request;
       $begintime = $request->get('begintime','');    
       $endtime = $request->get('endtime','');
       $strbegintime = strtotime($begintime);
       $strendtime = strtotime($endtime);
       //echo $strbegintime;die;
       //获取用户信息
       $user=$_COOKIE['username'];
       //查询此用户信息
       $admin = new Admin();
       $admin_user_message = $admin->adminuser($user);
       //print_r($admin_user);die;
       $shop_name=$admin_user_message[0]['shop_name'];
       //判断用户身份
       if($admin_user_message[0]['role_id']==1)
       {
           //实例化model
           $Order = new Order();
           $salesinfo = $Order->salessearch($strbegintime,$strendtime);
           //print_r($salesinfo);die;
           return $this->renderPartial('sales2',['salesinfo'=>$salesinfo,'role_id'=>$admin_user_message[0]['role_id'],'shop_name'=>$shop_name,'begintime'=>$begintime,'endtime'=>$endtime]);
       }else
       {
           //实例化model
           $Shop = new Shop();
           $salesinfo = $Shop->myshopsalessearch($shop_name,$strbegintime,$strendtime);
           return $this->renderPartial('sales2',['salesinfo'=>$salesinfo,'role_id'=>$admin_user_message[0]['role_id'],'shop_name'=>$shop_name,'begintime'=>$begintime,'endtime'=>$endtime]);
       }       
     }
}
