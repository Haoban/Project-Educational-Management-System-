<?php
session_start();
ini_set("error_reporting","E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED");
$databaseConnection = mysql_connect("127.0.0.1", "root", "15130188024");      //连接数据库
$db = "educationsystem";
mysql_query("set names 'ut8'");
$elective_id = $_POST['elective_id'];
$elective_name = $_POST['elective_name'];
$stu_num = $_SESSION['username'];
$sql1 = "SELECT stu_name FROM stu_elective WHERE stu_num = '$stu_num'";
$stu_name = mysql_query($sql1, $databaseConnection);
//判断课余量是否充足
$rest = mysql_query("SELECT elective_sums FROM elective WHERE elective_id = '$elective_id' ",$databaseConnection);
if($rest > 1){
	$sql2 = "INSERT INTO stu_elective VALUES($stu_num,$elective_id,elective_name,$stu_name)";
	mysql_query($sql2,$databaseConnection);
	mysql_query("UPDATE elective SET elective_sums = elective_sums-1 WHERE elective_id = '$elective_id'",$databaseConnection);
}
mysql_close($databaseConnection);
?>