<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>数据表格页面_AmaAdmin后台管理系统模板 - 源码之家</title>
<link rel="stylesheet" href="assets/css/style.default.css" type="text/css" />
<script src='assets/js/jquery.js'></script>
<script type="text/javascript" src="assets/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="assets/js/custom/general.js"></script>
<script type="text/javascript" src="assets/js/custom/tables.js"></script>
<!-- ---------------------引用日历插件----------------------- -->

<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="assets/css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="assets/css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
    <script src="assets/js/plugins/css3-mediaqueries.js"></script>
<![endif]-->
</head>


<style>
     #nav
    {
       /* background-color:red;*/
        height:70px;
        border-bottom: solid;
        font-size:18px;
        /*font-family: 华文行楷,宋体;*/
    }
    /*文本框的日历插件*/
    .date_css
    {
        /*width:100px;*/
        height:30px;
        border:solid;
        width:110px;
    }
</style>
<body class="withvernav" id='aa'>
<div class="bodywrapper">
    <div class="vernav2 iconmenu">
        <ul>
            <li><a href="<?php echo Yii::$app->urlManager->createUrl('order/index')?>">订单列表</a></li>          
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
        
    <div class="centercontent tables" id='nav'>
    <!--     最上面-->
        <div id="contentwrapper" class="contentwrapper" id='table1'>
          <div id='bb'>
          <div class="contenttitle2">
                 <h3>订单详情表</h3>
                </div><!--contenttitle-->
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable2">
                    <colgroup>
                        <col class="con0" style="width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">订单号</th>
                            <th class="head0">用户名</th>
                            <th class="head0">菜名</th>
                            <th class="head0">地址</th>
                            <th class="head0">手机号</th>
                            <th class="head0">类型</th>
                            <th class="head0">运费</th>
                            <th class="head0">支付状态</th>
                            <th class="head0">支付方式</th>
                            <th class="head0">总价格</th>
                            <th id='table_th'>实付款</th>
                            <th id='table_th'>座位号</th>
                            <th id='table_th'>取餐号</th>
                            <th class="head0">时间</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                    <!--             循环订单列表--> 
                        <tr class="gradeX">
                            <td><?= Html::encode($order['order_sn']) ?></td>
                            <td><?= Html::encode($order['user']['user_name']) ?></td>
                            <td><?= Html::encode($order['menu']['menu_name']) ?></td>
                            <td><?= Html::encode($order['order_address']) ?></td>
                            <td><?= Html::encode($order['user']['user_phone']) ?></td>
                            <td class="center">
                                <?php
                                    if($order['delivery_type']==1)
                                        {
                                            echo "送货";
                                        }
                                    else if($order['delivery_type']==2)
                                        {
                                            echo "自取";
                                        }
                                    else
                                        {
                                            echo "堂食";
                                        }
                                ?>
                            </td>
                            <td><?= Html::encode($order['order_freight']) ?></td>
                            <td class="center">
                                <?php 
                                    if($order['delivery_type']==1)
                                        {
                                            echo "未支付";
                                        }
                                    else if($order['delivery_type']==2)
                                        {
                                            echo "已支付";
                                        }
                                    else
                                        {
                                            echo "支付失败";
                                        }
                                ?>
                            </td>
                            <td><?= Html::encode($order['payment']['payment_mode']) ?></td>
                            <td><?= Html::encode($order['order_realamount']) ?></td>
                            <td><?= Html::encode($order['order_amount']) ?></td>
                            <td><?= Html::encode($order['order_seatnumber']) ?></td>
                            <td><?= Html::encode($order['order_id']) ?></td>
                            <td><?= Html::encode(date('Y-m-d H:i:s',$order['created_at'])) ?></td>
                        </tr>
                     
                    </tbody>
                </table>
        
        </div><!--contentwrapper-->
        
    </div><!-- centercontent -->
    
    </div>
</div><!--bodywrapper-->

</body>
</html>