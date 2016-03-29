<?php
use yii\helpers\Html;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>宅食送后台管理系统</title>
<script type="text/javascript" src="assets/js/plugins/jquery-1.7.min.js"></script>
<link rel="stylesheet" href="assets/css/style.default.css" type="text/css" />
<script type="text/javascript" src="assets/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="assets/js/custom/general.js"></script>
<script type="text/javascript" src="assets/js/custom/tables.js"></script>
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
<h1 class="pagetitle">优惠券信息</h1>
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
                            <input type="checkbox" id='checkall'/>
                          </span></th>
                            <th class="head1">ID</th>
                            <th class="head0">名称</th>
                            <th class="head1">抵用金额</th>
                            <th class="head1">抵用菜品</th>
                            <th class="head1">抵用品种</th>
                            <th class="head1">是否显示</th>
                            <th class="head1">创建时间</th>
                            <th class="head0">修改时间</th>
                            <th class="head0">结束时间</th>
                            <th class="head1">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- 优惠券 -->
                    <?php foreach($coupon_list as $v):?>
                        <tr class="gradeX">
                          <td align="center"><span class="center">
                            <input type="checkbox" name="checkname" value="<?php echo $v["coupon_id"]?>" />
                          </span ></td>
                          <td class="center"><?php echo $v["coupon_id"]?></td>
                          <td class="center"><?php echo $v["coupon_name"]?></td>
                                <td class="center"><?php echo $v["coupon_price"]?></td>
                                <td class="center"><?php echo $v["menu_name"]?></td>
                                <td class="center"><?php echo $v["series_name"]?></td>
                                <td class="show" vlaue='<?php echo $v['add_show']?>' id="<?php echo $v["coupon_id"]?>">
                                    <?php 
                                        if($v['add_show']==1){
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
                                <td class="center">
                                    <?php
                                        echo date('Y-m-d H:i:s',$v['end_at']);
                                    ?>
                                </td>
                                <td><a href="?r=marketing/couponupd&&coupon_id=<?php echo $v["coupon_id"]?>"><img src="/assets/images/gai.jpg" alt="" height="20" width="20"/></a>&nbsp;&nbsp;<a href="?r=marketing/coupondel&&coupon_id=<?php echo $v["coupon_id"]?>"><img src="/assets/images/laji.jpg" alt="" height="20" width="20"/></a></td>
                       
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
        </div><!--contentwrapper-->
        <div id="form" style="margin-left:50px; margin-bottom:200px;margin-top:50px;">
            <form id="form1" class="stdform" method="post" action="<?= Yii::$app->urlManager->createUrl(['marketing/couponadd'])?>">
            <div>
            <input type="hidden" value="a429b6c0f4468db23a5661d1682db537fe2672c7" name="YII_CSRF_TOKEN" />
                <p>
                    <label>名称</label>
                    <span class="field"><input type="text" name="coupon_name" id="firstname" class="longinput" /><span id='coupon_name'></span></span>
                </p>
                <p>
                    <label>抵用金额</label>
                    <span class="field"><input type="text" name="coupon_price" id="firstnames" class="longinput" /></span>
                </p>
                <p>
                    <label>抵用品种</label>
                    <span class="field">
                    <select name="series_id" class="selection">
                    <?php foreach($series_list as $k=>$v){?>
                        <option value="<?php echo $v['series_id']?>"><?php echo $v['series_name']?></option>
                    <?php }  ?>
                    </select>
                    </span>
                </p>
                <p>
                    <div id="t_body" style="text-align:center; overflow:scroll;margin-left:230px;height:200px;width:230px;border:1px solid #000; align:center;" ></div>
                </p>
                <p class="stdformbutton">
                    <button class="submit radius2">Submit Button</button>
                </p>
                </div>
            </form>
        </div>
    </div><!-- centercontent --> 
</div><!--bodywrapper-->
</body>
</html>
<script>
    $(document).ready(function($){
        $('#form').hide();
        $(document).on('click','#click',function(){
            $('#form').show(); 
        });

        $('.selection').change(function (){
            var series_id = $(this).val();
            $.get('index.php?r=marketing/seriesmenu',{series_id:series_id},function (txt){
                //alert(txt)
               $('#t_body').html(txt);
            });
        });
        //判断唯一性
       $('#firstname').on('blur',function (){
            var coupon_name = $('#firstname').val();
            $.get('index.php?r=marketing/couponone',{coupon_name:coupon_name},function (txt){
                $('#coupon_name').html(txt)
            });
        })
       $("#checkall").click( 
          function(){ 
            if(this.checked){ 
                $("input[name='checkname']").attr('checked', true);
            }else{ 
                $("input[name='checkname']").attr('checked', false);
            } 
          } 
        );
        //批量删除
       $('#del').click(function (){
            var all = $("input[name='checkname']");
            str="";
            for (var i=0;i<all.length;i++) {
                if(all[i].checked==true){
                    str+=','+all[i].value;               
                }
            }
            str = str.substr(1)
            $.get('index.php?r=marketing/coupondel',{coupon_id:str},function(txt){
                location.reload();
            })
        });

        //修改优惠券的状态
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
                    url:"<?php echo Yii::$app->urlManager->createUrl('marketing/coupon_show');?>",
                    data:{"id":id,"status":status},
                    success:function(data){
                    }
                })
            })
    });
</script>
