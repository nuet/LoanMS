<?php
include('../lock.php');
include('../config.php');
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

$user_check=$_SESSION['login_user'];
$ses_sql=mysql_query("select * from users where username='$user_check' ");

$row=mysql_fetch_array($ses_sql);
$userID=$row['userID'];
$orgID=$row['organizationID'];

$user_groupID=$row['groupID'];
if($user_groupID!=1)
	header("Location: logout.php");

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
$eEmail=$row['emergencyEmail'];
$ePhone=$row['emergencyPhone'];

//Organization Information
$orgName=$org_row['orgName'];
$regDate=$org_row['regTime'];
$regLocation=$org_row['regLocation'];
$prodLocation=$org_row['prodLocation'];
$regCapital=$org_row['regCapital'];
$regLicence=$org_row['regLicence'];
$regAuthority=$org_row['regAuthority'];
$contactName=$org_row['contactName'];
$contactEmail=$org_row['contactEmail'];
$contactPhone=$org_row['contactPhone'];
$appendum=$org_row['appendum'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>贷款管理</title>
<link rel="icon" href="favicon.ico" type="/image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="/image/x-icon" />
<meta name="keywords" content="星月慧文金融" />
<meta name="description" content="星月慧文金融—最大、最安全的网络借贷平台" />
<link rel="stylesheet" type="text/css" href="css/cd5130c04e21f5fa934eaeb037e9923a.css" />
<link rel="stylesheet" type="text/css" href="css/global.css" />
<script type="text/javascript">
var APP_ROOT = '';;
var LOADER_IMG = 'images/lazy_loading.gif';
var ERROR_IMG = 'images/image_err.gif';
var send_span = 2000;
</script>
<script type="text/javascript" src="js/lang.js"></script>
<script type="text/javascript" src="js/ae18c80063dd21d5707e2fee2458de84.js"></script>
<script type="text/javascript" src="meter/jquery.min.js"></script>
<script type="text/javascript" src="meter/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="meter/jqplot.MeterGaugeRenderer.min.js"></script>

</head>

<body>
<div id="c_header">
	<div class="head_top">
	</div>
	<div class="head_bottom">
		<div class="wrap">
			<div class="logo">
				<a href=""><img src="images/5433d43e3d768.png"/></a>
			</div>
			<div class="nav">
				<ul>
					<li  class="downnav"><a href="">公司信息</a>
					<dl>
						<dd><a href="org_profile.php">基本资料管理</a></dd>
						<dd><a href="org_legalrp.php">股权资料管理</a></dd>
					</dl>
					</li>
					
					<li class="downnav"><a href="">贷款信息</a>
					<dl>
                    	<dd><a href="new_loan.php">新贷款信息</a></dd>
                        <dd><a href="loan_manage.php">已发布贷款</a></dd>
						<dd><a href="new_income_statement.php">上传财务报表</a></dd>
						<dd><a href="finance_manage_statement.php">管理财务报表</a></dd>
                        <dd><a href="credit_score.php">信用值历史</a></dd>
					</dl>
					</li>
					<li class="downnav"><a href="">个人信息</a>
					<dl>
						<dd><a href="user_profile.php">更新个人信息</a></dd>
						<dd><a href="reset_password.php">重设密码</a></dd>
						<dd><a href="validation.php">手机验证</a></dd>
					</dl>
					</li>
				</ul>
			</div>
			<div class="menu">
				<div class="search">
				<form name="search" action="" method="get">
					<input class="keyword" type="text" name="keyword"/>
					<input class="submit" type="submit" name="submit" value="搜索"/>
				</form>
				</div>
				<div class="menu_con">
					<a href=""><img src="images/menu_01.png"/><br/>消息</a>
					<a href="user_profile.php"><img src="images/menu_02.png"/><br/>资料</a>
					<a href=""><img src="images/menu_03.png"/><br/>求助</a>
					<a href="logout.php"><img src="images/menu_04.png"/><br/>退出</a>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>	
<script type="text/javascript">
$(function(){
	$(".downnav").mouseenter(function(){
		$(this).addClass("downnav_hover");
		$("dl",this).show();
	}).mouseleave(function(){
		$(this).removeClass("downnav_hover");
		$("dl",this).hide();
	});
});
</script>		
<div class="wrap">
 
<div class="blank"></div>
<div class="long_uc f_l">
	<div id="dashboard" class="dashboard">
	<ul>
		<li class="current"><a href="/index.php?ctl=uc_deal&act=borrowed">已发布的贷款</a></li>
	</ul>
</div>
<div class="uc_r_bl_box clearfix">
<div class="silverBg tc pl10 " style="height:30px;line-height:30px; font-weight:bold; color:#8E8E8E">
     <div class="f_l" style="width:100px">
           贷款银行
    </div>
    <div class="f_l tl" style="width:100px;text-indent:2em">
            贷款类型
    </div>
    <div class="f_l" style="width:100px">
            贷款开始日期
    </div>
    <div class="f_l" style="width:100px">
            贷款截止日期
    </div>
    <div class="f_l" style="width:100px">
            贷款总额
    </div>
    <div class="f_l" style="width:100px">
            贷款保险公司
    </div>
    <div class="f_l" style="width:60px">
            贷款详情
    </div>

</div>
<div class="clearfix pt5 pb5 pl10 ">
<div id="borrowed" class="tc">
	<?php
	$loan_query="select * from t_loan where organizationID=".$orgID;
	$loan_result=mysql_query($loan_query);
	$loan_number=mysql_num_rows($loan_result);
	while($loan_row = mysql_fetch_array($loan_result))
		{
			$bank_sql="select * from organization where organizationID=".$loan_row['bankID'];
			$bank_result=mysql_query($bank_sql);
			$bank_row=mysql_fetch_array($bank_result);
			$bankName=$bank_row['orgName'];
			if($loan_row['insuranceID']!=NULL)
			{
				$insurance_sql="select * from organization where organizationID=".$loan_row['insuranceID'];
				$insurance_result=mysql_query($insurance_sql);
				$insurance_row=mysql_fetch_array($insurance_result);
				$insuranceName=$insurance_row['orgName'];
			}
			else
				$insuranceName="无保险";
			$loanID=$loan_row['loanID'];
			echo'
	 			
	            <div class="clearfix pb10">
                <div class="f_l" style="width:100px;height: 64px;">
                    '.$bankName.'
                </div>
                <div class="f_l tl" style="width:100px" align="center">
                    '.$loan_row['loanType'].'
                </div>
                <div class="f_l f_red" style="width:100px;">
                	'.$loan_row['startTime'].'                </div>
                <div class="f_l f_red" style="width:100px">
                    '.$loan_row['endTime'].'
                </div>
                <div class="f_l f_red" style="width:100px">
                    ￥'.$loan_row['total'].'               </div>
                <div class="f_l" style="width:100px">
                '.$insuranceName.'
					                </div>
				<div class="f_l tc" style="width:60px">
					<a href="loan_payment.php?loanID='.$loanID.'">更多</a>
															</div>
            </div>
            <div style="border-bottom:1px dotted #9D9D9D;margin:5px 0 ">
         </div>';
		}
		?>
                </div>
	</table>
	<div class="blank"></div>
	<!--<div class="pages"> 2 条记录 1/1 页          </div>-->
</div>
</div></div>
<div class="info f_l">
	<div id="info_grade">
	<h2>公司信誉分数</h2>
    <h1><center>
    <?php
	$current_credit_sql="select * from t_credit where organizationID=".$orgID." and creditDate=
	(select MAX(creditDate) from t_credit where organizationID=".$orgID.")";
	$current_credit_result=mysql_query($current_credit_sql);
	$current_credit_row=mysql_fetch_array($current_credit_result);
	echo $current_credit_row['credit'];
	?>
    </center></h1>
    &nbsp;
    <h1><center>信用等级:</center></h1>
	<!--<img src="images/info_01.jpg"/>-->
    <div id="chart4" style="width:280px;height:220px;"></div>
	<script>
	$(document).ready(function() {
  	var chart_data = [ [<?php echo $current_credit_row['credit']; ?>] ];
  	var chart_opt = {
    	title:'	',
    	seriesDefaults:{
      	renderer:$.jqplot.MeterGaugeRenderer,
       	rendererOptions: {
         min: 0,
         max: 100,
         intervals:[0,20,40,60,80,100],
         intervalColors:['#66cc66', '#93b75f', '#E7E658', '#cc6666','#cc7777']
       	}
    	}
  	};

  	$.jqplot('chart4', chart_data, chart_opt);
	});
</script>
	<form action="" method="post" >
	<center><input type="submit" class="saveSettingBnt" id="refresh" name="refresh" value="刷新"></center>
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['refresh']!="")
	{
		$newcredit=exec('python dummy.py 2>&1');
		$newcreditTime=date('Y-m-d H:i:s');
		$insertCredit_sql="INSERT INTO t_credit SET credit=".$newcredit.",creditDate='".$newcreditTime."', organizationID=".$orgID.";";
		$insertCredit_result=mysql_query($insertCredit_sql);
	}
	?>
    <div class="blank20"></div>
	<!--<img src="images/info_02.jpg"/>-->
	</div>
	<h2>公司财务信息完整度</h2>
	<table id="info_dksp_status" style="border-collapse:collapse;">
		<tr><th colspan="3">财务信息完整度列表</th></tr>
		<tr>
			<td>财务表名称</td>
			<td>状态</td>
			<td>最新上传日期</td>
		</tr>
		<tr>
			<td>公司损益表</td>
			<td><?php
			$statement_result=mysql_query('select * from t_income_statement where organizationID='.$orgID);
			$statement_number=mysql_num_rows($statement_result);
			if($statement_number!=0)
				echo "已上传";
			else 
				echo "未上传";
			?></td>
			<td><?php
			$statement_date_result=mysql_query('select MAX(statementDate) from t_income_statement where organizationID='.$orgID);
			$statement_date_row=mysql_fetch_array($statement_date_result);
			echo $statement_date_row['MAX(statementDate)'];
			?></td>
		</tr>
		<tr>
			<td>公司负债表</td>
			<td><?php
			$sheet_result=mysql_query('select * from t_balance_sheet where organizationID='.$orgID);
			$sheet_number=mysql_num_rows($sheet_result);
			if($sheet_number!=0)
				echo "已上传";
			else 
				echo "未上传";
			?></td>
			<td><?php
			$sheet_date_result=mysql_query('select MAX(sheetDate) from t_balance_sheet where organizationID='.$orgID);
			$sheet_date_row=mysql_fetch_array($sheet_date_result);
			echo $sheet_date_row['MAX(sheetDate)'];
			?></td></td>
		</tr>
	</table>
	<h2>公司信息完整度</h2>
	<table id="info_dkgl_status" style="border-collapse:collapse;">
		<tr><th colspan="3">公司信息完整度列表</th></tr>
		<tr>
			<td>信息名称</td>
			<td>状态</td>
			<td>详情</td>
		</tr>
		<tr>
			<td>注册执照号</td>
			<td><?php 
			if($regLicence!="")
				echo "已上传";
			else 
				echo "未上传";?></td>
			<td><?php echo $regLicence;?></td>
		</tr>
		<tr>
			<td>联系人姓名</td>
			<td><?php 
			if($contactName!="")
				echo "已上传";
			else 
				echo "未上传";?></td>
			<td><?php echo $contactName;?></td>
		</tr>
		<tr>
			<td>联系人电话</td>
			<td><?php 
			if($contactPhone!="")
				echo "已上传";
			else 
				echo "未上传";?></td>
			<td><?php echo $contactPhone;?></td>
		</tr>
        <tr>
			<td>联系人邮箱</td>
			<td><?php 
			if($contactEmail!="")
				echo "已上传";
			else 
				echo "未上传";?></td>
			<td>
			<?php echo $contactEmail;?>
            </td>
		</tr>
	</table>
