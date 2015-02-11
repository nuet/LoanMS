<?php
include("config.php");
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['submit']!="")
{
// username and password sent from form 

$username=mysql_real_escape_string($_POST['username']); 
$password=mysql_real_escape_string($_POST['password']); 

$user_sql="SELECT * FROM users WHERE username='$username' and password='$password'";
$user_result=mysql_query($user_sql);
$user_row=mysql_fetch_array($user_result);

$count_user=mysql_num_rows($user_result);

// If result matched $username and $password, table row must be 1 row
if($count_user==1)
{
	$login_status=0;
	$_SESSION['login_user']=$username;
	if($user_row['groupID']==1)
		header("location: member/user_profile.php");
	else if($user_row['groupID']==2)
		header("location: bank_member/user_profile.php");
	else
	    header("location: insurance_member/user_profile.php");
}
else 
{
	$login_status=1;
	$login_error="对不起，您的用户名或密码不匹配。请重试。";
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="Generator">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">

<title>秉信成第三方金融服务公司首页</title>

<meta name="keywords" content="秉信成">
<meta name="description" content="p2p信贷—最大、最安全的网络借贷平台">
<link rel="stylesheet" type="text/css" href="./css/2478b39b4fd11430e5bc078c9c4b5bdf.css">
<script type="text/javascript">
var APP_ROOT = '';;
var LOADER_IMG = './img/lazy_loading.gif';
var ERROR_IMG = './img/image_err.gif';
var send_span = 2000;
</script>
<script type="text/javascript" src="./js/lang.js"></script>
<script type="text/javascript" src="./js/jquery.min.js"></script>

</head>
<body>
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
	
<div class="wrap">
 <style>
	#login{height:265px;width:280px;font-family:"Microsoft Yahei";color:#ffffff;background: -webkit-gradient(linear, 0% 0%, 0% 100%,from(#57c6f9), to(#28a7e1));}
	#login p{line-height:40px;padding:0px 10px;}
	#login h3{line-height:60px;color:#ffffff;font-size:22px;text-align:center;}
	#login p input{height:25px;width:160px;}
	#login p select{height:25px;width:180px;}
	#login .oper{width:100%;margin-top:20px;text-align:center;}
	#login .oper input{display:inline-block;width:100px;height:30px;line-height:30px;text-align:center;color:#c00000;background:#ffffff;border:none;border-radius:5px;}
 </style>
<link rel="stylesheet" type="text/css" href="./css/f98b4cbc275abb1099c85d24b252e306.css">
<div class="blank"></div>
<div id="login" class="f_l" >
<h3>秉信成专业贷款搜索平台</h3>
<div class="form">
<form method="post" action="" name="login">
	<p><label>用户账号</label>
		<input type="text" name="username" id="username" placeholder="请输入用户账号"/>
	</p>
	<p>
		<label>用户密码</label>
		<input type="password" name="password" id="password" placeholder="请输入用户密码"/>
		
	</p>
	<div class="oper">
		<input type="submit" name="submit" id="submit" value="登录平台"/> <a href="forget_password.php">忘记密码?</a>
	</div>
    &nbsp;
            <?php
				if($login_status==1)
					echo '<center><label style="color:#C00"><h2>'.$login_error.'</h2></label></center>';		
			?>	
</form>
</div>
</div>
<div id="main_adv_box" style="width:680px;" class="main_adv_box f_r">
		<div id="main_adv_img" class="main_adv_img">
			<span rel="1" style="display: none;"><img src="./img/a4500ac2-9dc5-434e-a164-9b0c0b5239f1_03.png" alt="" border="0"><br>
</span>
			<span rel="2" style="display: none;"><img src="./img/54d781008c248.jpg" alt="" border="0"><br></span>
			<span rel="3" style="display: inline;"><img src="./img/537ea0b7eabc2.jpg" alt="" border="0"><br></span>
			<span rel="4" style="display: none;"></span>	
			<span rel="5" style="display: none;"></span>					
		</div>
		<div id="main_adv_ctl" class="main_adv_ctl">
			<ul style="width: 105px;">
				<li rel="1" class="" style="display: block;">1</li>
				<li rel="2" style="display: block;" class="">2</li>
				<li rel="3" style="display: block;" class="act">3</li>
				<li rel="4" style="display: none;" class="">4</li>
				<li rel="5" style="display: none;" class="">5</li>
			</ul>
		</div>
		<script type="text/javascript" src="./js/index_adv.js"></script>
</div>
<div class="blank10"></div>
<style>
	.header{height:auto;}
	.pos{position:absolute;width:100%;z-index:999999;}
	.main_snav{width:960px;margin:0 auto;border:none;height:auto;}
	.main_snav ul{float:none;width:auto;width:200px;border:1px solid #dcdcdc;padding:10px;background:#dcdcdc url(about:blank);}
	.main_snav a{float:none;display:inline-block;width:80px;}
	a{text-decoration:none;}
	a:hover{text-decoration:none;}
	.wrap{width:962px;}
	.index_left{width:664px;}
	.prom_deal{border:1px solid #dcdcdc;}
	.prom_deal_list{font-family:"Microsoft Yahei";display:none;}
	.prom_deal_list li{padding:10px;float:left;width:290px;}
	.prom_deal_list .img{width:80px;float:left;margin:0px 5px}
	.prom_deal_list img{width:80px;border-radius:5px;}
	.prom_deal_list h2{font-size:14px;}
	.prom_deal_list .content{width:165px;float:left;}
	.prom_deal_list p.more a{padding:2px 0px;width:50px;margin:5px 0px;text-align:center;display:block;border:1px solid #dcdcdc;border-radius:5px;}
	.prom_deal_cat{height:35px;font-size:16px;font-family:"Microsoft Yahei";}
	.prom_deal_cat li{float:left;width:159px;border-bottom:1px solid #dee2e1;background:#aabc64;line-height:31px;text-align:center;border-right:1px solid #dcdcdc;border-left:none;}
	.prom_deal_cat li.hover{border-top:2px solid #ffc400;border-bottom:none;background:#ffffff;}
	.prom_deal_cat li.hover a{color:#000}
	.prom_deal_cat li a{color:#fff;}
	.deal_cat{height:35px;font-size:16px;font-family:"Microsoft Yahei";}
	.deal_cat li{float:left;width:165px;border-top:2px solid #dee2e1;border-bottom:2px solid #dee2e1;background:#f5f5f5;line-height:31px;text-align:center;border-right:1px solid #dcdcdc;border-left:none;}
	.deal_cat li.hover{border-top:2px solid #b39491;border-bottom:none;background:#ffffff;}
	
	.deal_cat li a{color:#000000;}
	.deal_list{font-family:"Microsoft Yahei";font-size:12px;display:none;}
	.deal_list td{padding:10px 10px;}
	.deal_list font{color:#c00000;}
	.deal_list a{color:#000000;text-decoration:none;}
	.deal_list .img{padding:0px 10px;}
	.deal_list a.more{border:1px solid #dcdcdc;border-radius:5px;padding:5px 30px;}
	.hot_calc li{line-height:25px;height:25px;padding:5px 1%;width:48%;float:left;}
	.hot_calc li img{height:25px;vertical-align:middle;margin:0px 5px;}
	.clear{clear:both;}
</style>
<script type="text/javascript">
	$(function(){
		$(".main_nav li").each(function(index,element){
			var timer = setTimeout(function(){
					$(".main_snav ul").hide()
			},500);;
			$(this).mouseover(function(){
				$(".main_nav li").removeClass("current").eq(index).addClass("current");
				$(".main_snav ul").hide().eq(index).show();
				clearTimeout(timer);
				
			}).mouseout(function(){
				timer = setTimeout(function(){
					$(".main_snav ul").hide()
				},500);
			});
			$(".pos").mouseover(function(){
				clearTimeout(timer);
			});
			$(".main_snav ul").mouseleave(function(){
				$(this).hide();
			});
		});
		$(".prom_deal_cat li").each(function(index,element){
			$(this).mouseover(function(){
				$(".prom_deal_cat li").removeClass("hover").eq(index).addClass("hover");
				$(".prom_deal_list").hide().eq(index).show();
			});
		});
		$(".deal_cat li").each(function(index,element){
			$(this).mouseover(function(){
				$(".deal_cat li").removeClass("hover").eq(index).addClass("hover");
				$(".deal_list").hide().eq(index).show();
			});
		});
	});
</script>
<div class="prom_deal">
	<div class="prom_deal_cat">
		<ul>
			<li  class="hover"><a href="javascript:void(0);">经营贷款专区</a></li>
			<li class=""><a href="javascript:void(0);">经营贷款专区</a></li>
			<li class=""><a href="javascript:void(0);">经营贷款专区</a></li>
			<li class=""><a href="javascript:void(0);">经营贷款专区</a></li>
			<li class=""><a href="javascript:void(0);">经营贷款专区</a></li>
			<li><a href="javascript:void(0);">经营贷款专区</a></li>
			<div style="clear:both;"></div>
		</ul>
	</div>
	<div class="prom_deal_list" style="display: block;">
		<ul>
			<li>
				<div class="img"><a href=""><img src="./img/dqzz.png"></a></div>
				<div class="content">
					<h2><a href="">渣打银行-现贷派11</a></h2>
					<p>额度：<font>0.8--50万</font> 2天放款</p>
					<p>费用：月利率1.65%</p>
					<p class="desc">说明：无抵押无担保，放款快速，灵活额度</p>
					<p class="more">
						<a href="">查看</a>
					</p><p>	
				</p></div>
				<div style="clear:both;"></div>
			</li>
			<li>
				<div class="img"><a href=""><img src="./img/dqzz.png"></a></div>
				<div class="content">
					<h2><a href="">渣打银行-现贷派22</a></h2>
					<p>额度：<font>0.8--50万</font> 2天放款</p>
					<p>费用：月利率1.65%</p>
					<p class="desc">说明：无抵押无担保，放款快速，灵活额度</p>
					<p class="more">
						<a href="">查看</a>
					</p><p>	
				</p></div>
				<div style="clear:both;"></div>
			</li>
			<li>
				<div class="img"><a href=""><img src="./img/dqzz.png"></a></div>
				<div class="content">
					<h2><a href="">渣打银行-现贷派33</a></h2>
					<p>额度：<font>0.8--50万</font> 2天放款</p>
					<p>费用：月利率1.65%</p>
					<p class="desc">说明：无抵押无担保，放款快速，灵活额度</p>
					<p class="more">
						<a href="">查看</a>
					</p><p>	
				</p></div>
				<div style="clear:both;"></div>
			</li>
			<div class="clear"></div>
		</ul>
	</div>
	<div class="prom_deal_list" style="display: none;">
		<ul>
			<li>
				<div class="img"><a href=""><img src="./img/dqzz.png"></a></div>
				<div class="content">
					<h2><a href="">渣打银行-现贷派22</a></h2>
					<p>额度：<font>0.8--50万</font> 2天放款</p>
					<p>费用：月利率1.65%</p>
					<p class="desc">说明：无抵押无担保，放款快速，灵活额度</p>
					<p class="more">
						<a href="">查看</a>
					</p><p>	
				</p></div>
				<div style="clear:both;"></div>
			</li>
			<li>
				<div class="img"><a href=""><img src="./img/dqzz.png"></a></div>
				<div class="content">
					<h2><a href="">渣打银行-现贷派22</a></h2>
					<p>额度：<font>0.8--50万</font> 2天放款</p>
					<p>费用：月利率1.65%</p>
					<p class="desc">说明：无抵押无担保，放款快速，灵活额度</p>
					<p class="more">
						<a href="">查看</a>
					</p><p>	
				</p></div>
				<div style="clear:both;"></div>
			</li>
			<li>
				<div class="img"><a href=""><img src="./img/dqzz.png"></a></div>
				<div class="content">
					<h2><a href="">渣打银行-现贷派33</a></h2>
					<p>额度：<font>0.8--50万</font> 2天放款</p>
					<p>费用：月利率1.65%</p>
					<p class="desc">说明：无抵押无担保，放款快速，灵活额度</p>
					<p class="more">
						<a href="">查看</a>
					</p><p>	
				</p></div>
				<div style="clear:both;"></div>
			</li>
			<div class="clear"></div>
		</ul>
	</div>
	<div class="prom_deal_list" style="display: none;">
		<ul>
			<li>
				<div class="img"><a href=""><img src="./img/dqzz.png"></a></div>
				<div class="content">
					<h2><a href="">渣打银行-现贷派33</a></h2>
					<p>额度：<font>0.8--50万</font> 2天放款</p>
					<p>费用：月利率1.65%</p>
					<p class="desc">说明：无抵押无担保，放款快速，灵活额度</p>
					<p class="more">
						<a href="">查看</a>
					</p><p>	
				</p></div>
				<div style="clear:both;"></div>
			</li>
			<li>
				<div class="img"><a href=""><img src="./img/dqzz.png"></a></div>
				<div class="content">
					<h2><a href="">渣打银行-现贷派22</a></h2>
					<p>额度：<font>0.8--50万</font> 2天放款</p>
					<p>费用：月利率1.65%</p>
					<p class="desc">说明：无抵押无担保，放款快速，灵活额度</p>
					<p class="more">
						<a href="">查看</a>
					</p><p>	
				</p></div>
				<div style="clear:both;"></div>
			</li>
			<li>
				<div class="img"><a href=""><img src="./img/dqzz.png"></a></div>
				<div class="content">
					<h2><a href="">渣打银行-现贷派33</a></h2>
					<p>额度：<font>0.8--50万</font> 2天放款</p>
					<p>费用：月利率1.65%</p>
					<p class="desc">说明：无抵押无担保，放款快速，灵活额度</p>
					<p class="more">
						<a href="">查看</a>
					</p><p>	
				</p></div>
				<div style="clear:both;"></div>
			</li>
			<div class="clear"></div>
		</ul>
	</div>
	<div class="prom_deal_list" style="display: none;">
		<ul>
			<li>
				<div class="img"><a href=""><img src="./img/dqzz.png"></a></div>
				<div class="content">
					<h2><a href="">渣打银行-现贷派33</a></h2>
					<p>额度：<font>0.8--50万</font> 2天放款</p>
					<p>费用：月利率1.65%</p>
					<p class="desc">说明：无抵押无担保，放款快速，灵活额度</p>
					<p class="more">
						<a href="">查看</a>
					</p><p>	
				</p></div>
				<div style="clear:both;"></div>
			</li>
			<li>
				<div class="img"><a href=""><img src="./img/dqzz.png"></a></div>
				<div class="content">
					<h2><a href="">渣打银行-现贷派22</a></h2>
					<p>额度：<font>0.8--50万</font> 2天放款</p>
					<p>费用：月利率1.65%</p>
					<p class="desc">说明：无抵押无担保，放款快速，灵活额度</p>
					<p class="more">
						<a href="">查看</a>
					</p><p>	
				</p></div>
				<div style="clear:both;"></div>
			</li>
			<li>
				<div class="img"><a href=""><img src="./img/dqzz.png"></a></div>
				<div class="content">
					<h2><a href="">渣打银行-现贷派33</a></h2>
					<p>额度：<font>0.8--50万</font> 2天放款</p>
					<p>费用：月利率1.65%</p>
					<p class="desc">说明：无抵押无担保，放款快速，灵活额度</p>
					<p class="more">
						<a href="">查看</a>
					</p><p>	
				</p></div>
				<div style="clear:both;"></div>
			</li>
			<div class="clear"></div>
		</ul>
	</div>
	<div class="prom_deal_list" style="display: none;">
		<ul>
			<li>
				<div class="img"><a href=""><img src="./img/dqzz.png"></a></div>
				<div class="content">
					<h2><a href="">渣打银行-现贷派33</a></h2>
					<p>额度：<font>0.8--50万</font> 2天放款</p>
					<p>费用：月利率1.65%</p>
					<p class="desc">说明：无抵押无担保，放款快速，灵活额度</p>
					<p class="more">
						<a href="">查看</a>
					</p><p>	
				</p></div>
				<div style="clear:both;"></div>
			</li>
			<li>
				<div class="img"><a href=""><img src="./img/dqzz.png"></a></div>
				<div class="content">
					<h2><a href="">渣打银行-现贷派22</a></h2>
					<p>额度：<font>0.8--50万</font> 2天放款</p>
					<p>费用：月利率1.65%</p>
					<p class="desc">说明：无抵押无担保，放款快速，灵活额度</p>
					<p class="more">
						<a href="">查看</a>
					</p><p>	
				</p></div>
				<div style="clear:both;"></div>
			</li>
			<li>
				<div class="img"><a href=""><img src="./img/dqzz.png"></a></div>
				<div class="content">
					<h2><a href="">渣打银行-现贷派33</a></h2>
					<p>额度：<font>0.8--50万</font> 2天放款</p>
					<p>费用：月利率1.65%</p>
					<p class="desc">说明：无抵押无担保，放款快速，灵活额度</p>
					<p class="more">
						<a href="">查看</a>
					</p><p>	
				</p></div>
				<div style="clear:both;"></div>
			</li>
			<div class="clear"></div>
		</ul>
	</div>
	<div class="prom_deal_list" style="display: none;">
		<ul>
			<li>
				<div class="img"><a href=""><img src="./img/dqzz.png"></a></div>
				<div class="content">
					<h2><a href="">渣打银行-现贷派33</a></h2>
					<p>额度：<font>0.8--50万</font> 2天放款</p>
					<p>费用：月利率1.65%</p>
					<p class="desc">说明：无抵押无担保，放款快速，灵活额度</p>
					<p class="more">
						<a href="">查看</a>
					</p><p>	
				</p></div>
				<div style="clear:both;"></div>
			</li>
			<li>
				<div class="img"><a href=""><img src="./img/dqzz.png"></a></div>
				<div class="content">
					<h2><a href="">渣打银行-现贷派22</a></h2>
					<p>额度：<font>0.8--50万</font> 2天放款</p>
					<p>费用：月利率1.65%</p>
					<p class="desc">说明：无抵押无担保，放款快速，灵活额度</p>
					<p class="more">
						<a href="">查看</a>
					</p><p>	
				</p></div>
				<div style="clear:both;"></div>
			</li>
			<li>
				<div class="img"><a href=""><img src="./img/dqzz.png"></a></div>
				<div class="content">
					<h2><a href="">渣打银行-现贷派33</a></h2>
					<p>额度：<font>0.8--50万</font> 2天放款</p>
					<p>费用：月利率1.65%</p>
					<p class="desc">说明：无抵押无担保，放款快速，灵活额度</p>
					<p class="more">
						<a href="">查看</a>
					</p><p>	
				</p></div>
				<div style="clear:both;"></div>
			</li>
			<div class="clear"></div>
		</ul>
	</div>
</div>
<div class="blank"></div>
<div class="index_left f_l">
	<div class="deal_cat clearfix">
		<ul>
			<li class="hover"><a href="javascript:void(0);">经营贷款</a></li>
			<li class=""><a href="javascript:void(0);">抵押贷款</a></li>
			<li class=""><a href="javascript:void(0);">短期周转贷款</a></li>
			<li class=""><a href="javascript:void(0);">贷款保险</a></li>
		</ul>
	</div>
	
	<div class="deal_list" style="display: block;">
		<table>
						<tbody><tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=14"><img width="40" src="./img/5433d92de0e05.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=14">平安银行-新一代（上班族专享）11</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=14">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=10"><img width="40" src="./img/hlcb.png"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=10">平安银行-新一代（上班族专享）11</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=10">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=12"><img width="40" src="./img/537ebd0d0d2c0.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=12">平安银行-新一代（上班族专享）11</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=12">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=13"><img width="40" src="./img/5419460013ac0.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=13">平安银行-新一代（上班族专享）11</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=13">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=9"><img width="40" src="./img/42virtual_avatar_big.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=9">平安银行-新一代（上班族专享）11</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=9">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=1"><img width="40" src="./img/dqzz.png"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=1">平安银行-新一代（上班族专享）11</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=1">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=11"><img width="40" src="./img/537ea2f3b7942.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=11">平安银行-新一代（上班族专享）11</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=11">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=8"><img width="40" src="./img/53b50b4103974.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=8">平安银行-新一代（上班族专享）11</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=8">查看</a>
			</td></tr>
					</tbody></table>
	</div>
	<div class="deal_list" style="display: none;">
		<table>
						<tbody><tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=14"><img width="40" src="./img/5433d92de0e05.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=14">平安银行-新一代（上班族专享）22</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=14">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=10"><img width="40" src="./img/hlcb.png"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=10">平安银行-新一代（上班族专享）22</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=10">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=12"><img width="40" src="./img/537ebd0d0d2c0.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=12">平安银行-新一代（上班族专享）22</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=12">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=13"><img width="40" src="./img/5419460013ac0.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=13">平安银行-新一代（上班族专享）22</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=13">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=9"><img width="40" src="./img/42virtual_avatar_big.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=9">平安银行-新一代（上班族专享）22</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=9">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=1"><img width="40" src="./img/dqzz.png"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=1">平安银行-新一代（上班族专享）22</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=1">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=11"><img width="40" src="./img/537ea2f3b7942.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=11">平安银行-新一代（上班族专享）22</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=11">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=8"><img width="40" src="./img/53b50b4103974.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=8">平安银行-新一代（上班族专享）22</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=8">查看</a>
			</td></tr>
					</tbody></table>
	</div>
	<div class="deal_list" style="display: none;">
		<table>
						<tbody><tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=14"><img width="40" src="./img/5433d92de0e05.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=14">平安银行-新一代（上班族专享）33</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=14">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=10"><img width="40" src="./img/hlcb.png"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=10">平安银行-新一代（上班族专享）33</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=10">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=12"><img width="40" src="./img/537ebd0d0d2c0.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=12">平安银行-新一代（上班族专享）33</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=12">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=13"><img width="40" src="./img/5419460013ac0.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=13">平安银行-新一代（上班族专享）33</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=13">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=9"><img width="40" src="./img/42virtual_avatar_big.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=9">平安银行-新一代（上班族专享）33</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=9">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=1"><img width="40" src="./img/dqzz.png"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=1">平安银行-新一代（上班族专享）33</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=1">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=11"><img width="40" src="./img/537ea2f3b7942.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=11">平安银行-新一代（上班族专享）33</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=11">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=8"><img width="40" src="./img/53b50b4103974.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=8">平安银行-新一代（上班族专享）33</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=8">查看</a>
			</td></tr>
					</tbody></table>
	</div>
	<div class="deal_list" style="display: none;">
		<table>
						<tbody><tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=14"><img width="40" src="./img/5433d92de0e05.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=14">平安银行-新一代（上班族专享）44</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=14">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=10"><img width="40" src="./img/hlcb.png"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=10">平安银行-新一代（上班族专享）44</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=10">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=12"><img width="40" src="./img/537ebd0d0d2c0.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=12">平安银行-新一代（上班族专享）44</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=12">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=13"><img width="40" src="./img/5419460013ac0.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=13">平安银行-新一代（上班族专享）44</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=13">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=9"><img width="40" src="./img/42virtual_avatar_big.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=9">平安银行-新一代（上班族专享）44</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=9">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=1"><img width="40" src="./img/dqzz.png"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=1">平安银行-新一代（上班族专享）44</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=1">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=11"><img width="40" src="./img/537ea2f3b7942.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=11">平安银行-新一代（上班族专享）44</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=11">查看</a>
			</td></tr>
						<tr>
				<td><div class="img"><a href="./index.php?ctl=deal&id=8"><img width="40" src="./img/53b50b4103974.jpg"></a></div></td>
				<td width="150"><a href="./index.php?ctl=deal&id=8">平安银行-新一代（上班族专享）44</a></td>
				<td width="240">信用良好的在职员工均可申请，<font>条件宽松，放款速度快</font></td>
				<td><a class="more" href="./index.php?ctl=deal&id=8">查看</a>
			</td></tr>
					</tbody></table>
	</div>
</div>
<div class="index_right f_r">
	
	<div class="r-block">
		<div class="gray_title clearfix">
			<div class="f_l f_dgray b">网站公告</div>
			<div class="f_r">
            	<div style="vertical-align: middle;_padding: 8px 0;">
	                <span style="font-weight: normal;">
	                    <a href="./index.php?ctl=notice&act=list_notice"> 更多</a>
	                </span>
	                <span><img src="./img/more.gif" align="absmiddle" alt="更多" style="" title="更多"></span>
	            </div>
        	</div>
		</div>
		<div class="notice-list clearfix">
			<ul>
				                <li style="padding:2px 0;">
                    <span>
					<a href="./index.php?ctl=notice&id=71">测试公告6</a>
					</span>
                </li>
				                <li style="padding:2px 0;">
                    <span>
					<a href="./index.php?ctl=notice&id=70">测试公告5</a>
					</span>
                </li>
				                <li style="padding:2px 0;">
                    <span>
					<a href="./index.php?ctl=notice&id=69">测试公告3</a>
					</span>
                </li>
				                <li style="padding:2px 0;">
                    <span>
					<a href="./index.php?ctl=notice&id=68">测试公告3</a>
					</span>
                </li>
				                <li style="padding:2px 0;">
                    <span>
					<a href="./index.php?ctl=notice&id=67">测试公告2</a>
					</span>
                </li>
					        </ul>
		</div>
	</div>
	<div class="blank10"></div>
	<div class="clearfix pr r-block  hot_calc">
	<div class="gray_title clearfix">
		
			<div class="f_l f_dgray b">热门计算器</div>
			<div class="f_r">
            	<div style="vertical-align: middle;_padding: 8px 0;">
	                <span style="font-weight: normal;">
	                    <a href="./index.php?ctl=notice&act=list_notice"> 更多</a>
	                </span>
	                <span><img src="./img/more.gif" align="absmiddle" alt="更多" style="" title="更多"></span>
	            </div>
        	</div>
			<div class="clear"></div>
	</div>		
		<ul>
			<li><a href="javascript:void(0);"><img src="./img/01.jpg"></a>
				贷款利率计算器
			</li>
			<li><a href="javascript:void(0);"><img src="./img/02.jpg"></a>
				贷款利率计算器
			</li>
			<li><a href="javascript:void(0);"><img src="./img/03.jpg"></a>
				贷款利率计算器
			</li>
			<li><a href="javascript:void(0);"><img src="./img/04.jpg"></a>
				贷款利率计算器
			</li>
			<li><a href="javascript:void(0);"><img src="./img/05.jpg"></a>
				贷款利率计算器
			</li>
			<li><a href="javascript:void(0);"><img src="./img/06.jpg"></a>
				贷款利率计算器
			</li>
			<li><a href="javascript:void(0);"><img src="./img/07.jpg"></a>
				贷款利率计算器
			</li>
			<li><a href="javascript:void(0);"><img src="./img/08.jpg"></a>
				贷款利率计算器
			</li>
			<div class="clear"></div>
		</ul>
	</div>
	<div class="blank10"></div>
		
	<div class="blank10"></div>
	<div class="r-block">
		<div class="gray_title clearfix">
			<div class="f_l f_dgray b">使用技巧</div>
			<div class="f_r">
	        	<div style="vertical-align: middle;_padding: 8px 0;">
	                <span style="font-weight: normal;">
	                    <a href="./index.php?ctl=usagetip"> 更多</a>
	                </span>
	                <span><img src="./img/more.gif" align="absmiddle" alt="更多" style="" title="更多"></span>
	            </div>
	    	</div>
		</div>
		<div class="clearfix" style="padding:5px 15px; height:144px">
			<ul>
			            	<li class="f_l" style="width: 120px; padding: 2px;">
				 · <a href="./index.php?ctl=usagetip&id=26">信用等级的解读</a>
				</li>
			            	<li class="f_l" style="width: 120px; padding: 2px;">
				 · <a href="./index.php?ctl=usagetip&id=25">风险与收益</a>
				</li>
			            	<li class="f_l" style="width: 120px; padding: 2px;">
				 · <a href="./index.php?ctl=usagetip&id=24">分散投资降低风险</a>
				</li>
			            	<li class="f_l" style="width: 120px; padding: 2px;">
				 · <a href="./index.php?ctl=usagetip&id=23">新手上路</a>
				</li>
			            	<li class="f_l" style="width: 120px; padding: 2px;">
				 · <a href="./index.php?ctl=usagetip&id=22">无抵押贷款骗局</a>
				</li>
			            	<li class="f_l" style="width: 120px; padding: 2px;">
				 · <a href="./index.php?ctl=usagetip&id=21">投资策略</a>
				</li>
			            	<li class="f_l" style="width: 120px; padding: 2px;">
				 · <a href="./index.php?ctl=usagetip&id=20">借入者注意事项</a>
				</li>
			            	<li class="f_l" style="width: 120px; padding: 2px;">
				 · <a href="./index.php?ctl=usagetip&id=19">如何判断借款列表</a>
				</li>
			            	<li class="f_l" style="width: 120px; padding: 2px;">
				 · <a href="./index.php?ctl=usagetip&id=18">提高借款成功率</a>
				</li>
			            	<li class="f_l" style="width: 120px; padding: 2px;">
				 · <a href="./index.php?ctl=usagetip&id=17">其他借出技巧</a>
				</li>
			            	<li class="f_l" style="width: 120px; padding: 2px;">
				 · <a href="./index.php?ctl=usagetip&id=16">借款失败原因</a>
				</li>
			            	<li class="f_l" style="width: 120px; padding: 2px;">
				 · <a href="./index.php?ctl=usagetip&id=15">选择借款列表</a>
				</li>
			       		</ul>
		</div>
	</div>
</div>
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
																					<li><a href="./index.php?ctl=help&id=8">常见问题</a></li>
																												<li><a href="./index.php?ctl=aboutp2p" target="_blank">平台原理</a></li>
																												<li><a href="./index.php?ctl=borrow&act=aboutborrow" target="_blank">如何借款</a></li>
																												<li><a href="./index.php?ctl=aboutfee" target="_blank">p2p信贷费率</a></li>
														             
						</ul>
	                </li> 
																				<li class="col hp3">
	                    <h3>关于我们</h3>
	                    <ul class="sub-list">
																					<li><a href="./index.php?ctl=help&id=1">公司简介</a></li>
																												<li><a href="./index.php?ctl=help&id=5">联系我们</a></li>
																												<li><a href="./index.php?ctl=help&id=2">免责条款</a></li>
														             
						</ul>
	                </li> 
																				<li class="col hp4">
	                    <h3>安全保护</h3>
	                    <ul class="sub-list">
																					<li><a href="./index.php?ctl=aboutlaws" target="_blank">政策法规</a></li>
																												<li><a href="./index.php?ctl=help&id=3">隐私保护</a></li>
														             
						</ul>
	                </li> 
																					            </ul>
				<div class="blank"></div>
			</div>
			<div class="footer_line"></div>
			<div class="wrap">
								<div class="flink">
							
					<span style="color:#ccc; float:left; padding:5px 10px 5px 0px;">友情链接</span>
											<a href="http://www.icanpk.com/" target="_blank" title="南京大型门户网站建设">南京大型门户网站建设</a>
											<a href="http://www.liepan.com/" target="_blank" title="华东列盘汽车网">华东列盘汽车网</a>
											<a href="http://www.ataotao.com/" target="_blank" title="22">南京和田玉</a>
											<a href="http://www.ganzei.com/" target="_blank" title="赶贼网-分类信息">赶贼网-分类信息</a>
										<div class="blank1"></div>
								</div>		
				<div class="blank"></div>
					            <div class="copyright">
	            						<div class="tc clearfix">
										<a href="./index.php?ctl=sys&id=39" title="避免私下交易">避免私下交易</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="./index.php?ctl=sys&id=38" title="五大重要守则">五大重要守则</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="./index.php?ctl=sys&id=37" title="完善的贷中贷后管理">完善的贷中贷后管理</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="./index.php?ctl=sys&id=36" title="严格的贷前审核">严格的贷前审核</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="./index.php?ctl=sys&id=35" title="隐私保护">隐私保护</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="./index.php?ctl=sys&id=34" title="账户安全">账户安全</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="./index.php?ctl=sys&id=33" title="本金保障计划">本金保障计划</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="./index.php?ctl=sys&id=clew" title="投资小提示">投资小提示</a>
										</div>
					<div class="blank"></div>
						            						电话：025-84458116 周一至周六 9:00-18:00  
					&nbsp;&nbsp;
									
					&nbsp;&nbsp;
										<div class="blank1"></div>	
					<div style="text-align:center;">联系我们：customer-support@china-bxc.com &nbsp; 南京秉信成第三方服务公司</div>
<div style="text-align:center;">(c) 2014 秉信成 All rights reserved</div> 
					<div class="blank"></div>				
					
	            </div>
        </div>
    </div>
	<div id="gotop" style="display: block;"></div>

</div></body></html>