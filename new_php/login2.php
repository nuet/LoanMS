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
$login_error="对不起，您的用户名或密码不匹配。请重试。";
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
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script>
            $(function() {
 
                if (localStorage.chkbx && localStorage.chkbx != '') {
                    $('#remember_me').attr('checked', 'checked');
                    $('#username').val(localStorage.usrname);
                    $('#pass').val(localStorage.pass);
                } else {
                    $('#remember_me').removeAttr('checked');
                    $('#username').val('');
                    $('#pass').val('');
                }
 
                $('#remember_me').click(function() {
 
                    if ($('#remember_me').is(':checked')) {
                        // save username and password
                        localStorage.usrname = $('#username').val();
                        localStorage.pass = $('#pass').val();
                        localStorage.chkbx = $('#remember_me').val();
                    } else {
                        localStorage.usrname = '';
                        localStorage.pass = '';
                        localStorage.chkbx = '';
                    }
                });
            });
 
</script>
    <div class="login">
      <h1>Login to bxc</h1>
      <form method="post" action="">
        <p>用户名: <input type="text" name="username" value="" placeholder="您的用户名"></p>
        <p>密码: <input type="password" name="password" value="" placeholder="您的密码"></p>
          <label class="checkbox">
                    <input type="checkbox" value="remember-me" id="remember_me"> 记住我的登录信息
           </label>
        <p class="submit"><input type="submit" name="submit" value="登录"></p>
      </form>
    </div>

    <div class="login-help">
      <p>Forgot your password? <a href="index.html">Click here to reset it</a>.</p>
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