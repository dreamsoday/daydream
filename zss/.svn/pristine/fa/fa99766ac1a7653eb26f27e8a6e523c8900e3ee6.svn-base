<div id="replace">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>zss后台统计管理</title>
<link rel="stylesheet" href="assets/css/style.default.css" type="text/css" />
<script type="text/javascript" src="assets/js/jquery1.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="assets/js/custom/general.js"></script>
<script type="text/javascript" src="assets/js/custom/tables.js"></script>
<!--===============================引入插件jquery和css====================================================-->
<script src="assets/js/jquery.datetimepicker.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/jquery.datetimepicker.css"/>
<!--===============================引入插件jquery和css====================================================-->
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="assets/css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="assets/css/style.ie8.css"/>
<![endif]-->dddd
<!--[if lt IE 9]>
    <script src="assets/js/plugins/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body class="withvernav">
<div class="bodywrapper">
    <div class="vernav2 iconmenu">
       <ul>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('count/finance')?>">财务统计</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('count/sales')?>">销量统计</a></li>     
        <!--<li><a href="filemanager.html" class="gallery">文件管理</a></li>-->
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->

<div class="centercontent tables">
<?php if($role_id=='1') {?>
<div class="pageheader notab">
<h1 class="pagetitle">销量统计</h1>
</div><!--pageheader-->
<div id="contentwrapper" class="contentwrapper">
<div class="contenttitle2">
<h3>选择日期</h3>
<input type="text" value="<?php echo $begintime;?>" id="datetimepicker" class="begin"/>-<input type="text" value="<?php echo $endtime?>" id="datetimepicker1" class="end"/>
 <input type="button" id="searchdate" value="查询">
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
<!-- 循环显示财务列表-->
<tr>
  <th class="head0 nosort"><input type="checkbox" /></th>
    <th class="head1">菜名</th>
    <th class="head0">销售数量</th>
    <th class="head1">总额</th>
</tr>
</thead>
<!--开始循环-->
<?php foreach($salesinfo as $v) {?>
    <tr class="gradeA">
      <td align="center"><span class="center">
        <input type="checkbox" />
      </span></td>
        <td><?php echo $v['menu_name']?></td>
        <td><?php echo $v['SUM(menu_num)']?></td>
        <td class="center"><?php echo $v['SUM(order_realamount)'] ?></td>
    </tr>
<?php } ?>
<!--结束循环-->
</tbody>
</table>
<?php } else{ ?>
<div class="pageheader notab">
<h1 class="pagetitle">本店销量统计</h1>
</div><!--pageheader-->
<div id="contentwrapper" class="contentwrapper">
<div class="contenttitle2">
<h3>选择日期</h3>
<input type="text" value="<?php echo $begintime?>" id="datetimepicker" class="begin"/>-<input type="text" value="<?php echo $endtime?>" id="datetimepicker1" class="end"/>
 <input type="button" id="searchdate" value="查询">
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
<!-- 循环显示财务列表-->
<tr>
  <th class="head0 nosort"><input type="checkbox" /></th>
    <th class="head1">菜名</th>
    <th class="head0">销售数量</th>
    <th class="head1">总额</th>
</tr>
</thead>
<!--开始循环-->
<?php foreach($salesinfo as $v) {?>
    <tr class="gradeA">
      <td align="center"><span class="center">
        <input type="checkbox" />
      </span></td>
        <td><?php echo $v['menu_name']?></td>
        <td><?php echo $v['SUM(menu_num)']?></td>
        <td class="center"><?php echo $v['SUM(order_realamount)']?></td>
    </tr>
<?php } ?>
<!--结束循环-->
</tbody>
</table>
<?php } ?>
<a href="<?=Yii::$app->urlManager->createUrl(['count/excelout2'])?>&role_id=<?php echo $role_id?>&shop_name=<?php echo $shop_name?>&begintime=<?php echo $begintime?>&endtime=<?php echo $endtime?>">导出</a>
</div><!--contentwrapper-->
</div><!-- centercontent -->
</div><!--bodywrapper-->
</body>
</html>
<script>
jQuery('#datetimepicker').datetimepicker();
jQuery('#datetimepicker').datetimepicker({value:'',step:10});
jQuery('#datetimepicker1').datetimepicker();
jQuery('#datetimepicker1').datetimepicker({value:'',step:10});
jQuery(document).on('click','#searchdate',function()
{

    var begintime = jQuery('.begin').attr('value')
    var endtime = jQuery('.end').attr('value')
        jQuery.ajax({
                    type: "GET",
                    url: "<?= Yii::$app->urlManager->createUrl(['count/searchsales'])?>",
                    data: "begintime="+begintime+"&&endtime="+endtime,
                    success: function(msg){
                     $('#replace').html(msg)
                    }
                });
})

</script>
</div>



