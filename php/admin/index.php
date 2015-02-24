<?php
include('config.php');
include('lock.php');
include('statistics.php');
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="ch">
  <head>
    <meta charset="utf-8">
    <title>Admin | Index</title>
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
                            <i class="icon-user"></i> <?php echo $login_name;?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="reset-password.php">重置密码</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" class="visible-phone" href="profile.php">个人资料</a></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="logout.php">退出登录</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="index.html"><span class="first">秉信诚</span> <span class="second">第三方金融服务</span></a>
        </div>
    </div>
    


    
    <div class="sidebar-nav">
        <form class="search form-inline">
            <input type="text" placeholder="Search...">
        </form>

        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>信息中心<span class="label label-info">+6</span></a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li><a href="index.php">首页</a></li>
            <li ><a href="users.php">合作公司信息</a></li>
            <li ><a href="items.php">合作银行信息</a></li>
             <li ><a href="orders.php">合作保险公司信息</a></li>
            <li ><a href="newitem.php">管理贷款信息</a></li>
            <li ><a href="calendar.php">待处理申请信息</a></li>
            
        </ul>

		<a href="#page-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>管理中心<span class="label label-info">+4</span></a>
        <ul id="page-menu" class="nav nav-list collapse">
            <li ><a href="page_index.php">修改金融估值权重</a></li>
            <li ><a href="page_about.php">创建新管理员账号</a></li>
            <li ><a href="page_contact.php">一键估值</a></li>
            <li ><a href="page_contact.php">一键报表</a></li>
        </ul>

        <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>个人账户管理<span class="label label-info">+3</span></a>
        <ul id="accounts-menu" class="nav nav-list collapse">
            <li ><a href="signup.php">个人信息</a></li>
            <li ><a href="reset-password.php">重置密码</a></li>
            <li ><a href="logout.php">退出登录</a></li>
        </ul>

        <a href="#legal-menu" class="nav-header" data-toggle="collapse"><i class="icon-legal"></i>法律条款<span class="label label-info">+2</span></a>
        <ul id="legal-menu" class="nav nav-list collapse">
            <li ><a href="privacy-policy.html">隐私声明</a></li>
            <li ><a href="terms-and-conditions.html">工作人员须知</a></li>
        </ul>

        <a href="faq.html" class="nav-header" ><i class="icon-comment"></i>求助中心</a>
    </div>
    

    
    <div class="content">
        
        <div class="header">
            <h1 class="page-title">管理员中心首页</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">管理员中心</a> <span class="divider">/</span></li>
            <li class="active">首页</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>小贴士:</strong> 本系统仅面向秉信诚公司管理员!
    </div>

    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">最新统计数据</a>
        <div id="page-stats" class="block-body collapse in">

            <div class="stat-widget-container">
                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo $count_org;?></p>
                        <p class="detail">合作公司</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo $count_bank;?></p>
                        <p class="detail">合作银行</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo $count_insurance;?></p>
                        <p class="detail">合作保险公司</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title">￥ <?php echo $sum_loan;?></p>
                        <p class="detail">管理贷款总额</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="block span6">
        <a href="#tablewidget" class="block-heading" data-toggle="collapse">合作公司列表<span class="label label-warning">+<?php echo $count_org;?></span></a>
        <div id="tablewidget" class="block-body collapse in">
            <table class="table">
              <thead>
                <tr>
                  <th>公司名称</th>
                  <th>注册时间</th>
                  <th>注册号</th>
                  <th>联系人姓名</th>
                  <th>联系人邮箱</th>
                  <th>联系人电话</th>
                </tr>
              </thead>
              <tbody>
               	<?php
					if($count_org>0)
				{
					$counter_org=0;
					while (($row_org = mysql_fetch_array($result_org)) && $counter_org<=5) 
				{
					echo "<tr>";
					echo "<td>".$row_org["orgName"]."</td>";
					echo "<td>".$row_org["regTime"]."</td>";
					echo "<td>".$row_org["regLicence"]."</td>";
					echo "<td>".$row_org["contactName"]."</td>";
					echo "<td>".$row_org["contactEmail"]."</td>";
					echo "<td>".$row_org["contactPhone"]."</td>";
					echo "</tr>";
					$counter_org++;
				}
				}
				else
					echo "公司数据尚在统计，请稍后回来。";
				?>
              </tbody>
            </table>
            <p><a href="orgs.php">更多...</a></p>
        </div>
    </div>
    <div class="block span6">
        <a href="#widget1container" class="block-heading" data-toggle="collapse">合作银行列表 </a>
             <div id="tablewidget" class="block-body collapse in">
            <table class="table">
              <thead>
                <tr>
                  <th>银行名称</th>
                  <th>注册时间</th>
                  <th>注册号</th>
                  <th>联系人姓名</th>
                  <th>联系人邮箱</th>
                  <th>联系人电话</th>
                </tr>
              </thead>
              <tbody>
               	<?php
					if($count_bank>0)
				{
					$counter_bank=0;
					while (($row_bank = mysql_fetch_array($result_bank)) && $counter_bank<=5) 
				{
					echo "<tr>";
					echo "<td>".$row_bank["orgName"]."</td>";
					echo "<td>".$row_bank["regTime"]."</td>";
					echo "<td>".$row_bank["regLicence"]."</td>";
					echo "<td>".$row_bank["contactName"]."</td>";
					echo "<td>".$row_bank["contactEmail"]."</td>";
					echo "<td>".$row_bank["contactPhone"]."</td>";
					echo "</tr>";
					$counter_bank++;
				}
				}
				else
					echo "银行数据尚在统计，请稍后回来。";
				?>
              </tbody>
            </table>
            <p><a href="banks.php">更多...</a></p>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="block span6">
        <div class="block-heading">
            <span class="block-icon pull-right">
                <a href="index.php" class="demo-cancel-click" rel="tooltip" title="Click to refresh"><i class="icon-refresh"></i></a>
            </span>

            <a href="#widget2container" data-toggle="collapse">保险公司列表</a>
        </div>
        <div id="widget2container" class="block-body collapse in">
             <table class="table">
              <thead>
                <tr>
                  <th>保险公司名称</th>
                  <th>注册时间</th>
                  <th>注册号</th>
                  <th>联系人姓名</th>
                  <th>联系人邮箱</th>
                  <th>联系人电话</th>
                </tr>
              </thead>
              <tbody>
                 <?php
					if($count_insurance>0)
				{
					$counter_insurance=0;
					while (($row_insurance = mysql_fetch_array($result_insurance)) && $counter_insurance<=5) 
				{
					echo "<tr>";
					echo "<td>".$row_insurance["orgName"]."</td>";
					echo "<td>".$row_insurance["regTime"]."</td>";
					echo "<td>".$row_insurance["regLicence"]."</td>";
					echo "<td>".$row_insurance["contactName"]."</td>";
					echo "<td>".$row_insurance["contactEmail"]."</td>";
					echo "<td>".$row_insurance["contactPhone"]."</td>";
					echo "</tr>";
					$counter_insurance++;
				}
				}
				else
					echo "保险公司信息正在统计，请稍后回来。";
				?>
                    
              </tbody>
            </table>
            <p><a href="insurances.php">更多...</a></p>
        </div>
    </div>
    <div class="block span6">
        <p class="block-heading">今日求助</p>
        <div class="block-body">
            <h2>快速问答</h2>
            <p>管理中心的作用是什么？ 秉信诚网上平台管理中心作用在于秉信诚员工管理贷款信息，公司信息。本系统为企业提供一站式的管理服务，为管理贷款带来快捷方便的全套体验。</p>
            <p><a class="btn btn-primary btn-large">了解更多 &raquo;</a></p>
        </div>
    </div>
</div>


                    
                    <footer>
                        <hr>
                        <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
                        <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                        

                        <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
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


