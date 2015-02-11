<?php
include('config.php');
session_start();
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
					$register_result='恭喜您！您的企业资料已经成功上传。请等待我们的工作人员进行审核，通过后您会收到系统通知邮件包含您的企业唯一验证码，请妥善保存，切勿泄露。秉信成不承担信息泄露的责任。';
        		}
        		else
        		{
					$register_status=0;
     		   		$register_result="系统错误，您的企业注册未成功。请您刷新页面重试，给您带来的困扰深感抱歉。";
        		}    	
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


<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>新企业接入</h1>
      <form method="post" action="">
      	<p>*企业类型：<select name="groupID">
                            	<option value="1" selected="selected">公司</option>
								<option value="2">银行业</option>
								<option value="3">保险业</option></p>
                    </select>
        <p>*企业名称: <input type="text" name="orgName" value="" placeholder="您的企业名称"></p>
        <p>*注册时间：<select name="regyear">
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
						</p>
        <p>*注册地址：<input type="text" name="regLocation" value="" placeholder=""></p>
        <p>*生产地址：<input type="text" name="prodLocation" value="" placeholder="您的企业生产地址"></p>
        <p>*注册资金：<input type="text" name="regCapital" value="" placeholder="您的企业注册资金"></p>
        <p>*企业注册号：<input type="text" name="regLicence" value="" placeholder="您的企业注册机构"></p>
        <p>*注册机构：<input type="text" name="regAuthority" value="" placeholder="证件类型-身份证，护照等"></p>
        <p>*企业联系人姓名：<input type="text" name="contactName" value="" placeholder=""></p>
        <p>*企业联系人邮箱：<input type="text" name="contactEmail" value="" placeholder="电子邮箱"></p>
        <p>请谨慎填写，用于接收企业接入的确认邮件和企业唯一验证码。
        <p>*企业联系人手机：<input type="text" name="contactPhone" value="" placeholder="手机号码"></p>
        <p>企业情况备注：<textarea row=50 column=100 name="appendum" value="" placeholder="企业情况备注-企业优势，企业明星产品等"></textarea></p>
        <p>*为必填项
        <p class="remember_me">
        </p>
        <p class="submit"><input type="submit" name="submit" value="Submit"></p>
      </form>
      <h4><?php echo $register_result;?></h4>
    </div>
  </section>

  <section class="about">
    <p class="about-links">
      <a href="http://www.cssflow.com/snippets/login-form" target="_parent">View Article</a>
      <a href="http://www.cssflow.com/snippets/login-form.zip" target="_parent">Download</a>
    </p>
    <p class="about-author">
      &copy; 2012&ndash;2013 <a href="http://thibaut.me" target="_blank">Thibaut Courouble</a> -
      <a href="http://www.cssflow.com/mit-license" target="_blank">MIT License</a><br>
      Original PSD by <a href="http://www.premiumpixels.com/freebies/clean-simple-login-form-psd/" target="_blank">Orman Clark</a>
  </section>
</body>
</html>