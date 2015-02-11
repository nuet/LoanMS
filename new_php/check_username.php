<?php
include('config.php');
error_reporting(E_ALL ^ E_NOTICE) ;
if(isset($_POST["username"]))
{
    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }   

	
  	//trim and lowercase username
    $username =  strtolower(trim($_POST["username"])); 
    
    //sanitize username
    $username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	
    if(strlen($username)<=4)
	{
		echo '<img src="img/not-available.png" />';
	}
	else
	{
    	//check username in db
    	$check_result = mysql_query("SELECT username FROM users WHERE username='$username'");
    
    	//return total count
    	$username_exist = mysql_num_rows($check_result); //total records
    
    	//if value is more than 0, username is not available
    	if($username_exist) {
        	echo '<img src="img/not-available.png" />';
    	}else{
        	echo '<img src="img/available.png" />';
    		}
	}
}
?>