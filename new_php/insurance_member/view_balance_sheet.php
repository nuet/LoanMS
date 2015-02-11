<?php
include('../lock.php');
include('../config.php');
error_reporting(E_ALL ^ E_NOTICE);

$user_check=$_SESSION['login_user'];
$ses_sql=mysql_query("select * from users where username='$user_check' ");

$row=mysql_fetch_array($ses_sql);
$userID=$row['userID'];
$orgID=$_GET['orgID'];

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

//Query Balance Sheet
$sheetID=$_GET['sheetID'];
$sheet_query='select * from t_balance_sheet where sheetID='.$sheetID;
$sheet_result=mysql_query($sheet_query);
$sheet_row=mysql_fetch_array($sheet_result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>更新企业财务信息</title>
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
						<dd><a href="view_org_profile.php?orgID=<?php echo $orgID;?>">基本资料管理</a></dd>
						<dd><a href="view_org_legalrp.php?orgID=<?php echo $orgID;?>">股权资料管理</a></dd>
					</dl>
					</li>
					
					<li class="downnav"><a href="">贷款信息</a>
					<dl>
                        <dd><a href="view_loan_manage.php?orgID=<?php echo $orgID;?>">已发布贷款</a></dd>
						<dd><a href="view_finance_manage_statement.php?orgID=<?php echo $orgID;?>">管理财务报表</a></dd>
                      <dd><a href="view_credit_score.php?orgID=<?php echo $orgID;?>">信用值历史</a></dd>
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
        <li class="current"><a href="">企业财务负债表更新</a></li>
	</ul>
</div>
<div class="uc_r_bl_box clearfix">
<div class="blank"></div>
<div class="tips mr10 ml10" style="width: auto">
	<span class="f_red b">*</span> 为必填项，所有资料均会严格保密,数据不存在请填0;
</div>
<style>
	.field{width:450px}
</style>
<div class="blank"></div>
<div class="item_group" style="width: 650px">更新企业财务负债表  单位:万元</div>
<form method="post" action="" name="modify">
<div class="inc wb">
	<div class="inc_main">
			<table width="738px" class="user_info_table">
				<tr>
					<td class="pt10" style="width:460px">						
						<div class="blank"></div>
                        <div class="field idno">
							<label for="settings-idno"><span class="red">*</span>周期开始日期</label>
							<input type="text" value="<?php echo $sheet_row['startDate'];?>" readonly="readonly" disabled="disabled" class="f-input" id="startDate" name="startDate" size="30" onkeyup="idcheck(this);">
						</div>
                                  <div class="field idno">
							<label for="settings-idno"><span class="red">*</span>周期结束日期</label>
							<input type="text" value="<?php echo $sheet_row['endDate'];?>" readonly="readonly" disabled="disabled" class="f-input" id="startDate" name="startDate" size="30" onkeyup="idcheck(this);">
						</div>
						<div class="field idno">
							<label for="settings-idno"><span class="red">*</span>总资产</label>
							<input type="text" value="<?php echo $sheet_row['grossAssets'];?>" class="f-input" id="grossAssets" name="grossAssets" size="30" onkeyup="idcheck(this);" >
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>流动资产合计</label>
							<input type="text" value="<?php echo $sheet_row['floatingAssets'];?>" id="floatingAssets" name="floatingAssets" size="30">
						</div>
						<div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>货币资金</label>
							<input type="text" value="<?php echo $sheet_row['monetaryCapital'];?>"  id="monetaryCapital" name="monetaryCapital" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>短期投资</label>
							<input type="text" value="<?php echo $sheet_row['liquidInvestment'];?>"  id="liquidInvestment" name="liquidInvestment" size="30">
						</div>
						<div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>应收票据</label>
							<input type="text" value="<?php echo $sheet_row['notesReceivables'];?>"  id="notesReceivables" name="notesReceivables" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>应收账款</label>
							<input type="text" value="<?php echo $sheet_row['AccountsReceivables'];?>"  id="AccountsReceivables" name="AccountsReceivables" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>预付账款</label>
							<input type="text" value="<?php echo $sheet_row['suppliersAdvances'];?>"  id="suppliersAdvances" name="suppliersAdvances" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>应收补贴款</label>
							<input type="text" value="<?php echo $sheet_row['receivableSubsidies'];?>"  id="receivableSubsidies" name="receivableSubsidies" size="30">
						</div>
                         <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>其他应收款</label>
							<input type="text" value="<?php echo $sheet_row['otherReceivables'];?>"  id="otherReceivables" name="otherReceivables" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>应收股利</label>
							<input type="text" value="<?php echo $sheet_row['dividendsReceivables'];?>"  id="dividendsReceivables" name="dividendsReceivables" size="30">
						</div>
						<div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>存货</label>
							<input type="text" value="<?php echo $sheet_row['stock'];?>"  id="stock" name="stock" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>待摊费用</label>
							<input type="text" value="<?php echo $sheet_row['deferredExpenses'];?>"  id="deferredExpenses" name="deferredExpenses" size="30">
						</div>
						<div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>其它流动资产</label>
							<input type="text" value="<?php echo $sheet_row['otherfloatingAssets'];?>"  id="otherfloatingAssets" name="otherfloatingAssets" size="30">
						</div>                  
						<div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>非流动资产合计</label>
							<input type="text" value="<?php echo $sheet_row['nonliquidAssets'];?>"  id="nonliquidAssets" name="nonliquidAssets" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>长期股权投资</label>
							<input type="text" value="<?php echo $sheet_row['longequityInvest'];?>"  id="longequityInvest" name="longequityInvest" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>固定资产合计</label>
							<input type="text" value="<?php echo $sheet_row['fixedAssetsTotal'];?>"  id="fixedAssetsTotal" name="fixedAssetsTotal" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>固定资产原值</label>
							<input type="text" value="<?php echo $sheet_row['fixedAssetsOrigin'];?>"  id="fixedAssetsOrigin" name="fixedAssetsOrigin" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>固定资产净值</label>
							<input type="text" value="<?php echo $sheet_row['fixedAssetsNet'];?>"  id="fixedAssetsNet" name="fixedAssetsNet" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>在建工程</label>
							<input type="text" value=""  id="constructionProcess" name="constructionProcess" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>无形资产</label>
							<input type="text" value="<?php echo $sheet_row['intangibleAssets'];?>"  id="intangibleAssets" name="intangibleAssets" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>长期待摊费用</label>
							<input type="text" value="<?php echo $sheet_row['longdeferredExpense'];?>"  id="longdeferredExpenses" name="longdeferredExpenses" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>其它非流动资产</label>
							<input type="text" value="<?php echo $sheet_row['othernonliquidInvest'];?>"  id="othernonliquidInvest" name="othernonliquidInvest" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>总负债</label>
							<input type="text" value="<?php echo $sheet_row['grossDebt'];?>"  id="grossDebt" name="grossDebt" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>流动负债合计</label>
							<input type="text" value="<?php echo $sheet_row['currentDebt'];?>"  id="currentDebt" name="currentDebt" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>短期借款</label>
							<input type="text" value="<?php echo $sheet_row['shortLoan'];?>"  id="shortLoan" name="shortLoan" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>应付票据</label>
							<input type="text" value="<?php echo $sheet_row['notesPayables'];?>"  id="notesPayables" name="notesPayables" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>应付账款</label>
							<input type="text" value="<?php echo $sheet_row['accountsPayables'];?>"  id="accountsPayables" name="accountsPayables" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>预收账款</label>
							<input type="text" value="<?php echo $sheet_row['advanceCustomers'];?>"  id="advanceCustomers" name="advanceCustomers" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>应交税费</label>
							<input type="text" value="<?php echo $sheet_row['taxPayables'];?>"  id="taxPayables" name="taxPayables" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>其它应付款</label>
							<input type="text" value="<?php echo $sheet_row['otherPayables'];?>"  id="otherPayables" name="otherPayables" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>应付薪酬</label>
							<input type="text" value="<?php echo $sheet_row['salaries'];?>"  id="salaries" name="salaries" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>应付股利</label>
							<input type="text" value="<?php echo $sheet_row['dividendsPayables'];?>"  id="dividendsPayables" name="dividendsPayables" size="30">
						</div>
                         <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>其它流动负债</label>
							<input type="text" value="<?php echo $sheet_row['otherfloatingDebt'];?>"  id="otherfloatingDebt" name="otherfloatingDebt" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>非流动负债合计</label>
							<input type="text" value="<?php echo $sheet_row['nonfloatingDebt'];?>"  id="nonfloatingDebt" name="nonfloatingDebt" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>长期借款</label>
							<input type="text" value="<?php echo $sheet_row['longLoan'];?>"  id="longLoan" name="longLoan" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>其它非流动负债</label>
							<input type="text" value="<?php echo $sheet_row['othernonfloatingDebt'];?>"  id="othernonfloatingDebt" name="othernonfloatingDebt" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>所有者权益合计</label>
							<input type="text" value="<?php echo $sheet_row['ownerEquity'];?>"  id="ownerEquity" name="ownerEquity" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>实收资本</label>
							<input type="text" value="<?php echo $sheet_row['paidinCapital'];?>"  id="paidinCapital" name="paidinCapital" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>资本公积</label>
							<input type="text" value="<?php echo $sheet_row['contributedSurplus'];?>"  id="contributedSurplus" name="contributedSurplus" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>盈余公积</label>
							<input type="text" value="<?php echo $sheet_row['reservedSurplus'];?>"  id="reservedSurplus" name="reservedSurplus" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>未分配利润</label>
							<input type="text" value="<?php echo $sheet_row['undistributedProfit'];?>"  id="undistributedProfit" name="undistributedProfit" size="30">
						</div>
                        <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>负债和所有者权益</label>
							<input type="text" value="<?php echo $sheet_row['debtownerequityTotal'];?>"  id="debtownerequityTotal" name="debtownerequityTotal" size="30">
						</div>
                         <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>资产负债率</label>
							<input type="text" value="<?php echo $sheet_row['assetliabilityRatio'];?>"  id="assetliabilityRatio" name="assetliabilityRatio" size="30">
						</div>
                         <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>流动比率</label>
							<input type="text" value="<?php echo $sheet_row['liquidityRatio'];?>"  id="liquidityRatio" name="liquidityRatio" size="30">
						</div>
                         <div class="field mobile">
							<label for="settings-mobile"><span class="red">*</span>速动比率</label>
							<input type="text" value="<?php echo $sheet_row['quickRatio'];?>"  id="quickRatio" name="quickRatio" size="30">
						</div>
                        
					</td>
					<!--<td class="pt10" valign="top" style="width:170px;">
							<img id="avatar" src="images/60virtual_avatar_middle.jpg" />
							<div class="blank"></div>
							<label class="fileupload" onclick="upd_file(this,'avatar_file',60);">
							<input type="file" class="filebox" name="avatar_file" id="avatar_file"/>
							
							</label>
							<label class="fileuploading hide" ></label>							
					</td>-->
				</tr>
				<tr>
					<td colspan="2">
						<div class="blank"></div>
						<div class="clearfix b" style="padding: 10px 90px">请确保您填写的资料真实有效，所有资料将会严格保密。一旦被发现所填资料有虚假，将会影响您在秉信成金融的信用，对以后借款造成影响。</div>
						<div class="blank"></div>
					</td>
				</tr>
				
			</table>
						
			<div class="blank"></div>
	</div>
	<div class="inc_foot"></div>
</div>
</form>
</div>
<script type="text/javascript" src="js/ajaxupload.js"></script>
<script type="text/javascript">
function setPhone(){
	var frphone = $.trim($("#frphone").val());
	var numphone = $.trim($("#numphone").val());
	if(frphone!=""&&numphone!=""){
		$("#phone").val(frphone+"-"+numphone);
	}
	else{
		$("#phone").val("");
	}
}
$(document).ready(function(){

	$("#settings-submit").click(function(){
				if($.trim($("#settings-password").val())!=''&&!$.minLength($("#settings-password").val(),4,false))
		{
			$("#settings-password").focus();
			$.showErr("密码格式错误，请重新输入");	
			return false;
		}
		
		if($("#settings-password-confirm").val() != $("#settings-password").val())
		{
			$("#settings-password-confirm").focus();
			$.showErr("密码确认失败");			
			return false;
		}
		
					
		
			
		
					if($.trim($("#settings-mobile").val()).length == 0)
			{
				$("#settings-mobile").focus();
				$.showErr("手机号码不能为空");
				
				return false;
			}
				
		if($("select[name='byear']").val()== 0||$("select[name='bmonth']").val() == 0||$("select[name='bday']").val() == 0)
		{
			$("select[name='byear']").focus();
			$.showErr("出生日期不能为空");
			
			return false;
		}
		
		
		if($("#settings-graduatedyear").val() == ""){
			$("#settings-graduatedyear").focus();
			$.showErr("入学年份不能为空");
			
			return false;
		}
		
		var is_marriage = false;
		$("input[name='marriage']").each(function(){
			if($(this).attr("checked")==true){
				is_marriage = true;
			}
		});
		
		if(!is_marriage){
			$.showErr("婚姻状况不能为空");
			return false;
		}
		var is_haschild
		$("input[name='haschild']").each(function(){
			if($(this).attr("checked")==true){
				is_haschild = true;
			}
		});
		
		if(!is_haschild){
			$.showErr("有无子女不能为空");
			return false;
		}
		
		if($.trim($("#settings-graduation").val()).length == 0){
			$("#settings-graduation").focus();
			$.showErr("最高学历不能为空");
			
			return false;
		}
		
									if($("select[name='n_province_id']").val()== 0||$("select[name='n_city_id']").val() == 0)
		{
			$("select[name='n_province_id']").focus();
			$.showErr("籍贯不能为空");
			
			return false;
		}
		if($("select[name='province_id']").val()== 0||$("select[name='city_id']").val() == 0)
		{
			$("select[name='province_id']").focus();
			$.showErr("户口所在地不能为空");
			
			return false;
		}
		
		if($.trim($("#settings-address").val()).length == 0){
			$("#settings-address").focus();
			$.showErr("居住地址不能为空");
			
			return false;
		}

	});
});

function upd_file(obj,file_id,uid)
{	
	$("input[name='"+file_id+"']").bind("change",function(){			
		$(obj).hide();
		$(obj).parent().find(".fileuploading").removeClass("hide");
		$(obj).parent().find(".fileuploading").removeClass("show");
		$(obj).parent().find(".fileuploading").addClass("show");
		  $.ajaxFileUpload
		   (
			   {
				    url:APP_ROOT+'/index.php?ctl=avatar&act=upload&uid='+uid,
				    secureuri:false,
				    fileElementId:file_id,
				    dataType: 'json',
				    success: function (data, status)
				    {
				   		$(obj).show();
				   		$(obj).parent().find(".fileuploading").removeClass("hide");
						$(obj).parent().find(".fileuploading").removeClass("show");
						$(obj).parent().find(".fileuploading").addClass("hide");
				   		if(data.status==1)
				   		{
				   			document.getElementById("avatar").src = data.middle_url+"?r="+Math.random();
				   		}
				   		else
				   		{
				   			$.showErr(data.msg);
				   		}
				   		
				    },
				    error: function (data, status, e)
				    {
						$.showErr(data.responseText);;
				    	$(obj).show();
				    	$(obj).parent().find(".fileuploading").removeClass("hide");
						$(obj).parent().find(".fileuploading").removeClass("show");
						$(obj).parent().find(".fileuploading").addClass("hide");
				    }
			   }
		   );
		  $("input[name='"+file_id+"']").unbind("change");
	});	
}

//切换地区
$(document).ready(function(){	
		$("select[name='province_id']").bind("change",function(){
			load_city($("select[name='province_id']"),$("select[name='city_id']"));
		});
		$("select[name='n_province_id']").bind("change",function(){
			load_city($("select[name='n_province_id']"),$("select[name='n_city_id']"));
		});
		
		$("input[name='hashouse']").click(function(){
			if($(this).val()==1){
				$("input[name='houseloan']").attr("disabled",false);
			}
			else{
				$("input[name='houseloan']").attr("disabled",true);
				$("#houseloan_1").attr("checked",false);
				$("#houseloan_0").attr("checked",true);
			}
		});
		
		$("input[name='hascar']").click(function(){
			if($(this).val()==1){
				$("input[name='carloan']").attr("disabled",false);
			}
			else{
				$("input[name='carloan']").attr("disabled",true);
				$("#carloan_1").attr("checked",false);
				$("#carloan_0").attr("checked",true);
			}
		});
	});
	
	function load_city(pname,cname)
	{
		var id = pname.val();
		var evalStr="regionConf.r"+id+".c";

		if(id==0)
		{
			var html = "<option value='0'>="+LANG['SELECT_PLEASE']+"=</option>";
		}
		else
		{
			var regionConfs=eval(evalStr);
			evalStr+=".";
			var html = "<option value='0'>="+LANG['SELECT_PLEASE']+"=</option>";
			for(var key in regionConfs)
			{
				html+="<option value='"+eval(evalStr+key+".i")+"'>"+eval(evalStr+key+".n")+"</option>";
			}
		}
		cname.html(html);
	}
	function idcheck(o){
	   var str=o.value;
	   var byear=$("select[name='byear']");
	   var bmonth=$("select[name='bmonth']");
	   var bday=$("select[name='bday']");
		if(str.length==15){
	    	var re=/\d{6}(\d{2})([01]\d)([0123]\d)\d{3}/;
			var id=re.exec(str);
			byear.val(19+id[1]);
			bmonth.val(id[2]);
			bday.val(id[3]);
			alert(id[2]);
		}else if(str.length==18){
			var re=/\d{6}([12]\d{3})([01]\d)([0123]\d)\d{3}(\d|\w)/;
			var id=re.exec(str);
			byear.val(id[1]);
			bmonth.val(id[2]);
			bday.val(id[3]);
		}else{
			byear.val("");
			bmonth.val("");
			bday.val("");
			return false;	
		}
	
	 }
</script></div>
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
