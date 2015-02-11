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
if($user_groupID!=1)
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
//Update User's Profile
if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['submit']!="")
	{
		if($_POST['phone']!="" or $_POST['gender']!="" or $_POST['email']!="" or $_POST['haddress']!="" or $_POST['baddress']!="" or $_POST['eName']!="" or $_POST['eEmail']!="" or $_POST['ePhone']!="" )
		{
			$newphone= mysql_real_escape_string($_POST['phone']);
			$newgender= mysql_real_escape_string($_POST['gender']);
			$newemail= mysql_real_escape_string($_POST['email']);
			$newhaddress=mysql_real_escape_string($_POST['haddress']);
			$newbaddress=mysql_real_escape_string($_POST['baddress']);
			$neweName=mysql_real_escape_string($_POST['eName']);
			$neweEmail=mysql_real_escape_string($_POST['eEmail']);
			$newePhone=mysql_real_escape_string($_POST['ePhone']);
			
			$userUpdate="UPDATE users SET phone='".$newphone."', gender='".$newgender."', email='".$newemail."', homeAddress='".$newhaddress."', businessAddress='".$newbaddress."', emergencyName='".$neweName."', emergencyEmail='".$neweEmail."', emergencyPhone='".$newePhone."' where userID=".$userID;
			
			$update_query = mysql_query($userUpdate);
			if($update_query)
			{
				$update_status=1;
				$update_result='您的个人信息成功更新！请点击 <a href="user_profile.php"; style="color:red"> 这里 </a> 刷新页面.';
        	}
        	else
        	{
				$update_status=0;
     		   	$update_result="对不起，您的个人信息未成功更新。请重试。";
        	}    	
		}
		else
		{
				$update_status=0;
				$update_result="对不起，未找到更新的信息。请选择您需要修改的栏目。";
		}
}
?>

