
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>手机绑定 - 星月慧文金融</title>
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
<script type="text/javascript" src="css/ae18c80063dd21d5707e2fee2458de84.js"></script>

</head>

<body>
<div id="c_header">
	<div class="head_top">
	<div class="wrap">
		<div class="head_left">
		<p>客服电话：025-84458116</p>
		</div>
		<div class="head_right">
		<p><a href="">登录</a><a href="">注册</a></p>
		</div>
		<div class="clear"></div>
	</div>
	</div>
	<div class="head_bottom">
		<div class="wrap">
			<div class="logo">
				<a href=""><img src="images/5433d43e3d768.gif"/></a>
			</div>
			<div class="nav">
				<ul>
					<li  class="downnav"><a href="">公司主页</a>
					<dl>
						<dd><a href="">下拉菜单</a></dd>
						<dd><a href="">下拉菜单</a></dd>
						<dd><a href="">下拉菜单</a></dd>
						<dd><a href="">下拉菜单</a></dd>
					</dl>
					</li>
					
					<li class="downnav"><a href="">贷款设置</a>
					<dl>
						<dd><a href="">下拉菜单</a></dd>
						<dd><a href="">下拉菜单</a></dd>
						<dd><a href="">下拉菜单</a></dd>
						<dd><a href="">下拉菜单</a></dd>
					</dl>
					</li>
					<li class="downnav"><a href="">个人设置</a>
					<dl>
						<dd><a href="">下拉菜单</a></dd>
						<dd><a href="">下拉菜单</a></dd>
						<dd><a href="">下拉菜单</a></dd>
						<dd><a href="">下拉菜单</a></dd>
					</dl>
					</li>
					
					
					
				</ul>
			</div>
			<div class="menu">
				<div class="search">
				<form name="search" action="" method="get">
					<input class="keyword" type="text" name="keyword"/>
					<input class="submit" type="submit" name="submit" value=""/>
				</form>
				</div>
				<div class="menu_con">
					<a href=""><img src="images/menu_01.png"/><br/>信息</a>
					<a href=""><img src="images/menu_02.png"/><br/>资料</a>
					<a href=""><img src="images/menu_03.png"/><br/>求助</a>
					<a href=""><img src="images/menu_04.png"/><br/>退出</a>
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
		<li class="current"><a href="/index.php?ctl=uc_account&act=mobile">手机绑定</a></li>
	</ul>
</div>
<div class="uc_r_bl_box clearfix">
<div class="blank"></div>
<div class="inc wb">
	<div class="inc_main">
		<div class="tip-h clearfix">
			<div class="lh22" style="padding-left:118px;padding-top:50px;">
				                <p>尚未绑定手机号</p>
                <p>若您希望绑定手机号，请输入以下信息：</p>
				            </div>
			<form method="post" name="bind_mobile" id="j_bind_mobile">
			<table width="440" border="0" style="margin:0 auto;">
                <tbody>
                <tr>
                    <td width="50">
                        <div align="left">手机码：</div>
                    </td>
                    <td>
                        <input id="J_Vphone" name="phone" class="f-input">
                    </td>
                    <td height="35" colspan="2" class="f_gray">
                        <input type="button" id="reveiveActiveCode" class="reveiveActiveCode" value="发送手机验证码" onclick="sendPhoneCode(this,'#J_Vphone');">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div align="left"> 验证码：</div>
                    </td>
                    <td>
                        <input name="validateCode" id="validateCode" class="f-input">
                    </td>
                    <td class="f_gray" style="padding-left:10px; width:200px">请输入您获取的手机验证码</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <div style="padding-left:3px">
                            <input type="submit" name="submit" value="提交" class="greenbt2">
                        </div>
                    </td>
                </tr>
            	</tbody>
			</table>
			</form>
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
	<h2>公司信誉分数</h2>
	<img src="images/info_01.jpg"/>
	<img src="images/info_02.jpg"/>
	</div>
	<h2>贷款审批状态</h2>
	<table id="info_dksp_status" style="border-collapse:collapse;">
		<tr><th colspan="3">标题</th></tr>
		<tr>
			<td>名称</td>
			<td>状态</td>
			<td>2015-1-27</td>
		</tr>
		<tr>
			<td>名称</td>
			<td>状态</td>
			<td>2015-1-27</td>
		</tr>
		<tr>
			<td>名称</td>
			<td>状态</td>
			<td>2015-1-27</td>
		</tr>
		<tr>
			<td>名称</td>
			<td>状态</td>
			<td>2015-1-27</td>
		</tr>
	</table>
	<h2>贷款管理状态</h2>
	<table id="info_dkgl_status" style="border-collapse:collapse;">
		<tr><th colspan="3">标题</th></tr>
		<tr>
			<td>名称</td>
			<td>状态</td>
			<td>2015-1-27</td>
		</tr>
		<tr>
			<td>名称</td>
			<td>状态</td>
			<td>2015-1-27</td>
		</tr>
		<tr>
			<td>名称</td>
			<td>状态</td>
			<td>2015-1-27</td>
		</tr>
		<tr>
			<td>名称</td>
			<td>状态</td>
			<td>2015-1-27</td>
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