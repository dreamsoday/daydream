<?php
use yii\helpers\Html;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>宅食送</title>
<link rel="stylesheet" href="assets/css/style.default.css" type="text/css" />
<script type="text/javascript" src="assets/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/custom/general.js"></script>
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

<body class="withvernav">
<div class="bodywrapper">
    <div class="vernav2 iconmenu">
<ul>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('shop/index')?>">门店列表</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('shop/shopadd')?>">门店添加</a></li>
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->

    <div class="centercontent">
        <div id="contentwrapper" class="contentwrapper lineheight21">

            <div class="contenttitle2">
            	<h2>门店详情</h2>
            </div>
            <br />

        	<h3>门店名称:<?= Html::encode($detail->shop_name) ?></h3><br />
            <h3>门店图片:<img width="100px" height="100px" src="<?= Html::encode($detail->imageFile) ?>"/></h3><br />
            <h3>门店手机:<?= Html::encode($detail->shop_phone) ?></h3><br />

            <h3>门店地址:<?= Html::encode($detail->shop_addr) ?></h3><br />

            <h3>门店经纬度
            经度:<?= Html::encode($detail->shop_logitude) ?>&nbsp;&nbsp;纬度:<?= Html::encode($detail->shop_latitude) ?>
            </h3>
            <p></p>

            <h3>外卖时间</h3>
            <p>开始时间:<?php echo date('Y-m-d H:i:s',$detail['shop_open'])?><br />结束时间:<?php echo date('Y-m-d H:i:s',$detail['shop_over'])?></p>

            <h3>堂食/自取时间</h3>
            <p>开始时间:<?php echo date('Y-m-d H:i:s',$detail['shop_opens'])?><br />结束时间:<?php echo date('Y-m-d H:i:s',$detail['shop_overs'])?></p>

            <h3>描述</h3>
            <p><?= Html::encode($detail->shop_remarks) ?></p>

            <h3>创建/修改时间</h3>
            <p><?php echo date('Y-m-d H:i:s',$detail['created_at'])?><br /><?php echo date('Y-m-d H:i:s',$detail['updated_at'])?></p>
            <br />
        </div><!--contentwrapper-->

	</div><!-- centercontent -->


</div><!--bodywrapper-->

</body>
</html>
