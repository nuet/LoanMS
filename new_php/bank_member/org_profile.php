<?php
include('../lock.php');
include('../config.php');
error_reporting(E_ALL ^ E_NOTICE);

$user_check=$_SESSION['login_user'];
$ses_sql=mysql_query("select * from users where username='$user_check' ");

$row=mysql_fetch_array($ses_sql);
$userID=$row['userID'];
$orgID=$row['organizationID'];

$user_groupID=$row['groupID'];
if($user_groupID!=2)
	header("Location: logout.php");

$user_groupID=$row['groupID'];
if($user_groupID!=2)
	header("Location: logout.php");

$org_sql="SELECT * FROM organization WHERE organizationID=".$orgID;
$org_result=mysql_query($org_sql);
$org_row=mysql_fetch_array($org_result);

//User Information
$password=$row['password'];
$fname=$row['FirstName'];
$lname=$row['LastName'];
$haddress=$row['homeAddress'];
$baddress=$row['businessAddress'];
$IDType=$row['IDType'];
$IDNo=$row['IDNo'];
$email=$row['email'];
$gender=$row['gender'];
$phone=$row['phone'];
$eName=$row['emergencyName'];
$eEmail=$row['emergencyEmail'];
$ePhone=$row['emergencyPhone'];

//Organization Information
$$orgName=$org_row['orgName'];
$regDate=$org_row['regTime'];
$regLocation=$org_row['regLocation'];
$prodLocation=$org_row['prodLocation'];
$regCapital=$org_row['regCapital'];
$regLicence=$org_row['regLicence'];
$regAuthority=$org_row['regAuthority'];
$contactName=$org_row['contactName'];
$contactEmail=$org_row['contactEmail'];
$contactPhone=$org_row['contactPhone'];
$appendum=$org_row['appendum'];
?>

