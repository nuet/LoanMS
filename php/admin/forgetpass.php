<?php
include("config.php");
error_reporting(E_ALL ^ E_NOTICE);

if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['submit']!="")
{
	if(isset($_POST['username']))
		{
			$sql_forget="SELECT * from admin where username='".$_POST['username']."'";
			$result_forget=mysql_query($sql_forget);
			if($result_forget)
			{
				$row_forget=mysql_fetch_array($result_forget);
				$row_password=$row_forget['password'];
				$row_email=$row_forget['email'];

				$subject = 'SIC Admin: Forget Password';
				$message = 'Hello SIC Admin,\n\n'."Your password is ".$row_password.".\n"."please keep this email carefully.\n". "SIC Admin System Support,\n"."Designed By Gabriel Zhou.";
				$headers = 'From: '.$row_email.'' . "\r\n" .
    'Reply-To:'.$row_email.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

				mail($row_email, $subject, $message, $headers);

				$forget_status=1;
				$forget_result="Your password is successfully sended. Please check your email to view.";
			}
			else
			{
				$forget_status=0;
				$forget_result="Sorry, your username cannot be found. Please enter correct admin username.";
			}
			
		}
		else
		{
			$forget_status=0;
			$forget_result="Sorry, your admin username cannot be empty. Please type in again.";
		}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin | Forget Password</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>

    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                </ul>
                 <a class="brand" href="index.html"><span class="first">Strategic Internship</span> <span class="second">Consulting</span></a>
        </div>
    </div>
    


    

    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Forget Your Password</p>
            <div class="block-body">
                <form method="post" action="#">
                    <label>Username</label>
                    <input type="text" class="span12" name="username">
                    <input type="submit" class="btn btn-primary pull-right" name="submit" value="Send">
                    <div class="clearfix"></div>
                </form>
                 <?php
						if($forget_status==1)
						{
							echo '<span style=" color: green">'.$forget_result.'</span>';
						}
						else
							echo '<span style=" color: red">'.$forget_result.'</span>';
					?>
            </div>
        </div>
        <a href="signin.php">Sign in to your account</a>
    </div>
</div>


    


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>


