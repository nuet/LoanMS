<?php
include('lock.php');
include('config.php');
error_reporting(E_ALL ^ E_NOTICE);

$user_check=$_SESSION['login_user'];
$ses_sql=mysql_query("select * from users where username='$user_check' ");

$row=mysql_fetch_array($ses_sql);
$userID=$row['userID'];
$orgID=$row['organizationID'];
$groupID=$row['groupID'];

if($groupID==1)
{
	
}
else if ($groupID==2)
{
}
else
{
}

?>
