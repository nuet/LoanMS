<?php
include('../lock.php');
include('../config.php');
error_reporting(E_ALL ^ E_NOTICE);

$user_check=$_SESSION['login_user'];
$ses_sql=mysql_query("select * from users where username='$user_check' ");

$row=mysql_fetch_array($ses_sql);
$userID=$row['userID'];
$orgID=$row['organizationID'];

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
$eContact=$row['emergencyContact'];

//Organization Information
$orgName=$org_row['orgName'];
$regDate=$org_row['regTime'];
$legalRPID=$org_row['legalRPID'];
$regLocation=$org_row['regLocation'];
$prodLocation=$org_row['prodLocation'];
$regCapital=$org_row['regCapital'];
$regLicence=$org_row['regLicence'];
$regAuthority=$org_row['regAuthority'];
$contactName=$org_row['contactName'];
$contactEmail=$org_row['contactEmail'];
$appendum=$org_row['appendum'];
?>

<?php
//Update User's Profile
if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['submit']!="")
	{
		if($_POST['fname']!="" or $_POST['lname']!="" or $_POST['gender']!="" or $_POST['phone']!="" or $_POST['billing']!="" or $_POST['shipping']!="" )
		{
			$newfname= mysql_real_escape_string($_POST['fname']);
			$newlname= mysql_real_escape_string($_POST['lname']);
			$newgender= mysql_real_escape_string($_POST['gender']);
			$newphone=mysql_real_escape_string($_POST['phone']);
			$newshipping=mysql_real_escape_string($_POST['shipping']);
			$newbilling=mysql_real_escape_string($_POST['billing']);
			
			$userinfo="UPDATE customer SET fname='".$newfname."', lname='".$newlname."', gender='".$newgender."', phone='".$newphone."', shipping='".$newshipping."', billing='".$newbilling."' where empID=".$empID;
			
			$fulfillquery = mysql_query($userinfo);
			if($fulfillquery)
			{
				$update_status=1;
				$update_result='Your personal information was successfully updated. Please click <a href="account.php"; style="color:red"> here </a> to refresh.';
        	}
        	else
        	{
				$update_status=0;
     		   	$update_result="Sorry, your personal information cannot be updated. Please go back and try again.";
        	}    	
		}
		else
		{
				$update_status=0;
				$update_result="No fields have been selected. Please specify your updates.";
		}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>帐户设置 - 星月慧文金融</title>
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
		<li class="current"><a href="user_profile.php">个人资料管理</a></li>
        <li><a href="change_password.php">更换密码</a></li>
		<li><a href="validation.php">手机认证</a></li>
	</ul>
</div>
<div class="uc_r_bl_box clearfix">
<div class="blank"></div>
<div class="tips mr10 ml10" style="width: auto">
	<span class="f_red b">*</span> 为必填项，所有资料均会严格保密
</div>
<style>
	.field{width:520px}
</style>
<div class="blank"></div>
<div class="item_group" style="width: 716px">个人详细信息</div>
<form method="post" action="/index.php?ctl=uc_account&act=save" name="modify">
<div class="inc wb">
	<div class="inc_main">
			<table width="738px" class="user_info_table">
				<tr>
					<td class="pt10" style="width:460px">
							<!--<div class="field password">
							<label for="settings-password">新密码</label>
							<input type="password" class="f-input" id="settings-password" name="user_pwd" size="30">
							<span class="hint">如果不想修改密码，请保持空白</span> 
						</div>
						<div class="field password">
							<label for="settings-password-confirm">确认密码</label>
							<input type="password" class="f-input" id="settings-password-confirm" name="user_pwd_confirm" size="30">
						</div>										
						<div class="blank"></div>-->
						<div class="field real_name">
							<label for="settings-real_name"><span class="red">*</span>真实姓</label>
							<input type="text" value="<?php echo $lname;?>" readonly="readonly" disabled="true" class="f-input readonly" id="lname" name="lname" size="30">
						</div>
                        <div class="field real_name">
							<label for="settings-real_name"><span class="red">*</span>真实姓</label>
							<input type="text" value="<?php echo $fname;?>" readonly="readonly" disabled="true" class="f-input readonly" id="fname" name="fname" size="30">
						</div>
                        <div class="field idno">
							<label for="settings-idno"><span class="red">*</span>证件类型</label>
							<input type="text" value="<?php echo $IDType;?>" readonly="readonly" disabled="true" class="f-input readonly" id="IDType" name="IDType" size="30" onkeyup="idcheck(this);" >
						</div>
						<div class="field idno">
							<label for="settings-idno"><span class="red">*</span>证件号码</label>
							<input type="text" value="<?php echo $IDNo;?>" readonly="readonly" disabled="true" class="f-input readonly" id="IDNo" name="IDNo" size="30" onkeyup="idcheck(this);" >
						</div>
						<div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>手机号码</label>
							<input type="text" value="<?php echo $phone;?>"  class="f-input readonly" id="settings-mobile" name="phone" size="30">
													</div>
						<div class="field">
							<label><span class="red">*</span>性别</label>
							<select name="sex">
								<option value="-1" >未知</option>
								<option value="0" >女</option>
								<option value="1" selected="selected">男</option>
							</select>
						</div>
						<div class="field clearfix">
							<label for="settings-birthday"><span class="red">*</span>出生日期</label>
							<div class="f_l">
								<select name="byear">
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
								年								<select name="bmonth">
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
								月								<select name="bday">
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
								日							</div>
						</div>
						<div class="field graduation">
							<label for="settings-graduation"><span class="red">*</span>最高学历</label>
							<select name="graduation" id="settings-graduation">
								<option value="" >=请选择=</option>
								<option value="高中或以下" >高中或以下</option>
								<option value="大专" >大专</option>
								<option value="本科" selected="selected">本科</option>
								<option value="研究生或以上" >研究生或以上</option>
							</select>
						</div>
						
						<div class="field graduatedyear">
							<label for="graduatedyear"><span class="red">*</span>入学年份</label>
							<select name="graduatedyear" id="settings-graduatedyear">
															<option value="2015" >2015</option>
															<option value="2014" selected="selected">2014</option>
															<option value="2013" >2013</option>
															<option value="2012" >2012</option>
															<option value="2011" >2011</option>
															<option value="2010" >2010</option>
															<option value="2009" >2009</option>
															<option value="2008" >2008</option>
															<option value="2007" >2007</option>
															<option value="2006" >2006</option>
															<option value="2005" >2005</option>
															<option value="2004" >2004</option>
															<option value="2003" >2003</option>
															<option value="2002" >2002</option>
															<option value="2001" >2001</option>
															<option value="2000" >2000</option>
															<option value="1999" >1999</option>
															<option value="1998" >1998</option>
															<option value="1997" >1997</option>
															<option value="1996" >1996</option>
															<option value="1995" >1995</option>
															<option value="1994" >1994</option>
															<option value="1993" >1993</option>
															<option value="1992" >1992</option>
															<option value="1991" >1991</option>
															<option value="1990" >1990</option>
															<option value="1989" >1989</option>
															<option value="1988" >1988</option>
															<option value="1987" >1987</option>
															<option value="1986" >1986</option>
															<option value="1985" >1985</option>
															<option value="1984" >1984</option>
															<option value="1983" >1983</option>
															<option value="1982" >1982</option>
															<option value="1981" >1981</option>
															<option value="1980" >1980</option>
															<option value="1979" >1979</option>
															<option value="1978" >1978</option>
															<option value="1977" >1977</option>
															<option value="1976" >1976</option>
															<option value="1975" >1975</option>
															<option value="1974" >1974</option>
															<option value="1973" >1973</option>
															<option value="1972" >1972</option>
															<option value="1971" >1971</option>
															<option value="1970" >1970</option>
															<option value="1969" >1969</option>
															<option value="1968" >1968</option>
															<option value="1967" >1967</option>
															<option value="1966" >1966</option>
															<option value="1965" >1965</option>
															<option value="1964" >1964</option>
															<option value="1963" >1963</option>
															<option value="1962" >1962</option>
															<option value="1961" >1961</option>
															<option value="1960" >1960</option>
															<option value="1959" >1959</option>
															<option value="1958" >1958</option>
															<option value="1957" >1957</option>
															<option value="1956" >1956</option>
															<option value="1955" >1955</option>
															<option value="1954" >1954</option>
															<option value="1953" >1953</option>
															<option value="1952" >1952</option>
															<option value="1951" >1951</option>
															<option value="1950" >1950</option>
															<option value="1949" >1949</option>
															<option value="1948" >1948</option>
															<option value="1947" >1947</option>
															<option value="1946" >1946</option>
															<option value="1945" >1945</option>
															<option value="1944" >1944</option>
															<option value="1943" >1943</option>
															<option value="1942" >1942</option>
															<option value="1941" >1941</option>
															<option value="1940" >1940</option>
															<option value="1939" >1939</option>
															<option value="1938" >1938</option>
															<option value="1937" >1937</option>
															<option value="1936" >1936</option>
															<option value="1935" >1935</option>
															<option value="1934" >1934</option>
															<option value="1933" >1933</option>
															<option value="1932" >1932</option>
															<option value="1931" >1931</option>
															<option value="1930" >1930</option>
															<option value="1929" >1929</option>
															<option value="1928" >1928</option>
															<option value="1927" >1927</option>
															<option value="1926" >1926</option>
															<option value="1925" >1925</option>
															<option value="1924" >1924</option>
															<option value="1923" >1923</option>
															<option value="1922" >1922</option>
															<option value="1921" >1921</option>
															<option value="1920" >1920</option>
															<option value="1919" >1919</option>
															<option value="1918" >1918</option>
															<option value="1917" >1917</option>
															<option value="1916" >1916</option>
															<option value="1915" >1915</option>
														</select>
						</div>
						
						<div class="field university">
							<label for="university">毕业院校</label>
							<input type="text" value="南京大学" class="f-input" id="settings-university" name="university" size="30">
						</div>
						
						<div class="field marriage">
							<label><span class="red">*</span>婚姻状况</label>
							
							<input type="radio" class="f-radio" value="已婚" name="marriage" checked="checked"> 已婚
							&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" class="f-radio" value="未婚" name="marriage" > 未婚
							&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" class="f-radio" value="离异" name="marriage" > 离异
							&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" class="f-radio" value="丧偶" name="marriage" > 丧偶
							
						</div>
						
						<div class="field haschild">
							<label><span class="red">*</span>有无子女</label>
							<input type="radio" class="f-radio" value="1" name="haschild" checked="checked"> 有
							&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" class="f-radio" value="0" name="haschild" > 无
						</div>
						
						<div class="field hashouse">
							<label><span class="red">*</span>是否有房</label>
							<input type="radio" class="f-radio" value="1" name="hashouse" checked="checked"> 有
							&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" class="f-radio" value="0" name="hashouse" > 无
						</div>
						
						<div class="field houseloan">
							<label><span class="red">*</span>有无房贷</label>
							<input type="radio" class="f-radio" value="1" name="houseloan" id="houseloan_1"  checked="checked"> 有
							&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" class="f-radio" value="0" name="houseloan" id="houseloan_0"  > 无
						</div>
						
						<div class="field hascar">
							<label><span class="red">*</span>是否有车</label>
							<input type="radio" class="f-radio" value="1" name="hascar" checked="checked"> 有
							&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" class="f-radio" value="0" name="hascar" > 无
						</div>
						
						<div class="field carloan">
							<label><span class="red">*</span>有无车贷</label>
							<input type="radio" class="f-radio" value="1" name="carloan" id="carloan_1"  > 有
							&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" class="f-radio" value="0" name="carloan" id="carloan_0"  checked="checked"> 无
						</div>
						
												<div class="field weibo">
								<label for="weibo">腾讯微博</label>
																<input type="text" value="" class="f-input" id="settings-weibo" name="weibo" size="30">
														</div>
												
						<script type="text/javascript" src="/system/region.js"></script>		
						<div class="field">
																		
							<label for="settings-region"><span class="red">*</span>籍贯</label>
							<select name="n_province_id">
								<option value="0">=请选择=</option>
																<option  value="3">安徽</option>
																<option  value="4">福建</option>
																<option  value="5">甘肃</option>
																<option  value="6">广东</option>
																<option selected="selected" value="7">广西</option>
																<option  value="8">贵州</option>
																<option  value="9">海南</option>
																<option  value="10">河北</option>
																<option  value="11">河南</option>
																<option  value="12">黑龙江</option>
																<option  value="13">湖北</option>
																<option  value="14">湖南</option>
																<option  value="15">吉林</option>
																<option  value="16">江苏</option>
																<option  value="17">江西</option>
																<option  value="18">辽宁</option>
																<option  value="19">内蒙古</option>
																<option  value="20">宁夏</option>
																<option  value="21">青海</option>
																<option  value="22">山东</option>
																<option  value="23">山西</option>
																<option  value="24">陕西</option>
																<option  value="26">四川</option>
																<option  value="28">西藏</option>
																<option  value="29">新疆</option>
																<option  value="30">云南</option>
																<option  value="31">浙江</option>
																<option  value="52">北京</option>
																<option  value="321">上海</option>
																<option  value="343">天津</option>
																<option  value="394">重庆</option>
																<option  value="395">香港</option>
																<option  value="396">澳门</option>
																<option  value="397">台湾</option>
															</select>
													
							<select name="n_city_id">
								<option value="0">=请选择=</option>		
																<option  value="97">南宁</option>
																<option  value="98">桂林</option>
																<option selected="selected" value="99">百色</option>
																<option  value="100">北海</option>
																<option  value="101">崇左</option>
																<option  value="102">防城港</option>
																<option  value="103">贵港</option>
																<option  value="104">河池</option>
																<option  value="105">贺州</option>
																<option  value="106">来宾</option>
																<option  value="107">柳州</option>
																<option  value="108">钦州</option>
																<option  value="109">梧州</option>
																<option  value="110">玉林</option>
															</select>
							
						</div>	
						<div class="field">
																		
							<label for="settings-region"><span class="red">*</span>户口所在地</label>
							
							<select name="province_id">
								<option value="0">=请选择=</option>
																<option  value="3">安徽</option>
																<option  value="4">福建</option>
																<option  value="5">甘肃</option>
																<option  value="6">广东</option>
																<option  value="7">广西</option>
																<option  value="8">贵州</option>
																<option  value="9">海南</option>
																<option  value="10">河北</option>
																<option  value="11">河南</option>
																<option  value="12">黑龙江</option>
																<option  value="13">湖北</option>
																<option  value="14">湖南</option>
																<option  value="15">吉林</option>
																<option selected="selected" value="16">江苏</option>
																<option  value="17">江西</option>
																<option  value="18">辽宁</option>
																<option  value="19">内蒙古</option>
																<option  value="20">宁夏</option>
																<option  value="21">青海</option>
																<option  value="22">山东</option>
																<option  value="23">山西</option>
																<option  value="24">陕西</option>
																<option  value="26">四川</option>
																<option  value="28">西藏</option>
																<option  value="29">新疆</option>
																<option  value="30">云南</option>
																<option  value="31">浙江</option>
																<option  value="52">北京</option>
																<option  value="321">上海</option>
																<option  value="343">天津</option>
																<option  value="394">重庆</option>
																<option  value="395">香港</option>
																<option  value="396">澳门</option>
																<option  value="397">台湾</option>
															</select>
													
							<select name="city_id">
								<option value="0">=请选择=</option>		
																<option selected="selected" value="220">南京</option>
																<option  value="221">苏州</option>
																<option  value="222">无锡</option>
																<option  value="223">常州</option>
																<option  value="224">淮安</option>
																<option  value="225">连云港</option>
																<option  value="226">南通</option>
																<option  value="227">宿迁</option>
																<option  value="228">泰州</option>
																<option  value="229">徐州</option>
																<option  value="230">盐城</option>
																<option  value="231">扬州</option>
																<option  value="232">镇江</option>
															</select>
							
						</div>
						<div class="field address">
							<label for="settings-address"><span class="red">*</span>居住地址</label>
							<input value="南京市白下区" class="f-input" name="address" id="settings-address">
						</div>
						
						<div class="field phone">
														<label for="settings-phone">电话</label>
							<input type="text" value="" class="f-input f_l" id="frphone" onkeyup="setPhone();" onblur="setPhone();" style="width:32px">
							<span class="f_l">&nbsp;-&nbsp;</span>
							<input type="text" value="" class="f-input f_l" id="numphone" onkeyup="setPhone();" onblur="setPhone();" style="width:80px">
							<input type="hidden" value="" name="phone" id="phone">
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
						<div class="clearfix b" style="padding: 10px 90px">请确保您填写的资料真实有效，所有资料将会严格保密。一旦被发现所填资料有虚假，将会影响您在星月慧文金融的信用，对以后借款造成影响。</div>
						<div class="blank"></div>
					</td>
				</tr>
				
			</table>
			
						
			<div class="blank"></div>
			<div class="act mt10 mb10 tc">
					<input type="hidden" value="60" name="id" />
					<input type="submit" class="saveSettingBnt" id="settings-submit" name="commit" value="保存并继续">
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
	<h2>公司信誉分数</h2>
    <h1><center>75</center></h1>
    &nbsp;
    <h1><center>信用等级:</center></h1>
	<!--<img src="images/info_01.jpg"/>-->
    <div id="chart4" style="width:280px;height:220px;"></div>
	<script>
	$(document).ready(function() {
  	var chart_data = [ [75] ];
  	var chart_opt = {
    	title:'	',
    	seriesDefaults:{
      	renderer:$.jqplot.MeterGaugeRenderer,
       	rendererOptions: {
         min: 0,
         max: 100,
         intervals:[0,20,40,60,80,100],
         intervalColors:['#66cc66', '#93b75f', '#E7E658', '#cc6666','#cc7777']
       	}
    	}
  	};

  	$.jqplot('chart4', chart_data, chart_opt);
	});
</script>
	<!--<img src="images/info_02.jpg"/>-->
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
