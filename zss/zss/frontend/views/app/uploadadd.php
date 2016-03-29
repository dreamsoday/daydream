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
<h1 class="pagetitle">图片轮播添加</h1>
</div>
        <div id="contentwrapper" class="contentwrapper">
        	
        	<div id="basicform" class="subcontent">
                                
                    <!--contenttitle-->
<?php $form = ActiveForm::begin(['options' => ['enctype' =>
'multipart/form-data']]); ?>
<input type="hidden" name="_csrf" value="<?php echo \Yii::$app->request->
getCsrfToken() ?>">
  <p>
 <span class="field"><?= $form->field($model, 'banner_thumb')->label("轮播图片")->
    fileInput() ?></span>
 </p>
 <p>
 <span class="field"><?= $form->field($model, "banner_title")->label("图片标题") ?></span>
 </p>                       
<p>
 <span class="field"><?= $form->field($model, "banner_desc")->textArea(["cols" =>
    "20", "rows" => "10"])->label("图片描述") ?></span>
 </p> 
<p>
 <span class="field"><?= $form->field($model, "banner_url")->label("链接地址") ?></span>
 </p>
 <p> 
 <label>轮播组名</label>
 <span class="field"><select name="group_id" class="uniformselect">
                            <?php foreach ($arrgroup as $v): ?>
                                <option value="<?= Html::encode($v->group_id) ?>"><?= Html::
    encode($v->group_name) ?></option>
                                <?php endforeach; ?>
                            </select></span>
 </p> 
<button>Submit</button>

<?php ActiveForm::end(); ?>
                    
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
