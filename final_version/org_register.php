<?php
include('config.php');
error_reporting(E_ALL ^ E_NOTICE) ;

//Register new user--Organization code is known
if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['submit']!="")
	{
		if($_POST['groupID']!="" and $_POST['orgName']!="" and $_POST['regyear']!="" and $_POST['regmonth']!="" and $_POST['regday']!="" and $_POST['regLocation'] and $_POST['prodLocation'] and $_POST['regCapital']!="" and $_POST['regLicence']!="" and $_POST['regAuthority']!="" and $_POST['contactName']!="" and $_POST['contactPhone']!="" and $_POST['contactEmail']!="")
		{
			$groupID= mysql_real_escape_string($_POST['groupID']);
			$orgName= mysql_real_escape_string($_POST['orgName']);
			$regDate=mysql_real_escape_string($_POST['regyear'])."-".mysql_real_escape_string($_POST['regmonth'])."-".mysql_real_escape_string($_POST['regday']);
			$regLocation= mysql_real_escape_string($_POST['regLocation']);
			$prodLocation=mysql_real_escape_string($_POST['prodLocation']);
			$regCapital=mysql_real_escape_string($_POST['regCapital']);
			$regLicence=mysql_real_escape_string($_POST['regLicence']);
			$regAuthority=mysql_real_escape_string($_POST['regAuthority']);
			$contactName=mysql_real_escape_string($_POST['contactName']);
			$contactEmail=mysql_real_escape_string($_POST['contactEmail']);
			$contactPhone=mysql_real_escape_string($_POST['contactPhone']);
			$orgKey=gen_uuid();
			$appendum=mysql_real_escape_string($_POST['appendum']);
			
			$orgLicence_sql="select * from organization where regLicence=".$regLicence;
			$orgLicence_result=mysql_query($orgLicence_sql);
			$count_Licence=mysql_num_rows($orgLicence_result);
			
			if($count_Licence==0)
			{
				$registerOrg="INSERT INTO organization SET groupID='".$groupID."', orgName='".$orgName."', regTime='".$regDate."', regLocation='".$regLocation."', prodLocation='".$prodLocation."', regCapital='".$regCapital."', regLicence='".$regLicence."', regAuthority='".$regAuthority."', contactName='".$contactName."',contactEmail='".$contactEmail."', contactPhone='".$contactPhone."', appendum='".$appendum."',organizationKey='".$orgKey."';";
				$registerOrg_query = mysql_query($registerOrg);
				if($registerOrg_query)
				{
					$register_status=1;
					$register_result='恭喜您！您的企业资料已经成功上传。请等待我们的工作人员进行审核，通过后您会收到系统通知邮件包含您的企业唯一验证码，请妥善保存，切勿泄露。秉信成不承担信息泄露的责任。您也可通过<a href="confirm_email.php">获取企业接入邮件</a>。';
        		}
        		else
        		{
					$register_status=0;
     		   		$register_result="系统错误，您的企业注册未成功。请您刷新页面重试，给您带来的困扰深感抱歉。";
        		}    	
			}
			else
			{
					$register_status=0;
     		   		$register_result="抱歉，您的企业注册号已经存在。请查实。";
			}
		}
		else
		{
			$register_status=0;
			$register_result="一些*必填项尚未填写，请补充资料，谢谢！";
		}
}

