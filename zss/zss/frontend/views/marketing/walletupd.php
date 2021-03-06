<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>后台管理系统</title>
<script type="text/javascript" src="assets/js/plugins/jquery-1.7.min.js"></script>
<link rel="stylesheet" href="assets/css/style.default.css" type="text/css" />
<script type="text/javascript" src="assets/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="assets/js/custom/general.js"></script>
<script type="text/javascript" src="assets/js/custom/tables.js"></script>
<script type="text/javascript" src="assets/js/custom/from.js"></script>
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
            <li><a href="?r=marketing/index">红包管理</a></li>
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu--><!--leftmenu-->
        
    <div class="centercontent tables">
        <div id="contentwrapper" class="contentwrapper">
          
          <div class="contenttitle2">
                    <font size="20px">红包信息修改</font>
        </div><!--contentwrapper-->
        <div id="form" style="margin-left:50px; margin-bottom:200px;margin-top:50px;">
                   
<?php $form = ActiveForm::begin([
    'id'=>'form1',
    'options'=>['class'=>'stdform'],
])?>
    <p>
        <span class="field">
            <?php $model->wallet_name = $wallet_list['0']['wallet_name']; echo $form->field($model,'wallet_name')->textInput(["style"=>'width:600px'])->label("红包名称") ?>
        </span>
    </p>
    <p>
        <label>是否限定金额</label>
        <span class="field">
        <select name="wallet_num_price" id="selection">
            <option value="1">是</option>
            <option value="0">否</option>
        </select>
        </span>
    </p>
<div id='hide'>
    <p id="wallet_price">
        <span class="field">
        <?php $model->wallet_price = $wallet_list['0']['wallet_price']; echo $form->field($model,'wallet_price')->textInput(["style"=>'width:600px'])->label("限定金额") ?>
        </span>
    </p>
    
    <p id="wallet_share">
        <span class="field">
          <?php $model->wallet_share = $wallet_list['0']['wallet_share']; echo $form->field($model,'wallet_share')->textInput(["style"=>'width:600px'])->label("分享者得到")  ?>  
        </span></span>
    </p>
    <p id="wallet_sharing">
        <span class="field">
        <?php $model->wallet_sharing = $wallet_list['0']['wallet_sharing']; echo $form->field($model,'wallet_sharing')->textInput(["style"=>'width:600px'])->label("被分享者得到") ?>
        </span>
    </p>
</div>
    <p>
        <label>红包模板</label>
        <span class="field"><textarea cols="100" id="editor" rows="10" name="wallet_template" class="mediuminput"></textarea></span> 
    </p>
    <br />
    <p class="stdformbutton">
        <button class="submit radius2">Submit Button</button>
    </p>
      <input type="hidden" name="wallet_id" value="<?php echo $wallet_id;?>" />
<?php ActiveForm::end();?>
        </div>
    </div><!-- centercontent --> 
</div><!--bodywrapper-->
</body>
</html>
<script>
     jQuery(document).ready(function($){
        //判断是否限定金额
        // @  is 为是否限定金额
        $('#selection').change(function(){
            var is = $('#selection').val();
            if(is==0)
            {
                $('#hide').hide();
            }
             if(is==1)
            {
                $('#hide').show();
            }
        });
    });
</script>