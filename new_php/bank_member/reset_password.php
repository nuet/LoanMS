<?php
include('../lock.php');
include('../config.php');
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

$user_check=$_SESSION['login_user'];
$ses_sql=mysql_query("select * from users where username='$user_check' ");

$row=mysql_fetch_array($ses_sql);
$userID=$row['userID'];
$orgID=$row['organizationID'];

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
$orgName=$org_row['orgName'];
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
//Update User's Password
if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['submit']!="")
	{
		if($_POST['old_password']!="" and $_POST['new_password']!="" and $_POST['new2_password']!="")
		{
			$old_password= mysql_real_escape_string($_POST['old_password']);
			$new_password= mysql_real_escape_string($_POST['new_password']);
			$new2_password= mysql_real_escape_string($_POST['new2_password']);
			if($old_password==$password)
			{
				if($new_password==$new2_password)
				{
					$passwordUpdate="UPDATE users SET password='".$new_password."' where userID=".$userID;
			
					$password_query = mysql_query($passwordUpdate);
					if($password_query)
					{
						$update_status=1;
						$update_result='您的个人密码成功更新！请点击 <a href="reset_password.php"; style="color:red"> 这里 </a> 刷新页面.';
        			}
        			else
        			{
						$update_status=0;
     			   		$update_result="对不起，您的个人密码未成功更新。请重试。";
        			}    
				}
				else
				{
					$update_status=0;
     		   		$update_result="对不起，您的新密码不匹配，请重新输入新密码和确认新密码";
				}
			}
			else
			{
			   	$update_status=0;
     		   	$update_result="对不起，您的旧密码输入有误，请重新输入旧密码";	
			}
		}
		else
		{
				$update_status=0;
				$update_result="对不起，有*必填项未填写，请补充。";
		}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>重设密码</title>
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
    	<li><a href="user_profile.php">个人资料管理</a></li>
        <li class="current"><a href="reset_password.php" class="current">更换密码</a></li>
		<li><a href="validation.php">手机认证</a></li>
	</ul>
</div>
<div class="uc_r_bl_box clearfix">
<div class="blank"></div>
<div class="item_group" style="width: 660px">更改个人登录密码</div>
<div class="inc wb">
	<div class="inc_main">
		<div class="tip-h clearfix">
			<div class="blank"></div>
			<form method="post" action="" name="reset_password" id="reset_password">
			<table width="440" border="0" style="margin:0 auto;">
                <tbody>
                <tr>
                    <td width="50">
                        <div align="left">原密码：</div>
                    </td>
                    <td>
                        <input type="password" id="old_password" name="old_password" class="password">
                    </td>
                    <td height="35" colspan="2" class="f_gray">
                        请输入您原先的密码。
                    </td>
                </tr>
                <tr>
                    <td>
                        <div align="left"> 新密码：</div>
                    </td>
                    <td>
                        <input type="password" name="new_password" id="new_password" class="password">
                    </td>
                     <td height="35" colspan="2" class="f_gray">
                        请输入您的新密码。
                    </td>
                </tr>
                <tr>
                    <td>
                        <div align="left"> 确认新密码：</div>
                    </td>
                    <td>
                        <input type="password" name="new2_password" id="new2_password" class="password">
                    </td>
                     <td height="35" colspan="2" class="f_gray">
                        请再次输入您的新密码。
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <div style="padding-left:3px">
                            <input type="submit" name="submit" id='submit' value="提交" class="greenbt2">
                        </div>
                    </td>
                </tr>
            	</tbody>
			</table>
			</form>
             &nbsp;
            <?php
				if($update_status==1)
					echo '<center><label style="color:#390"><h2>'.$update_result.'</h2></label></center>';
				else
					echo '<center><label style="color:#C00"><h2>'.$update_result.' '.$passwordUpdate.'</h2></label></center>';			
			?>	
		</div>
	</div>	
	<div class="inc_foot"></div>
</div>
</div>
<script type="text/javascript">
	jQuery(function(){
		$("#j_bind_mobile").submit(function(){
			var query = new Object();
			query.ctl = 'ajax';
			query.act = 'check_verify_code';
			query.mobile = $("#J_Vphone").val();
			query.verify = $("#validateCode").val();
			query.ajax = 1;
			$.ajax({
				url : APP_ROOT+"/index.php",
				data:query,
				type:"post",
				dataType:"json",
				success: function(obj){
					if(obj.status)
					{			
						$.showSuccess(obj.info,function(){
							window.location.href=window.location.href;
						});
					}
					else
						$.showErr(obj.info);
				},
				error:function(ajaxobj)
				{
					/*if(ajaxobj.responseText!='')
					alert(ajaxobj.responseText);*/
				}
			});
			return false;
		});
	});
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
