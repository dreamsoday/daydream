<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>宅食送</title>
<link rel="stylesheet" href="assets/css/style.default.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="assets/time/jquery.datetimepicker.css"/>
<script type="text/javascript" src="assets/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/charCount.js"></script>
<script type="text/javascript" src="assets/js/plugins/ui.spinner.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/chosen.jquery.min.js"></script>
<script type="text/javascript" src="assets/js/custom/general.js"></script>
<script type="text/javascript" src="assets/js/custom/forms.js"></script>
<script type="text/javascript" src="assets/time/jquery.datetimepicker.js"></script>
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="assets/css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="assets/css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body class="withvernav">

<div class="bodywrapper">

    <div class="vernav2 iconmenu">
    	<ul>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('system/index')?>">用户管理</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('system/sysadd')?>">用户添加</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('app/cf')?>">轮播图</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('app/cg')?>">轮播组</a></li>
        <!--<li><a href="filemanager.html" class="gallery">文件管理</a></li>-->
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->

    <div class="centercontent">


<div id="contentwrapper" class="contentwrapper">

<div id="basicform" class="subcontent">

<div class="contenttitle2">
<h3>宅食送用户修改</h3>
</div><!--contenttitle-->

<form class="stdform" method="post">
<input type="hidden" name="AdminForm[admin_id]" value="<?php echo $adminrole['admin_id']?>" />
<p>
	<label>用户名</label>
    <span class="field"><input type="text" id="adminname" name="AdminForm[admin_name]" class="smallinput" value="<?php echo $adminrole['admin']['admin_name']?>" />
    <font color='red'><?=Html::error($model,"admin_name")?></font>
    </span>
    <script>
        jQuery(document).ready(function($){
        $(document).on('blur','#adminname',function(){
            var adminname=$('#adminname').val();
            //alert(adminname);
            $.ajax({
               type: "POST",
               url: "<?php echo Yii::$app->urlManager->createUrl('system/adminname')?>",
               data: {"adminname":adminname},
               success: function(msg){
                if(msg==1)
                {
                    alert('用户名已存在');
                    document.getElementById('bu').disabled=true;
                }
                else
                {
                    document.getElementById('bu').disabled=false;
                }
               }
           })
        })
       })
    </script>
</p>

<p>
	<label>用户手机</label>
    <span class="field"><input style="width:150px" type="text" name="AdminForm[admin_phone]" class="mediuminput" value="<?php echo $adminrole['admin']['admin_phone']?>"/>
    <font color='red'><?=Html::error($model,"admin_phone")?></font>
    </span>
</p>

<p>
	<label>用户邮箱</label>
    <span class="field"><input style="width:150px" type="text" name="AdminForm[admin_email]" class="mediuminput" value="<?php echo $adminrole['admin']['admin_email']?>"/>
    <font color='red'><?=Html::error($model,"admin_email")?></font>
    </span>
</p>

 <p>
    <label>用户密码</label>
    <span class="field"><input style="width:100px" type="text" name="AdminForm[admin_password]" class="mediuminput" value="<?php echo $adminrole['admin']['admin_password']?>"/>
    <font color='red'><?=Html::error($model,"admin_password")?></font>
    </span>
</p>

<p>
    <label>用户角色</label>
    <span class="formwrapper">
    <?php foreach ($role as $k => $v) { ?>
        <input type="radio" name="AdminForm[role_id]" value="<?php echo $v['role_id']?>" /><?php echo $v['role_name']?><br />
   <?php }?>
       <font color='red'><?=Html::error($model,"role_id")?></font>
    </span>
</p>

<p>
    <label>是否启用</label>
    <span class="formwrapper">
        <input type="radio" name="AdminForm[admin_status]" value="1" />启用<br />
        <input type="radio" name="AdminForm[admin_status]" value="2" />停用<br />
    </span>
</p>

<br clear="all" /><br />

<p class="stdformbutton">
<input type="submit" id="bu" class="submit radius2" value="修改" />
<input type="reset" class="reset radius2" value="重置" />
</p>


</form>

<br />

</div><!--subcontent-->


</div><!--contentwrapper-->

</div><!-- centercontent -->


</div><!--bodywrapper-->
<script>

jQuery('.datetimepicker1').datetimepicker({
    datepicker:false,
    format:'H:i',
    step:5
});

</script>
</body>
</html>
