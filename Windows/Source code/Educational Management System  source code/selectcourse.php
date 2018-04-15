<?php
session_start();
ini_set("error_reporting","E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED");
$databaseConnection = mysql_connect("127.0.0.1", "root", "15130188024");
$db = "educationsystem";
mysql_query("set names 'utf8'");
mysql_select_db($db, $databaseConnection);
$userid = $_SESSION['username'];
$sql = "SELECT * FROM student WHERE stu_num = '$userid'";
$result = mysql_query($sql, $databaseConnection);
$stu_name = mysql_result($result, 0, 1);
$stu_eamil = mysql_result($result, 0, 12);
$sql2 = mysql_query("SELECT * FROM post ");
/*$result = mysql_query($sql, $databaseConnection);
if($result){
    //echo "OK";
}
*/
/*
$text = $_POST['statustext'];

$ansql="INSERT INTO Post(notice) value('$text')";
mysql_query($ansql);
*/
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>选课管理页面</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="js/plugins/jquery.alerts.js"></script>
<script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/blog.js"></script>
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
    <script src="js/plugins/css3-mediaqueries.js"></script>
<![endif]-->

</head>
<body class="withvernav">
<div class="bodywrapper">
    <div class="topheader">
        <div class="left">
           <h1 class="logo"><span>教务管理系统</span></h1>
            <span class="slogan">西安电子科技大学</span>
            
            <br clear="all" />
            
        </div><!--left-->
        
        <div class="right">
            <!--<div class="notification">
                <a class="count" href="notifications.html"><span>9</span></a>
            </div>
            -->
            <div class="userinfo">
                <img src="images/thumbs/avatar.png" alt="" />
                <span><?php echo $stu_name; ?></span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
                <div class="avatar">
                    <a href=""><img src="images/thumbs/avatarbig.png" alt="" /></a>
                </div><!--avatar-->
                <div class="userdata">
                    <h4><?php echo $stu_name; ?></h4>
                    <span class="email"><?php echo $stu_eamil?></span>
                    <ul>
                        <li><a href="index.html">Sign Out</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    
    <div class="header">
        <ul class="headermenu">
            <li><a href="person.php"><span class="icon icon-flatscreen"></span>个人信息</a></li>
            <li class="current"><a href="selectcourse.php"><span class="icon icon-pencil"></span>选课管理</a></li>
            <li><a href="evaluation.php"><span class="icon icon-message"></span>教学评估</a></li>
            <li><a href="grades.php"><span class="icon icon-chart"></span>成绩查询</a></li>
        </ul>
        
        <div class="headerwidget">
            <div class="earnings">
                <div class="one_half">

                    <h4>今日</h4>
                    <h3>2017.06.09</h3>
                </div><!--one_half-->
                <div class="one_half last alignright">
                    <h4>天气</h4>
                    <h3>晴</h3>
                </div><!--one_half last-->
            </div><!--earnings-->
        </div><!--headerwidget-->
        
    </div><!--header-->
    
    <div class="vernav">
        <ul>
            <li class="current"><a href="selectcourse.php" class="editor">选课公告</a></li>
            <li><a href="selectonline.php">网上选课</a></li>
            <li><a href="choice.php">选课结果</a></li>
            <li><a href="cancel.php">退课</a></li>
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
    
    <div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">选课公告</h1>
            
            <ul class="hornav blogmenu">
                <li class="current"><a href="allposts.html">公告</a></li>
            </ul>
        </div><!--pageheader-->
        
<div id="contentwrapper" class="contentwrapper">
        
          <div id="status" class="subcontent">

                <ul class="updatelist">
                    



<?php 
        while($row=mysql_fetch_array($sql2)){
?>

                    <li>
                        <div class="updatethumb"><img src="images/thumbs/avatar1.png" alt="" /></div>
                        <div class="updatecontent">
                            <div class="top">
                                <a href="" class="user">Admin</a> - <span>1 minutes ago</span>
                            </div><!--top-->
                            <div class="text">
                                 <?php echo $row[notice];?>
                            </div><!--text-->
                        </div><!--updatecontent-->
                    </li>

<?php 
}
?>              
                    <li>
                        <div class="updatethumb"><img src="images/thumbs/avatar1.png" alt="" /></div>
                        <div class="updatecontent">
                            <div class="top">
                                <a href="" class="user">Admin</a> - <span>7 minutes ago</span>
                            </div><!--top-->
                            <div class="text">
                                2017.3.10-2017.4.10大二选修课系统开启。 
                            </div><!--text-->
                        </div><!--updatecontent-->
                    </li>
                    
                    <li>
                        <div class="updatethumb"><img src="images/thumbs/avatar1.png" alt="" /></div>
                        <div class="updatecontent">
                            <div class="top">
                                <a href="" class="user">Admin</a> - <span>1 year ago</span>
                            </div><!--top-->
                            <div class="text">2015-1016第二学期校历已发布。</div><!--text-->
                        </div><!--updatecontent-->
                    </li>
             
              </ul>
                                                        
                    <br clear="all" /><br />
                    
                </div><!-- #updates -->
        
        </div><!--contentwrapper-->
            <br clear="all" />
        
  </div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

</body>
</html>