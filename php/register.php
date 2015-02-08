<?php
include('config.php');
session_start();
error_reporting(E_ALL ^ E_NOTICE) ;

//Register new user--Organization code is known
if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['submit']!="")
	{
		if($_POST['firstname']!="" and $_POST['lastname']!="" and $_POST['gender']!="" and $_POST['phone']!="" and $_POST['email']!="" and $_POST['username'] and $_POST['password'] and $_POST['orgKey']!="" )
		{
			$username= mysql_real_escape_string($_POST['username']);
			$password= mysql_real_escape_string($_POST['password']);
			$firstname= mysql_real_escape_string($_POST['firstname']);
			$lastname=mysql_real_escape_string($_POST['lastname']);
			$gender=mysql_real_escape_string($_POST['gender']);
			$phone=mysql_real_escape_string($_POST['phone']);
			$haddress=mysql_real_escape_string($_POST['haddress']);
			$baddress=mysql_real_escape_string($_POST['baddress']);
			$IDType=mysql_real_escape_string($_POST['IDType']);
			$IDNo=mysql_real_escape_string($_POST['IDNo']);
			$email=mysql_real_escape_string($_POST['email']);
			$eName=mysql_real_escape_string($_POST['eName']);
			$eEmail=mysql_real_escape_string($_POST['eEmail']);
			$ePhone=mysql_real_escape_string($_POST['ePhone']);
			$orgKey=mysql_real_escape_string($_POST['orgKey']);
			
			$orgID_sql="select * from organization where organizationKey=".$orgKey;
			$orgID_result=mysql_query($orgID_sql);
			$org_row=mysql_fetch_array($orgID_result);
			$orgKey_true=$org_row['organizationKey'];
			$orgID=$org_row['organizationID'];
			$groupID=$org_row['groupID'];
			
			if($orgKey==$orgKey_true)
			{
				$registerUser="INSERT INTO users SET LastName='".$lastname."', FirstName='".$firstname."', homeAddress='".$haddress."', businessAddress='".$baddress."', IDType='".$IDType."', IDNo='".$IDNo."', email='".$email."', phone='".$phone."', emergencyName='".$eName."',emergencyEmail='".$eEmail."', organizationID='".$orgID."', groupID='".$groupID."',username='".$username."',password='".$password."',gender='".$gender."',emergencyPhone='".$ePhone."';";
				$register_query = mysql_query($registerUser);
				if($register_query)
				{
					$register_status=1;
					$register_result='恭喜您！成功注册了本站会员。 请点击 <a href="register.php"; style="color:red"> 这里 </a> 刷新页面管理您隶属的公司信息和您个人信息。';
        		}
        		else
        		{
					$register_status=0;
     		   		$register_result="系统错误，您的注册未成功。请您刷新页面重试，给您带来的困扰深感抱歉。";
        		}    	
			}
		}
		else
		{
			$register_status=0;
			$register_result="一些*必填项尚未填写，请补充资料，谢谢！";
		}
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
      <h1>Register user to bxc</h1>
      <form method="post" action="">
      	<p>公司代码：<input type="text" name="orgKey" value="" placeholder="您的公司代码"></p>
        <p>用户名: <input type="text" name="username" value="" placeholder="用户名-英文字母数字"></p>
        <p>密码: <input type="password" name="password" value="" placeholder="请设置密码"></p>
        <p>姓：<input type="text" name="lastname" value="" placeholder=""></p>
        <p>名：<input type="text" name="firstname" value="" placeholder=""></p>
        <p>性别：<input type="text" name="gender" value="" placeholder="您的姓别"></p>
        <p>家庭地址：<input type="text" name="haddress" value="" placeholder="家庭地址-街道名，城市，邮编"></p>
        <p>办公地址：<input type="text" name="baddress" value="" placeholder="办公地址-街道名，城市，邮编"></p>
        <p>证件类型：<input type="text" name="IDType" value="" placeholder="证件类型-身份证，护照等"></p>
        <p>证件号：<input type="text" name="IDNo" value="" placeholder=""></p>
        <p>电子邮箱：<input type="text" name="email" value="" placeholder="电子邮箱"></p>
        <p>手机号：<input type="text" name="phone" value="" placeholder="手机号码"></p>
        <p>紧急联系人姓名：<input type="text" name="eName" value="" placeholder="紧急联系人姓名"></p>
        <p>紧急联系邮箱：<input type="text" name="eEmail" value="" placeholder="联系人邮箱"></p>
        <p>紧急联系电话：<input type="text" name="ePhone" value="" placeholder="联系人电话"></p>
        <p class="remember_me">
        </p>
        <p class="submit"><input type="submit" name="submit" value="Submit"></p>
      </form>
      <h4><?php echo $registerUser; echo $register_result;?></h4>
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