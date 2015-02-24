<?php
include('config.php');
error_reporting(E_ALL ^ E_NOTICE);
/* User Statistics */
$sql_user="SELECT * FROM users";
$result_user=mysql_query($sql_user);
$count_user=mysql_num_rows($result_user);

/* Org Statistics */
$sql_org="SELECT * FROM organization where groupID=1";
$result_org=mysql_query($sql_org);
$count_org=mysql_num_rows($result_org);

/* Bank Statistics */
$sql_bank="SELECT * FROM organization where groupID=2";
$result_bank=mysql_query($sql_bank);
$count_bank=mysql_num_rows($result_bank);

/* Insurance Statistics */
$sql_insurance="SELECT * FROM organization where groupID=3";
$result_insurance=mysql_query($sql_insurance);
$count_insurance=mysql_num_rows($result_insurance);

/* Loans Statistics */
$sql_loan="SELECT * FROM t_loan";
$result_loan=mysql_query($sql_loan);
$count_loan=mysql_num_rows($result_loan);
$sum_loan=0;
while($row_lown=mysql_fetch_array($result_loan))
{
	$sum_loan=$sum_loan+$row_lown['total'];
}
?>

