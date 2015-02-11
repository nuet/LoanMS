
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员登录 - 南京典乐p2p信贷</title>
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
<body class="login_body">
<div class="ui-header" id="header">
  <div class="ui-header-top ">
    <div class="container_12 fn-clear">
      <div class="grid_12 fn-clear">
        <div class="fn-left">
          <a class="ui-nav-item fn-left" href="#" target="_blank"><i class="icon icon-app mr5"></i></a>
        </div>
        <div class="fn-right">
          
            <a class="ui-nav-item reg-link" href="#">快速注册</a>
            <a class="ui-nav-item login-link" href="#">立即登录</a>
          
          
          <a class="ui-nav-item" href="#" target="_blank">帮助</a>
          <a class="ui-nav-item" href="#" target="_blank">论坛</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="top">
  <div class="header"> 
	<div class="logo"><a class="ui-header-logo" href="/"></a><a class="ui-header-slogan" href="/"></a></div>
    <ul>
      <li class="hover n_1" rel="1"><a href="#" class="hh">登陆</a></li>
      <li rel="2"><a href="#" class="hh">产品/服务</a></li>
      <li rel="3"><a href="#" class="hh">合作/支持</a></li>
    </ul>
  </div>
  <div class="pos">
    <div class="pos_con">
      <ul class="n_1" rel="1" style="margin-left:620px;">
        <a href="#">平台原理</a> <a href="#">平台原理</a> <a href="#">平台原理</a> <a href="#">平台原理</a>
      </ul>
      <ul class="n_2" rel="2" style="margin-left:720px;">
        <a href="#">平台原理</a> <a href="#">平台原理</a> <a href="#">平台原理</a> <a href="#">平台原理</a>
      </ul>
      <ul class="n_3" rel="3" style="margin-left:820px;">
        <a href="#">平台原理</a> <a href="#">平台原理</a> <a href="#">平台原理</a> <a href="#">平台原理</a>
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
	
<div class="user_login_bar clearfix">
		<div class="wrap ">
			<div class="blank"></div>
			<div class="blank5"></div>
			<div class="inc f_r">
				<div class="user_inc_top">会员登录<!-- <span>&nbsp;或者 <a href="/index.php?ctl=user&act=register">注册</a></span>	--></div>
				<div class="clearfix">
					<div class="user-lr-box-left f_r">
							<div>
	<!--登录表单-->
	
								<form method="post" action="/index.php?ctl=user&act=dologin" name="page_login_form" id="page_login_form">
								<div class="field email pr">
									<span class="holder_tip ps">Email/帐号</span>
									<input type="text" value="" class="f-input ipttxt" id="login-email-address" name="email" size="30" tabindex="1">
								</div>
								<div class="field password pr">
									<span class="holder_tip ps">密码</span>
									<input type="password" value="" class="f-input ipttxt" id="login-password" name="user_pwd" size="30" tabindex="2">
								</div>	
																<div class="field autologin clearfix" style="font-size:12px;">
									<div  class="f_l"><input type="checkbox" id="autologin" name="auto_login" value="1" tabindex="3">下次自动登录？</div>									
									<div class="lostpassword f_r">
									<a href="/index.php?ctl=user&act=getpassword">忘记密码?</a>
									</div>
								</div>
								<div class="act clearfix" style="margin:0px;padding:0">
									<input type="hidden" name="ajax" value="1">
									<input type="submit" class="login-submit-btn" id="user-login-submit" name="commit" value="登录">
									<span class="to_regsiter f_r"><a href="/index.php?ctl=user&act=register">注册</a></span>
								</div>
							</form>
		<!--登录表单-->	
		
		</div>						<div class="blank10"></div>
						<div class="app_login_box">
						<h3>合作网站账号登录</h3><span id='api_Sina_0'></span>						</div>
					</div>
				</div>
				<div class="inc_foot"></div>
			</div>
		</div>
	</div>
	<div class="blank20"></div>
	<div class="wrap clearfix">
		<center><img src="img/retf_tip.jpg" /></center>
		<div class="blank20"></div>
	 	<div class="copyright clearfix tc" style="padding:8px ;background:#f7f7f7; color:#757575">
			<div style="text-align:center;">联系我们：icanpk@126.com &nbsp; 南京典乐科技</div>
<div style="text-align:center;">(c) 2014 p2p信贷 All rights reserved</div> 
        </div>
	</div>
</body>
</html>