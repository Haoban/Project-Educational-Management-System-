<?php
session_start();
ini_set("error_reporting","E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED");
$databaseConnection = mysql_connect("127.0.0.1", "root", "15130188024");
$db = "educationsystem";
mysql_select_db($db, $databaseConnection);
$username = $_POST['username'];
$password = $_POST['password'];

//连接数据库服务器
//判断用户输入是否正确
$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$resultSet = mysql_query($sql,$databaseConnection);
$identity = mysql_result($resultSet,0,2);
if(mysql_num_rows($resultSet) > 0){
    $_SESSION['username'] = $_POST['username'];
    switch($identity){
        case 0:
            header("Location:http://localhost:8024/educationsystem2/JWXT/adminhome.php");
            break;
        case 1:
            header("Location:http://localhost:8024/educationsystem2/JWXT/Tperson.php");
            break;
        case 2:
            header("Location:http://localhost:8024/educationsystem2/JWXT/person.php");
            break;
    }
}
else{
    header("Location:http://localhost:8024/educationsystem2/JWXT/index2.html");
}
closeConnection();

?>