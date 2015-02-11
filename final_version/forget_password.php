<?php
include('config.php');
error_reporting(E_ALL ^ E_NOTICE ^E_WARNING);
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['submit']!="")
{
		date_default_timezone_set('Etc/UTC');

		require './PHPMailer/PHPMailerAutoload.php';
		if($_POST['username']!="")
		{
			$username=$_POST['username'];

			$password_sql="select * from users where username='".$username."';";
			$password_result=mysql_query($password_sql);
			$password_count=mysql_num_rows($password_result);
			if($password_count!=0)
			{
				$password_row=mysql_fetch_array($password_result);
				$password=$password_row['password'];
				$email=$password_row['email'];
					$mail = new PHPMailer(); // create a new object
					$mail->CharSet="UTF-8"; 
					$mail->IsSMTP(); // enable SMTP
					$mail->SMTPDebug = false; // debugging: 1 = errors and messages, 2 = messages only
					$mail->SMTPAuth = true; // authentication enabled
					$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
					$mail->Host = "p3plcpnl0970.prod.phx3.secureserver.net";
					$mail->Port = 465; // or 587
					$mail->IsHTML(true);
					$mail->Username = "customer-support@china-bxc.com";
					$mail->Password = "1qaz2wsX";
					$mail->SetFrom("customer-support@china-bxc.com");
					$mail->Subject = "秉信成金融服务-密码信息";
					$mail->Body = "尊敬的用户，<br/>
									您好！<br/>
									
									您的登陆密码如下:".$password."。请妥善保存，切勿遗失和泄密。<br/>
									再次感谢您对于我们的支持！<br/>
										您的第三方金融服务管家 南京秉信成";
					$mail->AddAddress(''.$email.'');
					if(!$mail->Send()){
						$send_status=0;
						$send_result="抱歉，邮件发送失败。请重试。";
					} 
					else {
						$send_status=1;
						$send_result="恭喜！您的密码信息已成功发送到您的邮箱。";
					} 
				}
				else
				{
					$send_status=0;
					$send_result="抱歉，您的用户名不存在。";
				}
		}
		else
		{
			$send_status=0;
			$send_result="*用户名尚未填写，请补充资料，谢谢！";
		}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>秉信成-忘记密码</title>
<link rel="icon" href="favicon.ico" type="/image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="/image/x-icon" />
<meta name="keywords" content="南京典乐p2p信贷" />
<meta name="description" content="p2p信贷—最大、最安全的网络借贷平台" />
<link rel="stylesheet" type="text/css" href="css/45b54320afc8c74bc08f31058d10c6aa.css" />
<link rel="stylesheet" type="text/css" href="css/f98b4cbc275abb1099c85d24b252e306.css" />
<link rel="stylesheet" type="text/css" href="./css/2478b39b4fd11430e5bc078c9c4b5bdf.css">
<script type="text/javascript">
var APP_ROOT = '';;
var LOADER_IMG = 'img/lazy_loading.gif';
var ERROR_IMG = 'img/image_err.gif';
var send_span = 2000;
</script>
<script type="text/javascript" src="js/lang.js"></script>
<script type="text/javascript" src="js/ae18c80063dd21d5707e2fee2458de84.js"></script>
</head>
<body class="register_body">
<div class="top">
  <div class="header"> 
	<div class="logo"><a class="ui-header-logo" href="index.php"></a><a class="ui-header-slogan" href="/"></a></div>
    <ul>
      <li class="hover n_1" rel="1"><a href="#" class="hh">登陆/注册</a></li>
      <li rel="2"><a href="#" class="hh">产品/服务</a></li>
      <li rel="3"><a href="#" class="hh">支持</a></li>
    </ul>
  </div>
  <div class="pos">
    <div class="pos_con">
      <ul class="n_1" rel="1" style="margin-left:620px;">
        <a href="login.php">用户登录</a> <a href="org_register.php">新企业接入</a> <a href="user_register.php">新用户注册</a><a href="confirm_email.php">企业验证码</a>
      </ul>
      <ul class="n_2" rel="2" style="margin-left:720px;">
        <a href="product.php">业务介绍</a>
      </ul>
      <ul class="n_3" rel="3" style="margin-left:820px;">
        <a href="help.php">业务流程介绍</a>
      </ul>
    </div>
  </div>
</div>
<script type="text/javascript">
	$(function(){
		var timer = setTimeout(function(){
			$(".pos_con ul").hide()
		},500);
		$(".header li").each(function(index,element){
			
			$(this).mouseover(function(){
			
				$(".pos_con ul").hide().eq(index).show();
				clearTimeout(timer);
				
			}).mouseout(function(){
				timer = setTimeout(function(){
					$(".pos_con ul").hide()
				},300);
			});
		});
			$(".pos").mouseover(function(){
				clearTimeout(timer);
			});
			$(".pos_con ul").mouseleave(function(){
				$(this).hide();
			});
		
	
	});
</script>
	
<div class="blank"></div>
	<div class="inc wb wrap register_box">
		<div class="hd_tip">南京秉信成第三方金融服务公司为企业搭建了一个公平、透明、稳定、高效的网络互动平台。</div>
		<div class="bdd">
			<div class="user_inc_top">忘记密码</div>
			<div class="inc_main clearfix">
				<div class="user-lr-box-left f_l" style="width:590px">
					<div class="user_inc_tip mb15 pb15">用户可以在网站上获得企业信用评级、发布借款请求满足企业的资金需要。</div>
									<!--注册表单-->
									<form action="" method="post" id="signup-user-form">

									<div class="field mobile pr">
										<label for="signup-mobile"><span class="f_red">*</span>您的用户名</label>
										<input type="text" value="" class="f-input ipttxt" id="username" name="username" size="30">
										<span class="f-input-tip"></span> 
										<span class="hint"> 请输入您的用户名，系统会立即给您注册时所用邮箱发送密码信息。</span>
									</div>
																	
									<div class="blank"></div>
									
									<div class="act">
										<input type="submit" class="submit-btn" id="submit" name="submit" value="获取验证码">				
									</div>
								</form>
                    &nbsp;
            <?php
				if($send_status==1)
				{
					echo '<center><label style="color:#390"><h2>'.$send_result.'</h2></label></center>';
				}
				else
					echo '<center><label style="color:#C00"><h2>'.$send_result.' '.$password_sql.'</h2></label></center>';			
			?>	    
					</div>
					<div class="user-lr-box-right f_r">
						<div class="blank10"></div>
                        <div class="has_account f_dgray tc dot pb15 f12">企业尚未接入？<a href="org_register.php">上传企业信息</a></div>
						<div class="has_account f_dgray tc dot pb15 f12">企业已经接入？<a href="user_register.php">直接注册新个人用户</a></div>
                        <div class="app_login_box">
						<div class="blank10"></div>
                        <div class="has_account f_dgray tc dot pb15 f12">获取企业唯一验证码？<a href="confirm_email.php">获取企业验证码</a></div>
						<div class="app_login_box">
						<div class="blank10"></div>
						<div class="has_account f_dgray tc dot pb15 f12">用户已注册？<a href="login.php">直接登陆</a></div>						</div>
					</div>
				</div>		
				<div class="inc_foot"></div>
			</div>
		</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#signup-submit").click(function(){
		if($.trim($("#signup-email-address").val()).length == 0)
		{
			$("#signup-email-address").focus();
			$.showErr("Email不能为空");
			
			return false;
		}
		
		if(!$.checkEmail($("#signup-email-address").val()))
		{
			$("#signup-email-address").focus();			
			$.showErr("Email格式错误，请重新输入");
			return false;
		}
		
		if(!$.minLength($("#signup-username").val(),3,true))
		{
			$("#signup-username").focus();
			$.showErr("帐号格式错误，请重新输入");		
			return false;
		}
		
		if(!$.maxLength($("#signup-username").val(),16,true))
		{
			$("#signup-username").focus();
			$.showErr("帐号格式错误，请重新输入");			
			return false;
		}
		
		if(!$.minLength($("#signup-password").val(),4,false))
		{
			$("#signup-password").focus();
			$.showErr("密码格式错误，请重新输入");	
			return false;
		}
		
		if($("#signup-password-confirm").val() != $("#signup-password").val())
		{
			$("#signup-password-confirm").focus();
			$.showErr("密码确认失败");			
			return false;
		}
		if(!$.checkMobilePhone($("#settings-mobile").val()))
		{
			$("#settings-mobile").focus();			
			$.showErr("手机号码格式错误，请重新输入");	
			return false;
		}	
					if($.trim($("#settings-mobile").val()).length == 0)
			{
				$("#settings-mobile").focus();
				$.showErr("手机号码不能为空");
				
				return false;
			}
				
							
		
	});
	
	
	//开始绑定 
	$("#signup-email-address").bind("blur",function(){
		if($.trim($("#signup-email-address").val()).length == 0)
		{
			formError($("#signup-email-address"),"Email不能为空");			
			return false;
		}
		
		if(!$.checkEmail($("#signup-email-address").val()))
		{
			formError($("#signup-email-address"),"Email格式错误，请重新输入");
			return false;
		}	
		
		var ajaxurl = APP_ROOT+"/index.php?ctl=ajax&act=check_field";
		var query = new Object();
		query.field_name = "email";
		query.field_data = $.trim($(this).val());
		$.ajax({ 
			url: ajaxurl,
			data:query,
			type: "POST",
			dataType: "json",
			success: function(data){
				if(data.status==1)
				{
					formSuccess($("#signup-email-address"),"可以使用");
					return false;
				}
				else
				{
					formError($("#signup-email-address"),data.info);
					return false;
				}
			}
		});	
	}); //邮箱验证
	
	
	
	$("#signup-username").bind("blur",function(){
		if(!$.minLength($("#signup-username").val(),3,true))
		{
			formError($("#signup-username"),"帐号格式错误，请重新输入");		
			return false;
		}
		
		if(!$.maxLength($("#signup-username").val(),16,true))
		{
			formError($("#signup-username"),"帐号格式错误，请重新输入");			
			return false;
		}	
		
		var ajaxurl = APP_ROOT+"/index.php?ctl=ajax&act=check_field";
		var query = new Object();
		query.field_name = "user_name";
		query.field_data = $.trim($(this).val());
		$.ajax({ 
			url: ajaxurl,
			data:query,
			type: "POST",
			dataType: "json",
			success: function(data){
				if(data.status==1)
				{
					formSuccess($("#signup-username"),"可以使用");
					return false;
				}
				else
				{
					formError($("#signup-username"),data.info);
					return false;
				}
			}
		});	
	}); //用户名验证
	
	
	$("#signup-password").bind("blur",function(){
		if(!$.minLength($("#signup-password").val(),4,false))
		{
			formError($("#signup-password"),"密码格式错误，请重新输入");	
			return false;
		}
		formSuccess($("#signup-password"),"可以使用");
	}); //密码验证
	
	$("#signup-password-confirm").bind("blur",function(){
		if($("#signup-password-confirm").val() != $("#signup-password").val())
		{
			formError($("#signup-password-confirm"),"密码确认失败");			
			return false;
		}
		formSuccess($("#signup-password-confirm"),"验证正确");
	}); //确认密码验证
	
	$("#settings-mobile").bind("blur",function(){
		if(!$.checkMobilePhone($("#settings-mobile").val()))
		{
			formError($("#settings-mobile"),"手机号码格式错误，请重新输入");	
			return false;
		}	
					if($.trim($("#settings-mobile").val()).length == 0)
			{				
				formError($("#settings-mobile"),"手机号码不能为空");
				return false;
			}
				
		var ajaxurl = APP_ROOT+"/index.php?ctl=ajax&act=check_field";
		var query = new Object();
		query.field_name = "mobile";
		query.field_data = $.trim($(this).val());
		$.ajax({ 
			url: ajaxurl,
			data:query,
			type: "POST",
			dataType: "json",
			success: function(data){
				if(data.status==1)
				{
					if(query.field_data!='')
					formSuccess($("#settings-mobile"),"可以使用");
					else
					formSuccess($("#settings-mobile"),"");
					return false;
				}
				else
				{					
					formError($("#settings-mobile"),data.info);
					return false;
				}
			}
		});	
	}); //手机验证
	
	
	
					});
</script>
</div>
<div class="blank"></div>
	<div class="wrap clearfix">
	 	<div class="copyright clearfix tc" style="padding:8px ;background:#f7f7f7; color:#757575">
			<div style="text-align:center;">联系我们：customer-support@china-bxc.com &nbsp; 南京秉信成第三方服务公司</div>
<div style="text-align:center;">(c) 2014 秉信成 All rights reserved</div> 
        </div>
	</div>
</body>
</html>