<?php
//Update User's Profile
if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['submit']!="")
	{
		if($_POST['prodLocation']!="" or $_POST['contactName']!="" or $_POST['contactPhone']!="" or $_POST['contactEmail']!="" or $_POST['appendum']!="")
		{
			$newprodLocation= mysql_real_escape_string($_POST['prodLocation']);
			$newcontactName= mysql_real_escape_string($_POST['contactName']);
			$newcontactPhone= mysql_real_escape_string($_POST['contactPhone']);
			$newcontactEmail=mysql_real_escape_string($_POST['contactEmail']);
			$newAppendum=mysql_real_escape_string($_POST['appendum']);
			
			$orgUpdate="UPDATE organization SET prodLocation='".$newprodLocation."', contactName='".$newcontactName."', contactEmail='".$newcontactEmail."', contactPhone='".$newcontactPhone."', appendum='".$newAppendum."' where organizationID=".$orgID;
			
			$orgUpdate_query = mysql_query($orgUpdate);
			if($orgUpdate_query)
			{
				$update_status=1;
				$update_result='您的企业信息成功更新！请点击 <a href="org_profile.php"; style="color:red"> 这里 </a> 刷新页面.';
        	}
        	else
        	{
				$update_status=0;
     		   	$update_result="对不起，您的企业信息未成功更新。请重试。";
        	}    	
		}
		else
		{
				$update_status=0;
				$update_result="对不起，未找到更新的信息。请选择您需要修改的栏目。";
		}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>企业信息设置</title>
<link rel="icon" href="favicon.ico" type="/image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="/image/x-icon" />
<meta name="keywords" content="星月慧文金融" />
<meta name="description" content="星月慧文金融—最大、最安全的网络借贷平台" />
<link rel="stylesheet" type="text/css" href="css/cd5130c04e21f5fa934eaeb037e9923a.css" />
<link rel="stylesheet" type="text/css" href="css/global.css" />
<script type="text/javascript">
var APP_ROOT = '';;
var LOADER_IMG = 'images/lazy_loading.gif';
var ERROR_IMG = 'images/image_err.gif';
var send_span = 2000;
</script>
<script type="text/javascript" src="js/lang.js"></script>
<script type="text/javascript" src="js/ae18c80063dd21d5707e2fee2458de84.js"></script>
<script type="text/javascript" src="meter/jquery.min.js"></script>
<script type="text/javascript" src="meter/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="meter/jqplot.MeterGaugeRenderer.min.js"></script>
</head>

<body>
<div id="c_header">
	<div class="head_top">
	</div>
	<div class="head_bottom">
		<div class="wrap">
			<div class="logo">
				<a href=""><img src="images/5433d43e3d768.png"/></a>
			</div>
			<div class="nav">
				<ul>
					<li  class="downnav"><a href="">公司信息</a>
					<dl>
						<dd><a href="org_profile.php">基本资料管理</a></dd>
					</dl>
					</li>
					
					<li class="downnav"><a href="">贷款信息</a>
					<dl>
                        <dd><a href="loan_manage.php">已发布贷款</a></dd>
					</dl>
					</li>
					<li class="downnav"><a href="">个人信息</a>
					<dl>
						<dd><a href="user_profile.php">更新个人信息</a></dd>
						<dd><a href="reset_password.php">重设密码</a></dd>
						<dd><a href="validation.php">手机验证</a></dd>
					</dl>
					</li>
				</ul>
			</div>
			<div class="menu">
				<div class="search">
				<form name="search" action="" method="get">
					<input class="keyword" type="text" name="keyword"/>
					<input class="submit" type="submit" name="submit" value="搜索"/>
				</form>
				</div>
				<div class="menu_con">
					<a href=""><img src="images/menu_01.png"/><br/>消息</a>
					<a href="user_profile.php"><img src="images/menu_02.png"/><br/>资料</a>
					<a href=""><img src="images/menu_03.png"/><br/>求助</a>
					<a href="logout.php"><img src="images/menu_04.png"/><br/>退出</a>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>	
<script type="text/javascript">
$(function(){
	$(".downnav").mouseenter(function(){
		$(this).addClass("downnav_hover");
		$("dl",this).show();
	}).mouseleave(function(){
		$(this).removeClass("downnav_hover");
		$("dl",this).hide();
	});
});
</script>		
<div class="wrap">
 
<div class="blank"></div>
<div class="long_uc f_l">
	<div id="dashboard" class="dashboard">
	<ul>
		<li class="current"><a href="org_profile.php">公司基本资料管理</a></li>
	</ul>
</div>
<div class="uc_r_bl_box clearfix">
<div class="blank"></div>
<div class="tips mr10 ml10" style="width: auto">
	<span class="f_red b">*</span> 为必填项，所有资料均会严格保密
</div>
<style>
	.field{width:450px}
</style>
<div class="blank"></div>
<div class="item_group" style="width: 650px">公司基本资料</div>
<form method="post" action="" name="modify">
<div class="inc wb">
	<div class="inc_main">
			<table width="738px" class="user_info_table">
				<tr>
					<td class="pt10" style="width:460px">						
						<div class="blank"></div>
						<div class="field real_name">
							<label for="orgName"><span class="red">*</span>企业名称</label>
							<input type="text" value="<?php echo $orgName;?>" readonly="readonly" disabled="true" class="f-input readonly" id="orgName" name="orgName" size="30">
						</div>
						<div class="field idno">
							<label for="settings-idno"><span class="red">*</span>注册时间</label>
							<input type="text" value="<?php echo $regDate;?>" readonly="readonly" disabled="true" class="f-input readonly" id="regDate" name="regDate" size="30" onkeyup="idcheck(this);" >
						</div>
						<div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>注册地点</label>
							<input type="text" value="<?php echo $regLocation;?>"  class="readonly" id="regLocation" name="regLocation" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>注册资本</label>
							<input type="text" value="<?php echo $regCapital;?>"  class="readonly" id="regCapital" name="regCapital" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>注册执照编号</label>
							<input type="text" value="<?php echo $regLicence;?>"  class="readonly" id="regLicence" name="regLicence" size="30">
						</div>
						<div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>注册所在部门</label>
							<input type="text" value="<?php echo $regAuthority;?>"  class="readonly" id="regAuthority" name="regAuthority" size="30">
						</div>
						
						<div class="field address">
							<label for="settings-address"><span class="red">*</span>生产地址</label>
							<input value="<?php echo $prodLocation;?>" class="f-input" name="prodLocation" id="prodLocation">
						</div>
						
						<div class="field address">
							<label for="settings-address"><span class="red">*</span>联系人姓名</label>
							<input value="<?php echo $contactName;?>" class="f-input" name="contactName" id="contactName">
						</div>
                        
                        <div class="field address">
							<label for="settings-address"><span class="red">*</span>联系人邮箱</label>
							<input value="<?php echo $contactEmail;?>" class="f-input" name="contactEmail" id="contactEmail">
						</div>
                        
                        <div class="field address">
							<label for="settings-address"><span class="red">*</span>联系人电话</label>
							<input value="<?php echo $contactPhone;?>" class="f-input" name="contactPhone" id="contactPhone">
						</div>
                        <div class="field address">
							<label for="settings-address"><span class="red">*</span>公司情况备注</label>
							<textarea row=50 col=100 name="appendum" id="appendum"><?php echo $appendum;?></textarea>
						</div>
                        
					</td>
					<td class="pt10" valign="top" style="width:180px;">
							<img id="avatar" src="images/60virtual_avatar_middle.jpg" />
							<div class="blank"></div>
							<label class="fileupload" onclick="upd_file(this,'avatar_file',60);">
							<input type="file" class="filebox" name="avatar_file" id="avatar_file"/>
							
							</label>
							<label class="fileuploading hide" ></label>							
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="blank"></div>
						<div class="clearfix b" style="padding: 10px 90px">请确保您填写的资料真实有效，所有资料将会严格保密。一旦被发现所填资料有虚假，将会影响您在秉信成金融的信用，对以后借款造成影响。</div>
						<div class="blank"></div>
					</td>
				</tr>
				
			</table>
			&nbsp;
            <?php
				if($update_status==1)
					echo '<center><label style="color:#390"><h2>'.$update_result.'</h2></label></center>';
				else
					echo '<center><label style="color:#C00"><h2>'.$update_result.' '.$orgUpdate.'</h2></label></center>';			
			?>	
						
			<div class="blank"></div>
			<div class="act mt10 mb10 tc">
					<input type="hidden" value="60" name="id" />
					<input type="submit" class="saveSettingBnt" id="submit" name="submit" value="保存并继续">
			</div>
			<div class="blank"></div>
	</div>
	<div class="inc_foot"></div>
</div>
</form>
</div>
<script type="text/javascript" src="js/ajaxupload.js"></script>
<script type="text/javascript">
function setPhone(){
	var frphone = $.trim($("#frphone").val());
	var numphone = $.trim($("#numphone").val());
	if(frphone!=""&&numphone!=""){
		$("#phone").val(frphone+"-"+numphone);
	}
	else{
		$("#phone").val("");
	}
}
$(document).ready(function(){

	$("#settings-submit").click(function(){
				if($.trim($("#settings-password").val())!=''&&!$.minLength($("#settings-password").val(),4,false))
		{
			$("#settings-password").focus();
			$.showErr("密码格式错误，请重新输入");	
			return false;
		}
		
		if($("#settings-password-confirm").val() != $("#settings-password").val())
		{
			$("#settings-password-confirm").focus();
			$.showErr("密码确认失败");			
			return false;
		}
		
					
		
			
		
					if($.trim($("#settings-mobile").val()).length == 0)
			{
				$("#settings-mobile").focus();
				$.showErr("手机号码不能为空");
				
				return false;
			}
				
		if($("select[name='byear']").val()== 0||$("select[name='bmonth']").val() == 0||$("select[name='bday']").val() == 0)
		{
			$("select[name='byear']").focus();
			$.showErr("出生日期不能为空");
			
			return false;
		}
		
		
		if($("#settings-graduatedyear").val() == ""){
			$("#settings-graduatedyear").focus();
			$.showErr("入学年份不能为空");
			
			return false;
		}
		
		var is_marriage = false;
		$("input[name='marriage']").each(function(){
			if($(this).attr("checked")==true){
				is_marriage = true;
			}
		});
		
		if(!is_marriage){
			$.showErr("婚姻状况不能为空");
			return false;
		}
		var is_haschild
		$("input[name='haschild']").each(function(){
			if($(this).attr("checked")==true){
				is_haschild = true;
			}
		});
		
		if(!is_haschild){
			$.showErr("有无子女不能为空");
			return false;
		}
		
		if($.trim($("#settings-graduation").val()).length == 0){
			$("#settings-graduation").focus();
			$.showErr("最高学历不能为空");
			
			return false;
		}
		
									if($("select[name='n_province_id']").val()== 0||$("select[name='n_city_id']").val() == 0)
		{
			$("select[name='n_province_id']").focus();
			$.showErr("籍贯不能为空");
			
			return false;
		}
		if($("select[name='province_id']").val()== 0||$("select[name='city_id']").val() == 0)
		{
			$("select[name='province_id']").focus();
			$.showErr("户口所在地不能为空");
			
			return false;
		}
		
		if($.trim($("#settings-address").val()).length == 0){
			$("#settings-address").focus();
			$.showErr("居住地址不能为空");
			
			return false;
		}

	});
});

function upd_file(obj,file_id,uid)
{	
	$("input[name='"+file_id+"']").bind("change",function(){			
		$(obj).hide();
		$(obj).parent().find(".fileuploading").removeClass("hide");
		$(obj).parent().find(".fileuploading").removeClass("show");
		$(obj).parent().find(".fileuploading").addClass("show");
		  $.ajaxFileUpload
		   (
			   {
				    url:APP_ROOT+'/index.php?ctl=avatar&act=upload&uid='+uid,
				    secureuri:false,
				    fileElementId:file_id,
				    dataType: 'json',
				    success: function (data, status)
				    {
				   		$(obj).show();
				   		$(obj).parent().find(".fileuploading").removeClass("hide");
						$(obj).parent().find(".fileuploading").removeClass("show");
						$(obj).parent().find(".fileuploading").addClass("hide");
				   		if(data.status==1)
				   		{
				   			document.getElementById("avatar").src = data.middle_url+"?r="+Math.random();
				   		}
				   		else
				   		{
				   			$.showErr(data.msg);
				   		}
				   		
				    },
				    error: function (data, status, e)
				    {
						$.showErr(data.responseText);;
				    	$(obj).show();
				    	$(obj).parent().find(".fileuploading").removeClass("hide");
						$(obj).parent().find(".fileuploading").removeClass("show");
						$(obj).parent().find(".fileuploading").addClass("hide");
				    }
			   }
		   );
		  $("input[name='"+file_id+"']").unbind("change");
	});	
}

//切换地区
$(document).ready(function(){	
		$("select[name='province_id']").bind("change",function(){
			load_city($("select[name='province_id']"),$("select[name='city_id']"));
		});
		$("select[name='n_province_id']").bind("change",function(){
			load_city($("select[name='n_province_id']"),$("select[name='n_city_id']"));
		});
		
		$("input[name='hashouse']").click(function(){
			if($(this).val()==1){
				$("input[name='houseloan']").attr("disabled",false);
			}
			else{
				$("input[name='houseloan']").attr("disabled",true);
				$("#houseloan_1").attr("checked",false);
				$("#houseloan_0").attr("checked",true);
			}
		});
		
		$("input[name='hascar']").click(function(){
			if($(this).val()==1){
				$("input[name='carloan']").attr("disabled",false);
			}
			else{
				$("input[name='carloan']").attr("disabled",true);
				$("#carloan_1").attr("checked",false);
				$("#carloan_0").attr("checked",true);
			}
		});
	});
	
	function load_city(pname,cname)
	{
		var id = pname.val();
		var evalStr="regionConf.r"+id+".c";

		if(id==0)
		{
			var html = "<option value='0'>="+LANG['SELECT_PLEASE']+"=</option>";
		}
		else
		{
			var regionConfs=eval(evalStr);
			evalStr+=".";
			var html = "<option value='0'>="+LANG['SELECT_PLEASE']+"=</option>";
			for(var key in regionConfs)
			{
				html+="<option value='"+eval(evalStr+key+".i")+"'>"+eval(evalStr+key+".n")+"</option>";
			}
		}
		cname.html(html);
	}
	function idcheck(o){
	   var str=o.value;
	   var byear=$("select[name='byear']");
	   var bmonth=$("select[name='bmonth']");
	   var bday=$("select[name='bday']");
		if(str.length==15){
	    	var re=/\d{6}(\d{2})([01]\d)([0123]\d)\d{3}/;
			var id=re.exec(str);
			byear.val(19+id[1]);
			bmonth.val(id[2]);
			bday.val(id[3]);
			alert(id[2]);
		}else if(str.length==18){
			var re=/\d{6}([12]\d{3})([01]\d)([0123]\d)\d{3}(\d|\w)/;
			var id=re.exec(str);
			byear.val(id[1]);
			bmonth.val(id[2]);
			bday.val(id[3]);
		}else{
			byear.val("");
			bmonth.val("");
			bday.val("");
			return false;	
		}
	
	 }
</script></div>
<div class="info f_l">
	<div id="info_grade">
	<h2>银行贷款管理信息</h2>
    <table id="info_dksp_status" style="border-collapse:collapse;">
		<tr><th colspan="3">银行贷款信息列表</th></tr>
		<tr>
			<td>贷款企业数量</td>
			<td>贷款总额</td>
			<td>合作保险公司数量</td>
		</tr>
		<tr>
			<td>
            <?php 
			$loan_stats_result=mysql_query('select DISTINCT organizationID from t_loan where bankID='.$orgID);
			$loan_stats_num=mysql_num_rows($loan_stats_result);
			echo $loan_stats_num;
			?>
            </td>
			<td><?php
			$loan_stats2_result=mysql_query('select total from t_loan where bankID='.$orgID);
			$loan_stats2_sum=0;
			while($loan_stats2_row=mysql_fetch_array($loan_stats2_result))
			{
				$loan_stats2_sum=$loan_stats2_sum+$loan_stats2_row['total'];
			}
			echo $loan_stats2_sum;
			?></td>
			<td><?php
			$loan_stats3_result=mysql_query('select DISTINCT insuranceID from t_loan where insuranceID is NOT NULL and bankID='.$orgID);
			$loan_stats3_num=mysql_num_rows($loan_stats3_result);
			echo $loan_stats3_num;
			?></td>
		</tr>
	</table>
    <div class="blank20"></div>
	<!--<img src="images/info_02.jpg"/>-->
	</div>
	
	<h2>公司信息完整度</h2>
	<table id="info_dkgl_status" style="border-collapse:collapse;">
		<tr><th colspan="3">公司信息完整度列表</th></tr>
		<tr>
			<td>信息名称</td>
			<td>状态</td>
			<td>详情</td>
		</tr>
		<tr>
			<td>注册执照号</td>
			<td><?php 
			if($regLicence!="")
				echo "已上传";
			else 
				echo "未上传";?></td>
			<td><?php echo $regLicence;?></td>
		</tr>
		<tr>
			<td>联系人姓名</td>
			<td><?php 
			if($contactName!="")
				echo "已上传";
			else 
				echo "未上传";?></td>
			<td><?php echo $contactName;?></td>
		</tr>
		<tr>
			<td>联系人电话</td>
			<td><?php 
			if($contactPhone!="")
				echo "已上传";
			else 
				echo "未上传";?></td>
			<td><?php echo $contactPhone;?></td>
		</tr>
        <tr>
			<td>联系人邮箱</td>
			<td><?php 
			if($contactEmail!="")
				echo "已上传";
			else 
				echo "未上传";?></td>
			<td>
			<?php echo $contactEmail;?>
            </td>
		</tr>
	</table>
    <h2>个人信息完整度</h2>
	<table id="info_dksp_status" style="border-collapse:collapse;">
		<tr><th colspan="3">个人信息完整度列表</th></tr>
		<tr>
			<td>信息名称</td>
			<td>状态</td>
			<td>详情</td>
		</tr>
		<tr>
			<td>电子邮箱</td>
			<td><?php
			if($email!="")
				echo "已上传";
			else 
				echo "未上传";
			?></td>
			<td><?php
			echo $email
			?></td>
		</tr>
		<tr>
			<td>联系电话</td>
			<td><?php
			if($phone!="")
				echo "已上传";
			else 
				echo "未上传";
			?></td>
			<td>
			<?php
			echo $phone;
			?>
            </td></td>
		</tr>
        <tr>
			<td>证件信息</td>
			<td><?php
			echo $IDType;
			?></td>
			<td>
			<?php
			echo $IDNo;
			?>
            </td>
		</tr>
	</table>
</div>

<div class="blank"></div>

	</div>
	<div class="blank"></div>
	<div id="ftw">
        <div id="ft">
        	<div class="wrap">
	            <ul class="cf">
	            											<li class="col hp1">
	                    <h3>关于平台</h3>
	                    <ul class="sub-list">
							             
						</ul>
	                </li> 
																				<li class="col hp2">
	                    <h3>使用帮助</h3>
	                    <ul class="sub-list">
																					<li><a href="/index.php?ctl=help&id=8" >常见问题</a></li>
																												<li><a href="/index.php?ctl=aboutp2p" target="_blank">平台原理</a></li>
																												<li><a href="/index.php?ctl=borrow&act=aboutborrow" target="_blank">如何借款</a></li>
																												<li><a href="/index.php?ctl=aboutfee" target="_blank">星月慧文金融费率</a></li>
														             
						</ul>
	                </li> 
																				<li class="col hp3">
	                    <h3>关于我们</h3>
	                    <ul class="sub-list">
																					<li><a href="/index.php?ctl=help&id=1" >公司简介</a></li>
																												<li><a href="/index.php?ctl=help&id=5" >联系我们</a></li>
																												<li><a href="/index.php?ctl=help&id=2" >免责条款</a></li>
														             
						</ul>
	                </li> 
																				<li class="col hp4">
	                    <h3>安全保护</h3>
	                    <ul class="sub-list">
																					<li><a href="/index.php?ctl=aboutlaws" target="_blank">政策法规</a></li>
																												<li><a href="/index.php?ctl=help&id=3" >隐私保护</a></li>
														             
						</ul>
	                </li> 
																					            </ul>
				<div class="blank"></div>
			</div>
			<div class="footer_line"></div>
			<div class="wrap">
					            <div class=copyright>
	            						<div class="tc clearfix">
										<a href="/index.php?ctl=sys&id=39" title="避免私下交易">避免私下交易</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php?ctl=sys&id=38" title="五大重要守则">五大重要守则</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php?ctl=sys&id=37" title="完善的贷中贷后管理">完善的贷中贷后管理</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php?ctl=sys&id=36" title="严格的贷前审核">严格的贷前审核</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php?ctl=sys&id=35" title="隐私保护">隐私保护</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php?ctl=sys&id=34" title="账户安全">账户安全</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php?ctl=sys&id=33" title="本金保障计划">本金保障计划</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php?ctl=sys&id=clew" title="投资小提示">投资小提示</a>
										</div>
					<div class="blank"></div>
						            						电话：025-84458116 周一至周六 9:00-18:00  
					&nbsp;&nbsp;
									
					&nbsp;&nbsp;
										<div class="blank1"></div>	
					<div style="text-align:center;">联系我们：icanpk@126.com &nbsp; 南京星月慧文</div>
<div style="text-align:center;">(c) 2014 星月慧文金融 All rights reserved</div> 
					<div class="blank"></div>				
					
	            </div>
        </div>
    </div>
	<div id="gotop"></div>
</body>
</html>
