<?php
include('lock.php');
include('config.php');
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
