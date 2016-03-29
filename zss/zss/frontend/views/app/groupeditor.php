<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Forms | Amanda Admin Template</title>
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
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
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
        <br /><br />
    </div><!--leftmenu-->
        
    <div class="centercontent">
    
                            <div class="pageheader notab">
<h1 class="pagetitle">图片轮播组修改</h1>
</div>
        
        <div id="contentwrapper" class="contentwrapper">
        	
        	<div id="basicform" class="subcontent">
                                
                    <!--contenttitle-->
<?php $form = ActiveForm::begin(); ?>
<input type="hidden" name="_csrf" value="<?php echo \Yii::$app->request->
getCsrfToken() ?>">
 <p>
                          
                            <span class="formwrapper">
<!--
解决上传到服务器上出现Creating default object from empty value in错
-->  
 
                     
<?php $model->group_isshow = $arrone['group_isshow'];
echo $form->field($model, 'group_isshow')->radioList(['1' => '显示', '0' => '隐藏'])->
    label("是否显示") ?><br />
                 
                            </span>
                        </p>                       
<p>
 <span class="field"><?= $form->field($model, "group_desc")->label("轮播描述")->
    textArea(["cols" => "30", "rows" => "10", "value" => $arrone->group_desc]) ?></span>
 </p>  
 <p>
 <span class="field">
 <?= $form->field($model, "group_starttime")->label("开始时间")->textInput(["value" =>
    date("Y-m-d H:i:s", $arrone->group_starttime), "id" => "datetimepicker"]) ?>
</span>
 </p> 
 <p>
 <p>
 <span class="field">
 <?= $form->field($model, "group_endtime")->label("结束时间")->textInput(["value" =>
    date("Y-m-d H:i:s", $arrone->group_endtime), "id" => "datetimepicker1"]) ?>
 <span id="sp_time"></span>
 </span>
 </p> 
 <p>
 <span class="field">
 <?= $form->field($model, "group_name")->label("轮播组名")->textInput(["value" => $arrone->
    group_name]) ?>
 </span>
 </p>
  <p>
 <span class="field">
 <?= $form->field($model, "group_id")->hiddenInput(["value" => $arrone->
    group_id])->label("") ?> 
 </span>
 </p>
<button>Submit</button>
<?php ActiveForm::end(); ?>
                    
                    <br />

            </div><!--subcontent-->
            
        
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    
    
</div><!--bodywrapper-->
<script>
var str;
jQuery('.datetimepicker1').datetimepicker({
    datepicker:false,
    format:'H:i',
    step:5
});
jQuery('#datetimepicker').datetimepicker();
jQuery('#datetimepicker1').datetimepicker();
jQuery("#datetimepicker").blur(function(){
   starttime=jQuery("#datetimepicker").val();
})
jQuery("#datetimepicker1").blur(function(){
   endtime=jQuery("#datetimepicker1").val();
   if(endtime <= starttime){
    jQuery("#sp_time").html("结束时间不能小于开始时间");
    str = 0;
    return str;
   }else{
       jQuery("#sp_time").html("");
    str = 1;
    return str;
   }
})

/**
 * $("form").submit( function () {
 *   if(str == 1){
 *     return true;
 *   }else{
 *     return false;
 *   }
 * } );
 */
</script>
</body>
</html>