</div>

<div class="blank"></div>

	</div>
	<div class="blank"></div>
	<div id="ftw">
        <div id="ft">
        	<div class="wrap">
	            <ul class="cf">
	            											<li class="col hp1">
	                    <h3>关于平台</h3>
	                    <ul class="sub-list">
							             
						</ul>
	                </li> 
																				<li class="col hp2">
	                    <h3>使用帮助</h3>
	                    <ul class="sub-list">
																					<li><a href="/index.php?ctl=help&id=8" >常见问题</a></li>
																												<li><a href="/index.php?ctl=aboutp2p" target="_blank">平台原理</a></li>
																												<li><a href="/index.php?ctl=borrow&act=aboutborrow" target="_blank">如何借款</a></li>
																												<li><a href="/index.php?ctl=aboutfee" target="_blank">星月慧文金融费率</a></li>
														             
						</ul>
	                </li> 
																				<li class="col hp3">
	                    <h3>关于我们</h3>
	                    <ul class="sub-list">
																					<li><a href="/index.php?ctl=help&id=1" >公司简介</a></li>
																												<li><a href="/index.php?ctl=help&id=5" >联系我们</a></li>
																												<li><a href="/index.php?ctl=help&id=2" >免责条款</a></li>
														             
						</ul>
	                </li> 
																				<li class="col hp4">
	                    <h3>安全保护</h3>
	                    <ul class="sub-list">
																					<li><a href="/index.php?ctl=aboutlaws" target="_blank">政策法规</a></li>
																												<li><a href="/index.php?ctl=help&id=3" >隐私保护</a></li>
														             
						</ul>
	                </li> 
																					            </ul>
				<div class="blank"></div>
			</div>
			<div class="footer_line"></div>
			<div class="wrap">
					            <div class=copyright>
	            						<div class="tc clearfix">
										<a href="/index.php?ctl=sys&id=39" title="避免私下交易">避免私下交易</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php?ctl=sys&id=38" title="五大重要守则">五大重要守则</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php?ctl=sys&id=37" title="完善的贷中贷后管理">完善的贷中贷后管理</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php?ctl=sys&id=36" title="严格的贷前审核">严格的贷前审核</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php?ctl=sys&id=35" title="隐私保护">隐私保护</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php?ctl=sys&id=34" title="账户安全">账户安全</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php?ctl=sys&id=33" title="本金保障计划">本金保障计划</a>
										&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php?ctl=sys&id=clew" title="投资小提示">投资小提示</a>
										</div>
					<div class="blank"></div>
						            						电话：025-84458116 周一至周六 9:00-18:00  
					&nbsp;&nbsp;
									
					&nbsp;&nbsp;
										<div class="blank1"></div>	
					<div style="text-align:center;">联系我们：icanpk@126.com &nbsp; 南京星月慧文</div>
<div style="text-align:center;">(c) 2014 星月慧文金融 All rights reserved</div> 
					<div class="blank"></div>				
					
	            </div>
        </div>
    </div>
	<div id="gotop"></div>
</body>
</html>
