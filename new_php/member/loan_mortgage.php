<?php
include('../lock.php');
include('../config.php');
error_reporting(E_ALL ^ E_NOTICE);

$user_check=$_SESSION['login_user'];
$ses_sql=mysql_query("select * from users where username='$user_check' ");

$row=mysql_fetch_array($ses_sql);
$userID=$row['userID'];
$orgID=$row['organizationID'];
$loanID=$_GET['loanID'];

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
		
		if($_POST['newmortgageType']!="" and $_POST['newmortgageDes']!="" and $_POST['startyear']!="" and $_POST['startmonth']!="" and $_POST['startday']!="" and $_POST['endyear']!="" and $_POST['endmonth']!="" and $_POST['endday']!="")
		{
			$newmortgageType= mysql_real_escape_string($_POST['newmortgageType']);
			$newmortgageDes= mysql_real_escape_string($_POST['newmortgageDes']);
			$newstartDate= mysql_real_escape_string($_POST['startyear']).'-'.mysql_real_escape_string($_POST['startmonth'].'-'.mysql_real_escape_string($_POST['startday']));
			$newendDate= mysql_real_escape_string($_POST['endyear']).'-'.mysql_real_escape_string($_POST['endmonth'].'-'.mysql_real_escape_string($_POST['endday']));
			
			$loanMortgage_sql="INSERT INTO t_loan_mortgage SET mortgageType='".$newmortgageType."',mortgageDescription='".$newmortgageDes."', startDate='".$newstartDate."', endDate='".$newendDate."', loanID='".$loanID."';";
			
			$loanMortgage_query = mysql_query($loanMortgage_sql);
			if($loanMortgage_query)
			{
				$update_status=1;
				$update_result='贷款抵押/质押信息成功添加！请点击 <a href="loan_mortgage.php?loanID='.$loanID.'"; style="color:red"> 这里 </a> 刷新页面.';
        	}
        	else
        	{
				$update_status=0;
     		   	$update_result="对不起，贷款抵押/质押信息未成功添加。请重试。";
        	}    	
		}
		else
		{
				$update_status=0;
				$update_result="对不起，信息不完整。请补充。";
		}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>贷款抵押质押信息</title>
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
	<script type="text/javascript" src="css/72ee6d3b720be95f733e43a9a52b4c55.js"></script>
<div class="inc wb">
	<div id="dashboard" class="dashboard">
		<ul>
			<li ><a href="loan_payment.php?loanID=<?php echo $loanID;?>">贷款还款信息</a></li>
           <li class="current"><a href="loan_mortgage.php?loanID=<?php echo $loanID;?>">贷款抵押/质押信息</a></li>
            <li ><a href="loan_fee.php?loanID=<?php echo $loanID;?>">贷款管理费信息</a></li>
		</ul>
	</div>
	<div class="inc_main uc_r_bl_box clearfix pt5 pr15 pl15 pb5">
		<div class="blank20"></div>
		
		<div class="clearfix">
			<form method="post" action="" name="save_bind_notice">
	            <table width="100%" border="0" cellspacing="1px" class="funds" style="margin:10px auto">
	                <tbody>
		                <tr class="title f_dgray b">
		                    <td width="20%">抵押/质押类型</td>
		                    <td width="40%">详情描述</td>
		                    <td width="20%">开始日期</td>
                            <td width="20%">截止日期</td>
		                </tr>
                        <?php
						$mortgage_sql="select * from t_loan_mortgage where loanID=".$loanID;
						$mortgage_result=mysql_query($mortgage_sql);
						while($mortgage_row=mysql_fetch_array($mortgage_result))
						{
						echo '
		                <tr>
		                    <td >
							'.$mortgage_row['mortgageType'].'
		                    </td>
		                    <td>
		                        '.$mortgage_row['mortgageDescription'].'
		                    </td>
		                    <td>
		                        '.$mortgage_row['startDate'].'
		                    </td>
							 <td>
		                        '.$mortgage_row['endDate'].'
		                    </td>
		                </tr>';
						}
		                ?>
                      
		            </tbody>
				</table>
				<div class="blank20"></div>
                
        		<tr>
                    <td width="50">
                        <div align="left">抵押/质押类型：</div>
                    </td>
                    <td>
                        <input type="text" id="newmortgageType" name="newmortgageType" class="f-input">
                    </td>
                    <td height="35" colspan="2" class="f_gray">
                        请填写类型如房产抵押，信用抵押等。
                    </td>
                </tr>
                <div class="blank10"></div>
                <tr>
                    <td width="50">
                        <div align="left">抵押/质押详情描述：</div>
                    </td>
                    <td>
                        <textarea id="newmortgageDes" name="newmortgageDes" class="f-input"></textarea>
                    </td>
                    <td height="35" colspan="2" class="f_gray">
                        请填写类型如房产抵押，信用抵押等。
                    </td>
                </tr>
                <div class="blank10"></div>
                <tr>
                    <td>
                        <div align="left"> 开始日期：</div>
                    </td>
                    <td>
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
                    </td>
                </tr>
                <div class="blank10"></div>
                <tr>
                    <td>
                        <div align="left"> 截止日期：</div>
                    </td>
                    <td>
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
																		<option value="2015" selected="selected">2015</option>
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
                    </td>
                    <div class="blank10"></div>
                    <div class="blank10"></div>
                </tr><div class="tc"><input class="saveSettingBnt" type="submit" id="submit" name="submit" value="新抵押/质押信息"></div>
				<div class="blank20"></div>
			</form>
        </div>
	</div>
    		&nbsp;
            <?php
				if($update_status==1)
					echo '<center><label style="color:#390"><h2>'.$update_result.'</h2></label></center>';
				else
					echo '<center><label style="color:#C00"><h2>'.$update_result.'</h2></label></center>';			
			?>	
	<div class="inc_foot"></div>
</div></div>
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
