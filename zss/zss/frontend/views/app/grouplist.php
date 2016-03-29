<?php
use yii\helpers\Html;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>数据表格页面_AmaAdmin后台管理系统模板 - 源码之家</title>
<link rel="stylesheet" href="assets/css/style.default.css" type="text/css" />
<script type="text/javascript" src="assets/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="assets/js/custom/general.js"></script>
<script type="text/javascript" src="assets/js/custom/tables.js"></script>
<style>
.help-block{
    color:red;
}
</style>
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
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('system/index') ?>">用户管理</a></li> 
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('app/cf') ?>">轮播图</a></li> 
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('app/cg') ?>">轮播组</a></li> 
        <!--<li><a href="filemanager.html" class="gallery">文件管理</a></li>-->
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
        
    <div class="centercontent tables">
             <div class="pageheader notab">
<h1 class="pagetitle">图片轮播组列表</h1>
</div>
        <div id="contentwrapper" class="contentwrapper">
          
          <div class="contenttitle2">
                  
                  <a href="<?php echo Yii::$app->urlManager->createUrl('app/addgroup') ?>">新增</a>
                   <button id="delall">删除</button>
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
                          <th class="head0 nosort"><input type="checkbox" id="checkall"/></th>
                            <th class="head0">ID</th>
                               <th class="head0">轮播组名</th>
                           <th class="head0">是否显示</th>
                            <th class="head0">轮播组描述</th>
                            <th class="head1">添加时间</th>
                            <th class="head0">结束时间</th>
                            <th class="head0">开始时间</th>
                            <th class="head0">编辑</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- 用户循环 -->
                    <?php foreach ($arrgroup as $v): ?>
                        <tr class="gradeX">
                        
                          <td align="center"><span class="center">
                            <input type="checkbox" value="<?= Html::encode($v->
group_id) ?>"/>
                          </span></td>
                          <td><?= Html::encode($v->group_id) ?></td> 
                           <td><?= Html::encode($v->group_name) ?></td>
                            <?php if ($v['group_isshow'] == 1) { ?>
                                <td value="<?= Html::encode($v['group_isshow']) ?>" class="show" group_id="<?= Html::encode($v->group_id) ?>">显示</td>
                              <?php } else { ?>
                                <td value="<?= Html::encode($v['group_isshow'])?>" class="show" group_id="<?= Html::encode($v->group_id) ?>">隐藏</td>
                              <?php } ?>
                          <td><?= Html::encode($v->group_desc) ?></td>
                            <td><?= Html::encode(date("Y-m-d H:i:s", $v->
    group_addtime)) ?></td>
                            <td><?= Html::encode(date("Y-m-d H:i:s", $v->
        group_endtime)) ?></td>
                            <td><?= Html::encode(date("Y-m-d H:i:s", $v->
        group_starttime)) ?></td>
                            <!-- 修改 -->
                            <td>
                            <a href="<?php echo Yii::$app->urlManager->
        createUrl('app/upgroup') ?>&group_id=<?= Html::encode($v->group_id) ?>"><img width="20px" height="20px" src="<?php echo yii::$app->
        request->baseUrl ?>/assets/images/gai.jpg" alt="" /></a>
                            <!-- 删除 -->
                            &nbsp;&nbsp;<a href="<?php echo Yii::$app->
        urlManager->createUrl('app/delgroup') ?>&group_id=<?= Html::encode($v->group_id) ?>"><img width="20px" height="20px" src="<?php echo yii::$app->
        request->baseUrl ?>/assets/images/laji.jpg" alt="" /></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
        </div><!--contentwrapper-->
        
    </div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

</body>
</html>
<script>
$("#checkall").click(function(){
   $("input[type='checkbox']").prop("checked", function( i, val ) {
  return !val;
}); 
})
$("#delall").click(function(){//实现批量删除
      allseries_id=$("input[type='checkbox']:checked");//获取所有选中的复选框
      var str='';
      allseries_id.each(function(){
        str=str+','+$(this).val();//拼接要删除的id值
      })
      str=str.substr(1);
    //传要删除的id
        $.ajax({
            type:"GET",
            url:"<?php echo Yii::$app->urlManager->createUrl('app/delgroup') ?>",
            data:{"group_id":str},
            success:function(date){
                location.reload();
            }
        })
   })
   $(document).ready(function(){
    $(document).on("click",".show",function(){
      status = $(this).text();
      if(status == '显示'){
        status=1
       $(this).text("隐藏")      
        }else{
            status =0
            $(this).text("显示") 
           
        }
        
         group_id = $(".show").attr("group_id");
          $.ajax({
            type:"GET",
            url:"<?php echo Yii::$app->urlManager->createUrl('app/upstatus') ?>",
            data:{"status":status,"group_id":group_id},
            success:function(data){
               
                
            }
        })  
    })
   })

</script>