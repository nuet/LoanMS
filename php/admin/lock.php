<?php
include('config.php');
session_start();
$user_check=$_SESSION['login_user'];

$ses_sql=mysql_query("select * from t_admin where adminname='$user_check' ");

$row_login=mysql_fetch_array($ses_sql);

$login_session=$row_login['adminname'];
$login_name=$row_login['lastname'].$row_login['firstname'];

if(!isset($login_session))
{
header("Location: signin.php");
}
?>