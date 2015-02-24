<?php
include('config.php');
include('lock.php');
include('statistics.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin | Users</title>
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
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?php echo $user_check;?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="reset-password.php">Reset Password</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" class="visible-phone" href="#">Settings</a></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="index.html"><span class="first">Strategic Internship</span> <span class="second">Consulting</span></a>
        </div>
    </div>
    


    
     <div class="sidebar-nav">
        <form class="search form-inline">
            <input type="text" placeholder="Search...">
        </form>

        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li><a href="index.php">Home</a></li>
            <li ><a href="users.php">Users List</a></li>
            <li ><a href="items.php">Items List</a></li>
             <li ><a href="orders.php">Orders List</a></li>
            <li ><a href="newitem.php">New Item</a></li>
            <li ><a href="calendar.php">Calendar</a></li>
            
        </ul>
		
        <a href="#page-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Page Setup<span class="label label-info">+3</span></a>
        <ul id="page-menu" class="nav nav-list collapse">
            <li ><a href="page_index.php">Index Page</a></li>
            <li ><a href="page_about.php">About Page</a></li>
            <li ><a href="page_contact.php">Contact Page</a></li>
        </ul>
        
        <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account<span class="label label-info">+3</span></a>
        <ul id="accounts-menu" class="nav nav-list collapse">
            <li ><a href="signup.php">Sign Up</a></li>
            <li ><a href="reset-password.php">Reset Password</a></li>
            <li ><a href="logout.php">Log Out</a></li>
        </ul>

        <a href="#legal-menu" class="nav-header" data-toggle="collapse"><i class="icon-legal"></i>Legal</a>
        <ul id="legal-menu" class="nav nav-list collapse">
            <li ><a href="privacy-policy.html">Privacy Policy</a></li>
            <li ><a href="terms-and-conditions.html">Terms and Conditions</a></li>
        </ul>

        <a href="faq.html" class="nav-header" ><i class="icon-comment"></i>Faq</a>
    </div>
    

    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Users</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Users</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Username</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
        	<?php
				if($count_user>0)
				{
					$page=isset($_GET['page'])?intval($_GET['page']):1;
					$num=15;
					$pagenum=ceil($count_user/$num); 
					$offset=($page-1)*$num; 
					
					$sql_page="SELECT * FROM customer limit $offset,$num";
					$result_page=mysql_query($sql_page);
					while (($row_page = mysql_fetch_array($result_page))) 
				{
					echo "<tr>";
					echo "<td>".$row_page["ID"]."</td>";
					echo "<td>".$row_page["fname"]."</td>";
					echo "<td>".$row_page["lname"]."</td>";
					echo "<td>".$row_page["username"]."</td>";
					echo "<td><a href='userdetails.php?userID=".$row_page["ID"]."'><i class='icon-pencil'></i></a></td>";
					echo "</tr>";
					
				}
				}
				else
					echo "No users right now. Please come back later.";
				?>
      </tbody>
    </table>
</div>
<div class="pagination">
    <ul>
        
      	<?php
			for($i=1;$i<=$pagenum;$i++)
			{
				$show=($i!=$page)?"<li><a href='users.php?page=".$i."'>$i</a></li>":"<li><a href='users.php?page=".$i."'><b>$i</b></a></li>";
				echo $show; 
			}
		?>
				
    </ul>
</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-danger" data-dismiss="modal">Delete</button>
    </div>
</div>


                    
                    <footer>
                        <hr>
                        <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
                        <p class="pull-right"><a href="#" target="_blank">Designed</a> by <a href="#" target="_blank">Gabriel Zhou</a></p>
                        

                        <p>&copy; 2013 <a href="#" target="_blank">Gabriel Zhou</a></p>
                    </footer>
                    
            </div>
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


