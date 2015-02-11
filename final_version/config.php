<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "1qaz2wsx";
$mysql_database = "bxc";

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Mysql Error!");
mysql_select_db($mysql_database, $bd) or die("Mysql No DB Error!");

mysql_query('SET NAMES UTF8');
?>