function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>秉信成-新企业接入</title>
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
			<div class="user_inc_top">新企业接入</div>
			<div class="inc_main clearfix">
				<div class="user-lr-box-left f_l" style="width:590px">
					<div class="user_inc_tip mb15 pb15">用户可以在网站上获得企业信用评级、发布借款请求满足企业的资金需要。</div>
									<!--注册表单-->
									<form action="" method="post" id="signup-user-form">
                                    
                    				<div class="field email pr">
										<label for="signup-email-address"><span class="f_red">*</span>企业类型</label>
										<select name="groupID">
                            				<option value="1" selected="selected">公司</option>
											<option value="2">银行业</option>
											<option value="3">保险业</option></p>
                    					</select>
										<span class="f-input-tip"></span> 
										<span class="hint">请选择您的公司类型。</span> 
									</div>
									<div class="field email pr">
										<label for="signup-email-address"><span class="f_red">*</span>企业名称</label>
										<input type="text" value="" class="f-input ipttxt" id="orgName" name="orgName" size="30">
										<span class="f-input-tip"></span> 
										<span class="hint">请输入您的企业全名。</span> 
									</div>
									<div class="blank1"></div>
									<div class="field username pr">
										<label for="signup-username"><span class="f_red">*</span>注册时间</label>
										<select name="regyear">
											<option value="0">请选择</option>
																		<option value="1915" >1915</option>
																		<option value="1916" >1916</option>
																		<option value="1917" >1917</option>
																		<option value="1918" >1918</option>
																		<option value="1919" >1919</option>
																		<option value="1920" >1920</option>
																		<option value="1921" >1921</option>
																		<option value="1922" >1922</option>
																		<option value="1923" >1923</option>
																		<option value="1924" >1924</option>
																		<option value="1925" >1925</option>
																		<option value="1926" >1926</option>
																		<option value="1927" >1927</option>
																		<option value="1928" >1928</option>
																		<option value="1929" >1929</option>
																		<option value="1930" >1930</option>
																		<option value="1931" >1931</option>
																		<option value="1932" >1932</option>
																		<option value="1933" >1933</option>
																		<option value="1934" >1934</option>
																		<option value="1935" >1935</option>
																		<option value="1936" >1936</option>
																		<option value="1937" >1937</option>
																		<option value="1938" >1938</option>
																		<option value="1939" >1939</option>
																		<option value="1940" >1940</option>
																		<option value="1941" >1941</option>
																		<option value="1942" >1942</option>
																		<option value="1943" >1943</option>
																		<option value="1944" >1944</option>
																		<option value="1945" >1945</option>
																		<option value="1946" >1946</option>
																		<option value="1947" >1947</option>
																		<option value="1948" >1948</option>
																		<option value="1949" >1949</option>
																		<option value="1950" >1950</option>
																		<option value="1951" >1951</option>
																		<option value="1952" >1952</option>
																		<option value="1953" >1953</option>
																		<option value="1954" >1954</option>
																		<option value="1955" >1955</option>
																		<option value="1956" >1956</option>
																		<option value="1957" >1957</option>
																		<option value="1958" >1958</option>
																		<option value="1959" >1959</option>
																		<option value="1960" >1960</option>
																		<option value="1961" >1961</option>
																		<option value="1962" >1962</option>
																		<option value="1963" >1963</option>
																		<option value="1964" >1964</option>
																		<option value="1965" >1965</option>
																		<option value="1966" >1966</option>
																		<option value="1967" >1967</option>
																		<option value="1968" >1968</option>
																		<option value="1969" >1969</option>
																		<option value="1970" >1970</option>
																		<option value="1971" >1971</option>
																		<option value="1972" >1972</option>
																		<option value="1973" >1973</option>
																		<option value="1974" >1974</option>
																		<option value="1975" >1975</option>
																		<option value="1976" >1976</option>
																		<option value="1977" >1977</option>
																		<option value="1978" >1978</option>
																		<option value="1979" >1979</option>
																		<option value="1980" >1980</option>
																		<option value="1981" >1981</option>
																		<option value="1982" >1982</option>
																		<option value="1983" selected="selected">1983</option>
																		<option value="1984" >1984</option>
																		<option value="1985" >1985</option>
																		<option value="1986" >1986</option>
																		<option value="1987" >1987</option>
																		<option value="1988" >1988</option>
																		<option value="1989" >1989</option>
																		<option value="1990" >1990</option>
																		<option value="1991" >1991</option>
																		<option value="1992" >1992</option>
																		<option value="1993" >1993</option>
																		<option value="1994" >1994</option>
																		<option value="1995" >1995</option>
																		<option value="1996" >1996</option>
																		<option value="1997" >1997</option>
																		<option value="1998" >1998</option>
																		<option value="1999" >1999</option>
																		<option value="2000" >2000</option>
																		<option value="2001" >2001</option>
																		<option value="2002" >2002</option>
																		<option value="2003" >2003</option>
																		<option value="2004" >2004</option>
																		<option value="2005" >2005</option>
																		<option value="2006" >2006</option>
																		<option value="2007" >2007</option>
																		<option value="2008" >2008</option>
																		<option value="2009" >2009</option>
																		<option value="2010" >2010</option>
																		<option value="2011" >2011</option>
																		<option value="2012" >2012</option>
																		<option value="2013" >2013</option>
																		<option value="2014" >2014</option>
																		<option value="2015" >2015</option>
																	</select>
								年								<select name="regmonth">
																		<option value="0">请选择</option>
																		<option value="1"  >01</option>
																		<option value="2"  >02</option>
																		<option value="3"  >03</option>
																		<option value="4"  >04</option>
																		<option value="5"  selected="selected">05</option>
																		<option value="6"  >06</option>
																		<option value="7"  >07</option>
																		<option value="8"  >08</option>
																		<option value="9"  >09</option>
																		<option value="10"  >10</option>
																		<option value="11"  >11</option>
																		<option value="12"  >12</option>
																	</select>
								月								<select name="regday">
																		<option value="0">请选择</option>
																		<option value="1" >01</option>
																		<option value="2" >02</option>
																		<option value="3" >03</option>
																		<option value="4" >04</option>
																		<option value="5" >05</option>
																		<option value="6" >06</option>
																		<option value="7" selected="selected">07</option>
																		<option value="8" >08</option>
																		<option value="9" >09</option>
																		<option value="10" >10</option>
																		<option value="11" >11</option>
																		<option value="12" >12</option>
																		<option value="13" >13</option>
																		<option value="14" >14</option>
																		<option value="15" >15</option>
																		<option value="16" >16</option>
																		<option value="17" >17</option>
																		<option value="18" >18</option>
																		<option value="19" >19</option>
																		<option value="20" >20</option>
																		<option value="21" >21</option>
																		<option value="22" >22</option>
																		<option value="23" >23</option>
																		<option value="24" >24</option>
																		<option value="25" >25</option>
																		<option value="26" >26</option>
																		<option value="27" >27</option>
																		<option value="28" >28</option>
																		<option value="29" >29</option>
																		<option value="30" >30</option>
																		<option value="31" >31</option>
																	</select>
								日
										<span class="f-input-tip"></span> 
										<span class="hint">请选择您的注册时间。</span> 
									</div>
									<div class="blank1"></div>
									<div class="field password pr">
										<label for="signup-password"><span class="f_red">*</span> 注册地址</label>
										<input type="text" class="f-input ipttxt" id="regLocation" name="regLocation" size="30">
										<span class="f-input-tip"></span> 
										<span class="hint">请输入您企业的注册地址 </span> 
									</div>
									<div class="blank1"></div>
									<div class="field password pr">
										<label for="signup-password-confirm"><span class="f_red">*</span> 生产地址</label>
										<input type="text" class="f-input ipttxt" id="prodLocation" name="prodLocation" size="30">
										<span class="f-input-tip"></span>
										<span class="hint">请输入您企业的生产地址</span>
									</div>
                                    <div class="blank1"></div>
									<div class="field password pr">
										<label for="signup-password-confirm"><span class="f_red">*</span> 注册资金</label>
										<input type="text" class="f-input ipttxt" id="regCapital" name="regCapital" size="30">
										<span class="f-input-tip"></span>
										<span class="hint">请输入您企业的注册资本信息</span>
									</div>
									<div class="blank1"></div>
									<div class="field mobile pr">
										<label for="signup-mobile"><span class="f_red">*</span> 企业注册号</label>
										<input type="text" value="" class="f-input ipttxt" id="regLicence" name="regLicence" size="30">
										<span class="f-input-tip"></span> 
										<span class="hint"> 请输入您企业的注册号，系统会妥善保管您的企业注册信息。</span>
									</div>
                                    <div class="field password pr">
										<label for="signup-password-confirm"><span class="f_red">*</span> 注册机构</label>
										<input type="text" class="f-input ipttxt" id="regAuthority" name="regAuthority" size="30">
										<span class="f-input-tip"></span>
										<span class="hint">请输入您企业的注册所在机构信息</span>
									</div>			
									<div class="blank1"></div>
									
									
																		<div class="field">
										<label id="weibo_label"><span class="f_red">*</span>企业联系人姓名</label>
																				<input type="text" value="" class="f-input ipttxt" id="contactName" name="contactName" size="30">
																				
																				<span class="f-input-tip"></span> 
                                                                                <span class="hint">请输入您企业的联系人信息，我们会跟其联系确定您企业的接入情况。</span> 
									</div>
									<div class="blank1"></div>
									<div class="field mobile pr">
										<label for="signup-mobile"><span class="f_red">*</span> 企业联系人邮箱</label>
										<input type="text" value="" class="f-input ipttxt" id="contactEmail" name="contactEmail" size="30">
										<span class="f-input-tip"></span> 
										<span class="hint"> 请谨慎填写，用于接收企业接入的确认邮件和企业唯一验证码。</span>
									</div>
                                    <div class="blank1"></div>
                                    <div class="field mobile pr">
										<label for="signup-mobile"><span class="f_red">*</span> 企业联系人电话</label>
										<input type="text" value="" class="f-input ipttxt" id="contactPhone" name="contactPhone" size="30">
										<span class="f-input-tip"></span> 
										<span class="hint"> 请谨慎填写，我们会跟其联系确定您企业的接入情况。</span>
									</div>
                                    <div class="blank1"></div>
                                    <div class="field mobile pr">
										<label for="signup-mobile"><span class="f_red"></span> 企业情况备注</label>
										<textarea value="" class="f-input ipttxt" id="appendum" name="appendum" size="30"></textarea>
										<span class="f-input-tip"></span> 
										<span class="hint"> 请填写您企业的备注情况，更多的信息便于让投资者更了解您的企业。</span>
									</div>
																											
									<div class="blank"></div>
									
									<div class="act">
										<input type="submit" class="reg-submit-btn" id="submit" name="submit" value="注册">				
									</div>
								</form>
                    &nbsp;
            <?php
				if($register_status==1)
				{
					echo '<center><label style="color:#390"><h2>'.$register_result.'</h2></label></center>';
				}
				else
					echo '<center><label style="color:#C00"><h2>'.$register_result.'</h2></label></center>';			
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