<?php
session_start();
ini_set("error_reporting","E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED");
$databaseConnection = mysql_connect("127.0.0.1", "root", "15130188024");      //连接数据库
$db = "educationsystem";
mysql_query("set names 'ut8'");

$elective_id = $_GET['elective_id'];
$elective_name = $_GET['elective_name'];
$elective_location = $_GET['elective_location'];
$elective_sums = $_GET['elective_sums'];
$tea_id = $_GET['tea_id'];
$credit = $_GET['credit'];
$attribute = $_GET['attribute'];

echo $elective_id;
echo $elective_name;

mysql_select_db($db,$databaseConnection);
$sql = "INSERT INTO elective VALUE('$elective_id','$elective_name','$elective_location','$elective_sums','$tea_id','credit','$attribute')";
//$sql = "INSERT INTO elective VALUES('XH2002','信号','B510','5','abc123','5','0')";
$result = mysql_query($sql, $databaseConnection);
if($result){
	$reback = 1;
}
else{
	$reback = 0; 
}
echo $reback;
mysql_close($databaseConnection);
?>