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
<?php  if($is_show == 0){?>
    <style>
        #form{ display:none;}
    </style>
<?php } ?>
</head>

<body class="withvernav">
<div class="bodywrapper">
    <div class="vernav2 iconmenu">
        <ul>
            <li><a href="?r=marketing/index">红包管理</a></li>
            <li><a href="?r=marketing/discount">折扣管理</a></li>
            <li><a href="?r=marketing/subtract">满减管理</a></li>
            <li><a href="?r=marketing/add">满赠管理</a></li>
            <li><a href="?r=marketing/coupon">优惠券管理</a></li>
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu--><!--leftmenu-->
        
    <div class="centercontent tables">
<div class="pageheader notab">
<h1 class="pagetitle">红包信息</h1>
</div><!--pageheader-->
        <div id="contentwrapper" class="contentwrapper">
          
          <div class="contenttitle2">
                    <button id="click">添加</button>
                    <button id="del">删除</button>
                </div><!--contenttitle-->
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable2" style="text-align: center;">
                    <colgroup>
                        <col class="con0" style="width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                          <th class="head0 nosort"><span class="center">
                           <input type="checkbox" id="checkall" />
                          </span></th>
                            <th class="head1">ID</th>
                            <th class="head0">名称</th>
                            <th class="head1">是否限定金额</th>
                            <th class="head0">限定金额</th>
                            <th class="head1">分享者得到</th>
                            <th class="head0">被分享者得到</th>
                            <th class="head0">是否显示</th>
                            <th class="head1">创建时间</th>
                            <th class="head0">修改时间</th>
                            <th class="head1">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- 红包循环 -->
                    <?php foreach($wallet_list as $v){?>
                        <tr class="gradeX">
                          <td align="center"><span class="center">
                            <input type="checkbox" name="checkname" value="<?php echo $v["wallet_id"]?>"/>
                          </span></td>
                          <td class="center"><?php echo $v["wallet_id"]?></td>
                                <td class="center"><?php echo $v["wallet_name"]?></td>
                                <td class="center">
                                    <?php 
                                        if($v['wallet_num_price']==1){
                                            echo "是";
                                        }else{
                                            echo "否";
                                        }
                                    ?>
                                </td>
                                <td class="center"><?php echo $v["wallet_price"]?></td>
                                <td class="center"><?php echo $v["wallet_share"]?></td>
                                <td class="center"><?php echo $v["wallet_sharing"]?></td>
                                <td class="show" vlaue='<?php echo $v['wallet_show']?>' id="<?php echo $v["wallet_id"]?>">
                                    <?php 
                                        if($v['wallet_show']==1){
                                            echo "是";
                                        }else{
                                            echo "否";
                                        }
                                    ?>
                                </td>
                                <td class="center">
                                    <?php
                                        echo date('Y-m-d H:i:s',$v['created_at']);
                                    ?>
                                </td>
                                <td class="center">
                                    <?php
                                        echo date('Y-m-d H:i:s',$v['updated_at']);
                                    ?>
                                </td>
                                <td class="center" value='<?php echo $v['wallet_id']?>'><a href="?r=marketing/walletupd&&wallet_id=<?php echo $v["wallet_id"]?>"><img src="/assets/images/gai.jpg" alt="" height="20" width="20"/></a>&nbsp;&nbsp;<a href="?r=marketing/walletdel&&wallet_id=<?php echo $v["wallet_id"]?>"><img src="/assets/images/laji.jpg" alt="" height="20" width="20"/></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
        </div><!--contentwrapper-->
        <div id="form" style="margin-left:1px; margin-bottom:200px;margin-top:50px;">
           
<?php $form = ActiveForm::begin([
    'id'=>'form1',
    'options'=>['class'=>'stdform'],
])?>
    <p>
        <span class="field">
            <?= $form->field($model,'wallet_name')->textInput(["style"=>'width:600px'])->label("红包名称") ?>
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
<div id='hidden'>
    <p id="wallet_price">
        <span class="field">
        <?= $form->field($model,'wallet_price')->textInput(["style"=>'width:600px'])->label("限定金额") ?>
        </span>
    </p>
    
    <p id="wallet_share">
        <span class="field">
          <?= $form->field($model,'wallet_share')->textInput(["style"=>'width:600px'])->label("分享者得到")  ?>  
        </span></span>
    </p>
    <p id="wallet_sharing">
        <span class="field">
        <?= $form->field($model,'wallet_sharing')->textInput(["style"=>'width:600px'])->label("被分享者得到") ?>
        </span>
    </p>
    <p>
</div>
        <label>红包模板</label>
        <span class="field"><textarea cols="100" id="editor" rows="10" name="wallet_template" class="mediuminput"></textarea></span> 
    </p>
    <br />
    <p class="stdformbutton">
        <button class="submit radius2">Submit Button</button>
    </p>
<?php ActiveForm::end();?>
        </div>
    </div><!-- centercontent --> 
</div><!--bodywrapper-->
</body>
</html>
<script>
    $(document).ready(function($){
        $(document).on('click','#click',function(){
            $('#form').show(); 
        });
        $('#selection').change(function(){
            var is = $('#selection').val()
            if(is==0)
            {
                $('#hidden').hide();
            }
             if(is==1)
            {
                $('#hidden').show();
            }
        });
        $('#checkall').click(
            function(){
                if(this.checked){
                    $("input[name='checkname']").attr('checked',true);
                }else{
                    $("input[name='checkname']").attr('checked',false);
                }
            }
        );
        $('#del').click(function (){
            var all = $("input[name='checkname']");
            str="";
            for (var i=0;i<all.length;i++) {
                if(all[i].checked==true){
                    str+=','+all[i].value;               
                }
            }
            str = str.substr(1)
            $.get('index.php?r=marketing/walletdel',{wallet_id:str},function(txt){
                location.reload();
            })
        });

        //修改红包的状态
        $(document).on("click",".show",function(){
            status = $(this).text();
            if(status == '是'){
                    status=1;
                    $(this).text("否");     
                }else{
                    status =0;
                    $(this).text("是");
                }
            var id = $(this).attr("id");
            $.ajax({
                type:"GET",
                url:"<?php echo Yii::$app->urlManager->createUrl('marketing/wallet_show');?>",
                data:{"id":id,"status":status},
                success:function(data){
                }
            })
        })
    });
</script>