<?php
//Insert new loan
if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['submit']!="")
	{
		if($_POST['grossAssets']!="" and $_POST['floatingAssets']!="" and $_POST['longequityInvest']!="" and $_POST['grossDebt']!="" and $_POST['dividendsPayables']!="" and $_POST['startyear']!="" and $_POST['startmonth']!="" and $_POST['startday']!="" and $_POST['endyear']!="" and $_POST['endmonth']!="" and $_POST['endday']!="")
		{
			$sheetDate=date('Y-m-d');
			$startDate= mysql_real_escape_string($_POST['startyear']).'-'.mysql_real_escape_string($_POST['startmonth'].'-'.mysql_real_escape_string($_POST['startday']));
			$endDate= mysql_real_escape_string($_POST['endyear']).'-'.mysql_real_escape_string($_POST['endmonth'].'-'.mysql_real_escape_string($_POST['endday']));
			$grossAssets=(float)mysql_real_escape_string($_POST['grossAssets']);
			$floatingAssets=(float)mysql_real_escape_string($_POST['floatingAssets']);
			$monetaryCapital= (float)mysql_real_escape_string($_POST[' monetaryCapital']);
			$liquidInvestment= (float)mysql_real_escape_string($_POST['liquidInvestment']);
			$notesReceivables= (float)mysql_real_escape_string($_POST['notesReceivables']);
			$AccountsReceivables=(float)mysql_real_escape_string($_POST['AccountsReceivables']);
			$suppliersAdvances=(float)mysql_real_escape_string($_POST['suppliersAdvances']);
			$receivableSubsidies=(float)mysql_real_escape_string($_POST['receivableSubsidies']);
			$otherReceivables=(float)mysql_real_escape_string($_POST['otherReceivables']);
			$dividendsReceivables=(float)mysql_real_escape_string($_POST['dividendsReceivables']);
			$stock=(float)mysql_real_escape_string($_POST['stock']);
			$deferredExpenses=(float)mysql_real_escape_string($_POST['deferredExpenses']);
			$otherfloatingAssets=(float)mysql_real_escape_string($_POST['otherfloatingAssets']);
			$nonliquidAssets=(float)mysql_real_escape_string($_POST['nonliquidAssets']);
			$longequityInvest=(float)mysql_real_escape_string($_POST['longequityInvest']);
			$fixedAssetsTotal=(float)mysql_real_escape_string($_POST['fixedAssetsTotal']);
			$fixedAssetsOrigin=(float)mysql_real_escape_string($_POST['fixedAssetsOrigin']);
			$fixedAssetsNet=(float)mysql_real_escape_string($_POST['fixedAssetsNet']);
			$constructionProcess=(float)mysql_real_escape_string($_POST['constructionProcess']);
			$intangibleAssets=(float)mysql_real_escape_string($_POST['intangibleAssets']);
			$longdeferredExpenses=(float)mysql_real_escape_string($_POST['longdeferredExpenses']);
			$othernonliquidInvest=(float)mysql_real_escape_string($_POST['othernonliquidInvest']);
			$grossDebt=(float)mysql_real_escape_string($_POST['grossDebt']);
			$currentDebt=(float)mysql_real_escape_string($_POST['currentDebt']);
			$shortLoan=(float)mysql_real_escape_string($_POST['shortLoan']);
			$notesPayables=(float)mysql_real_escape_string($_POST['notesPayables']);
			$accountsPayables=(float)mysql_real_escape_string($_POST['accountsPayables']);
			$advanceCustomers=(float)mysql_real_escape_string($_POST['advanceCustomers']);
			$taxPayables=(float)mysql_real_escape_string($_POST['taxPayables']);
			$otherPayables=(float)mysql_real_escape_string($_POST['otherPayables']);
			$salaries=(float)mysql_real_escape_string($_POST['salaries']);
			$dividendsPayables=(float)mysql_real_escape_string($_POST['dividendsPayables']);
			$otherfloatingDebt=(float)mysql_real_escape_string($_POST['otherfloatingDebt']);
			$nonfloatingDebt=(float)mysql_real_escape_string($_POST['nonfloatingDebt']);
			$longLoan=(float)mysql_real_escape_string($_POST['longLoan']);
			$othernonfloatingDebt=(float)mysql_real_escape_string($_POST['othernonfloatingDebt']);
			$ownerEquity=(float)mysql_real_escape_string($_POST['ownerEquity']);
			$paidinCapital=(float)mysql_real_escape_string($_POST['paidinCapital']);
			$contributedSurplus=(float)mysql_real_escape_string($_POST['contributedSurplus']);
			$reservedSurplus=(float)mysql_real_escape_string($_POST['reservedSurplus']);
			$undistributedProfit=(float)mysql_real_escape_string($_POST['undistributedProfit']);
			$debtownerequityTotal=(float)mysql_real_escape_string($_POST['debtownerequityTotal']);
			$assetliabilityRatio=(float)mysql_real_escape_string($_POST['assetliabilityRatio']);
			$liquidityRatio=(float)mysql_real_escape_string($_POST['liquidityRatio']);
			$quickRatio=(float)mysql_real_escape_string($_POST['quickRatio']);
	
			$balanceInsert="INSERT INTO t_balance_sheet SET organizationID='".$orgID."', sheetDate='".$sheetDate."',grossAssets='".$grossAssets."',floatingAssets='".$floatingAssets."',monetaryCapital='".$monetaryCapital."',liquidInvestment='".$liquidInvestment."', notesReceivables='".$notesReceivables."', AccountsReceivables='".$AccountsReceivables."', suppliersAdvances='".$suppliersAdvances."', receivableSubsidies='".$receivableSubsidies."', otherReceivables='".$otherReceivables."',dividendsReceivables='".$dividendsReceivables."',stock ='".$stock ."',deferredExpenses='".$deferredExpenses."',otherfloatingAssets='".$otherfloatingAssets."',nonliquidAssets='".$nonliquidAssets."',longequityInvest='".$longequityInvest."',fixedAssetsTotal='".$fixedAssetsTotal."', fixedAssetsOrigin='".$fixedAssetsOrigin."', fixedAssetsNet='".$fixedAssetsNet."',constructionProcess='".$constructionProcess."',intangibleAssets='".$intangibleAssets."',longdeferredExpenses='".$longdeferredExpenses."',othernonliquidInvest='".$othernonliquidInvest."',grossDebt='".$grossDebt."',currentDebt='".$currentDebt."',shortLoan='".$shortLoan."',notesPayables='".$notesPayables."',accountsPayables='".$accountsPayables."',advanceCustomers='".$advanceCustomers."',taxPayables='".$taxPayables."',otherPayables='".$otherPayables."',salaries='".$salaries."',dividendsPayables='".$dividendsPayables."',otherfloatingDebt='".$otherfloatingDebt."',nonfloatingDebt='".$nonfloatingDebt."',longLoan='".$longLoan."',othernonfloatingDebt='".$othernonfloatingDebt."',ownerEquity='".$ownerEquity."',paidinCapital='".$paidinCapital."',contributedSurplus='".$contributedSurplus."',reservedSurplus='".$reservedSurplus."',undistributedProfit='".$undistributedProfit."',debtownerequityTotal='".$debtownerequityTotal."',assetliabilityRatio='".$assetliabilityRatio."',submissionUser='".$userID."',liquidityRatio='".$liquidityRatio."',quickRatio='".$quickRatio."',startDate='".$startDate."',endDate='".$endDate."';";
			
			$balanceInsert_query = mysql_query($balanceInsert);
			if($balanceInsert_query)
			{
				$update_status=1;
				$update_result='企业财务负债表成功上传！请点击 <a href="finance_manage_sheet.php"; style="color:red"> 这里 </a> 管理信息.';
        	}
        	else
        	{
				$update_status=0;
     		   	$update_result="对不起，企业财务负债表信息未成功上传。请重试。";
        	}    	
		}
		else
		{
				$update_status=0;
				$update_result="对不起，企业财务负债表信息不全。请重试。";
		}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上传企业财务信息</title>
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
						<dd><a href="org_legalrp.php">股权资料管理</a></dd>
					</dl>
					</li>
					
					<li class="downnav"><a href="">贷款信息</a>
					<dl>
                    	<dd><a href="new_loan.php">新贷款信息</a></dd>
                        <dd><a href="loan_manage.php">已发布贷款</a></dd>
						<dd><a href="new_income_statement.php">上传财务报表</a></dd>
						<dd><a href="finance_manage_statement.php">管理财务报表</a></dd>
                        <dd><a href="credit_score.php">信用值历史</a></dd>
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
		<li ><a href="new_income_statement.php">企业财务损益表上传</a></li>
        <li class="current"><a href="new_balance_sheet.php">企业财务负债表上传</a></li>
	</ul>
</div>
<div class="uc_r_bl_box clearfix">
<div class="blank"></div>
<div class="tips mr10 ml10" style="width: auto">
	<span class="f_red b">*</span> 为必填项，所有资料均会严格保密,数据不存在请填0;
</div>
<style>
	.field{width:450px}
</style>
<div class="blank"></div>
<div class="item_group" style="width: 650px">上传新企业财务负债表  单位:万元</div>
<form method="post" action="" name="modify">
<div class="inc wb">
	<div class="inc_main">
			<table width="738px" class="user_info_table">
				<tr>
					<td class="pt10" style="width:460px">						
						<div class="blank"></div>
                        <div class="field idno">
							<label for="settings-idno"><span class="red">*</span>周期开始日期</label>
							<select name="startyear">
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
																		<option value="1983" >1983</option>
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
																		<option value="2015" selected="selected" >2015</option>
                                                                        <option value="2016">2016</option>
                                                                        <option value="2017" >2017</option>
                                                                         <option value="2018" >2018</option>
                                                                           <option value="2019" >2019</option>
                                                                             <option value="2020" > 2020</option>
																	</select>
								年								<select name="startmonth">
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
								月								<select name="startday">
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
						</div>
                                  <div class="field idno">
							<label for="settings-idno"><span class="red">*</span>周期结束日期</label>
							<select name="endyear">
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
																		<option value="1983" >1983</option>
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
																		<option value="2015" selected="selected" >2015</option>
                                                                        <option value="2016">2016</option>
                                                                        <option value="2017" >2017</option>
                                                                         <option value="2018" >2018</option>
                                                                           <option value="2019" >2019</option>
                                                                             <option value="2020" > 2020</option>
																	</select>
								年								<select name="endmonth">
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
								月								<select name="endday">
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
						</div>
						<div class="field idno">
							<label for="settings-idno"><span class="red">*</span>总资产</label>
							<input type="text" value="" class="f-input" id="grossAssets" name="grossAssets" size="30" onkeyup="idcheck(this);" >
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>流动资产合计</label>
							<input type="text" value="" id="floatingAssets" name="floatingAssets" size="30">
						</div>
						<div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>货币资金</label>
							<input type="text" value=""  id="monetaryCapital" name="monetaryCapital" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>短期投资</label>
							<input type="text" value=""  id="liquidInvestment" name="liquidInvestment" size="30">
						</div>
						<div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>应收票据</label>
							<input type="text" value=""  id="notesReceivables" name="notesReceivables" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>应收账款</label>
							<input type="text" value=""  id="AccountsReceivables" name="AccountsReceivables" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>预付账款</label>
							<input type="text" value=""  id="suppliersAdvances" name="suppliersAdvances" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>应收补贴款</label>
							<input type="text" value=""  id="receivableSubsidies" name="receivableSubsidies" size="30">
						</div>
                         <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>其他应收款</label>
							<input type="text" value=""  id="otherReceivables" name="otherReceivables" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>应收股利</label>
							<input type="text" value=""  id="dividendsReceivables" name="dividendsReceivables" size="30">
						</div>
						<div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>存货</label>
							<input type="text" value=""  id="stock" name="stock" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>待摊费用</label>
							<input type="text" value=""  id="deferredExpenses" name="deferredExpenses" size="30">
						</div>
						<div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>其它流动资产</label>
							<input type="text" value=""  id="otherfloatingAssets" name="otherfloatingAssets" size="30">
						</div>                  
						<div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>非流动资产合计</label>
							<input type="text" value=""  id="nonliquidAssets" name="nonliquidAssets" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>长期股权投资</label>
							<input type="text" value=""  id="longequityInvest" name="longequityInvest" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>固定资产合计</label>
							<input type="text" value=""  id="fixedAssetsTotal" name="fixedAssetsTotal" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>固定资产原值</label>
							<input type="text" value=""  id="fixedAssetsOrigin" name="fixedAssetsOrigin" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>固定资产净值</label>
							<input type="text" value=""  id="fixedAssetsNet" name="fixedAssetsNet" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>在建工程</label>
							<input type="text" value=""  id="constructionProcess" name="constructionProcess" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>无形资产</label>
							<input type="text" value=""  id="intangibleAssets" name="intangibleAssets" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>长期待摊费用</label>
							<input type="text" value=""  id="longdeferredExpenses" name="longdeferredExpenses" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>其它非流动资产</label>
							<input type="text" value=""  id="othernonliquidInvest" name="othernonliquidInvest" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>总负债</label>
							<input type="text" value=""  id="grossDebt" name="grossDebt" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>流动负债合计</label>
							<input type="text" value=""  id="currentDebt" name="currentDebt" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>短期借款</label>
							<input type="text" value=""  id="shortLoan" name="shortLoan" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>应付票据</label>
							<input type="text" value=""  id="notesPayables" name="notesPayables" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>应付账款</label>
							<input type="text" value=""  id="accountsPayables" name="accountsPayables" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>预收账款</label>
							<input type="text" value=""  id="advanceCustomers" name="advanceCustomers" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>应交税费</label>
							<input type="text" value=""  id="taxPayables" name="taxPayables" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>其它应付款</label>
							<input type="text" value=""  id="otherPayables" name="otherPayables" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>应付薪酬</label>
							<input type="text" value=""  id="salaries" name="salaries" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>应付股利</label>
							<input type="text" value=""  id="dividendsPayables" name="dividendsPayables" size="30">
						</div>
                         <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>其它流动负债</label>
							<input type="text" value=""  id="otherfloatingDebt" name="otherfloatingDebt" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>非流动负债合计</label>
							<input type="text" value=""  id="nonfloatingDebt" name="nonfloatingDebt" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>长期借款</label>
							<input type="text" value=""  id="longLoan" name="longLoan" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>其它非流动负债</label>
							<input type="text" value=""  id="othernonfloatingDebt" name="othernonfloatingDebt" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>所有者权益合计</label>
							<input type="text" value=""  id="ownerEquity" name="ownerEquity" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>实收资本</label>
							<input type="text" value=""  id="paidinCapital" name="paidinCapital" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>资本公积</label>
							<input type="text" value=""  id="contributedSurplus" name="contributedSurplus" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>盈余公积</label>
							<input type="text" value=""  id="reservedSurplus" name="reservedSurplus" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>未分配利润</label>
							<input type="text" value=""  id="undistributedProfit" name="undistributedProfit" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>负债和所有者权益</label>
							<input type="text" value=""  id="debtownerequityTotal" name="debtownerequityTotal" size="30">
						</div>
                         <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>资产负债率</label>
							<input type="text" value=""  id="assetliabilityRatio" name="assetliabilityRatio" size="30">
						</div>
                         <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>流动比率</label>
							<input type="text" value=""  id="liquidityRatio" name="liquidityRatio" size="30">
						</div>
                         <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>速动比率</label>
							<input type="text" value=""  id="quickRatio" name="quickRatio" size="30">
						</div>
                        
					</td>
					<!--<td class="pt10" valign="top" style="width:170px;">
							<img id="avatar" src="images/60virtual_avatar_middle.jpg" />
							<div class="blank"></div>
							<label class="fileupload" onclick="upd_file(this,'avatar_file',60);">
							<input type="file" class="filebox" name="avatar_file" id="avatar_file"/>
							
							</label>
							<label class="fileuploading hide" ></label>							
					</td>-->
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
					echo '<center><label style="color:#C00"><h2>'.$update_result.'</h2></label></center>';			
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
	<h2>公司信誉分数</h2>
    <h1><center>
    <?php
	$current_credit_sql="select * from t_credit where organizationID=".$orgID." and creditDate=
	(select MAX(creditDate) from t_credit where organizationID=".$orgID.")";
	$current_credit_result=mysql_query($current_credit_sql);
	$current_credit_row=mysql_fetch_array($current_credit_result);
	echo $current_credit_row['credit'];
	?>
    </center></h1>
    &nbsp;
    <h1><center>信用等级:</center></h1>
	<!--<img src="images/info_01.jpg"/>-->
    <div id="chart4" style="width:280px;height:220px;"></div>
	<script>
	$(document).ready(function() {
  	var chart_data = [ [<?php echo $current_credit_row['credit']; ?>] ];
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
	<form action="" method="post" >
	<center><input type="submit" class="saveSettingBnt" id="refresh" name="refresh" value="刷新"></center>
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['refresh']!="")
	{
		$newcredit=exec('python dummy.py 2>&1');
		$newcreditTime=date('Y-m-d H:i:s');
		$insertCredit_sql="INSERT INTO t_credit SET credit=".$newcredit.",creditDate='".$newcreditTime."', organizationID=".$orgID.";";
		$insertCredit_result=mysql_query($insertCredit_sql);
	}
	?>
    <div class="blank20"></div>
	<!--<img src="images/info_02.jpg"/>-->
	</div>
	<h2>公司财务信息完整度</h2>
	<table id="info_dksp_status" style="border-collapse:collapse;">
		<tr><th colspan="3">财务信息完整度列表</th></tr>
		<tr>
			<td>财务表名称</td>
			<td>状态</td>
			<td>最新上传日期</td>
		</tr>
		<tr>
			<td>公司损益表</td>
			<td><?php
			$statement_result=mysql_query('select * from t_income_statement where organizationID='.$orgID);
			$statement_number=mysql_num_rows($statement_result);
			if($statement_number!=0)
				echo "已上传";
			else 
				echo "未上传";
			?></td>
			<td><?php
			$statement_date_result=mysql_query('select MAX(statementDate) from t_income_statement where organizationID='.$orgID);
			$statement_date_row=mysql_fetch_array($statement_date_result);
			echo $statement_date_row['MAX(statementDate)'];
			?></td>
		</tr>
		<tr>
			<td>公司负债表</td>
			<td><?php
			$sheet_result=mysql_query('select * from t_balance_sheet where organizationID='.$orgID);
			$sheet_number=mysql_num_rows($sheet_result);
			if($sheet_number!=0)
				echo "已上传";
			else 
				echo "未上传";
			?></td>
			<td><?php
			$sheet_date_result=mysql_query('select MAX(sheetDate) from t_balance_sheet where organizationID='.$orgID);
			$sheet_date_row=mysql_fetch_array($sheet_date_result);
			echo $sheet_date_row['MAX(sheetDate)'];
			?></td></td>
		</tr>
	</table>
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
