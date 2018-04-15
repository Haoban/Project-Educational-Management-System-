<?php
session_start();
ini_set("error_reporting","E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED");
$databaseConnection = mysql_connect("127.0.0.1", "root", "15130188024");
$db = "educationsystem";
mysql_select_db($db, $databaseConnection);
mysql_query("set names 'utf8'");
$userid = $_SESSION['username'];
$sql = "SELECT * FROM student WHERE stu_num = '$userid'";
$result = mysql_query($sql, $databaseConnection);
$stu_name = mysql_result($result, 0, 1);
$stu_eamil = mysql_result($result, 0, 12);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>成绩查询页面</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="js/plugins/jquery.flot.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.flot.pie.js"></script>
<script type="text/javascript" src="js/plugins/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/charts.js"></script>
<script type="text/javascript" src="js/custom/tables.js"></script>
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/plugins/excanvas.min.js"></script><![endif]-->
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

<body>
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
                    <span class="email"><?php echo $stu_eamil; ?></span>
                    <ul>
                        <li><a href="index.html">Sign Out</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    
    <div class="header">
    	<ul class="headermenu">
            <li><a href="person.<?php  ?>"><span class="icon icon-flatscreen"></span>个人信息</a></li>
            <li><a href="selectcourse.php"><span class="icon icon-pencil"></span>选课管理</a></li>
            <li><a href="evaluation.php"><span class="icon icon-message"></span>教学评估</a></li>
            <li class="current"><a href="grades.php><span class="icon icon-chart"></span>成绩查询</a></li>
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
            <li><a href="grades.php">及格成绩查询</a></li>
            <li class="current"><a href="bad.php">不及格成绩查询</a></li>
            <li><a href="complete.php">方案完成情况</a></li>
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
    
    <div class="centercontent">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">不及格成绩查询</h1>
            
        </div><!--pageheader-->

        <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
        
        <div id="contentwrapper" class="contentwrapper">
            <colgroup>
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />
            </colgroup>
            <thead>
                <tr>
                    <th class="head0">课程号</th>
                    <th class="head1">课程名</th>
                    <th class="head0">学分</th>
                    <th class="head1">课程属性</th>
                    <th class="head0">成绩</th>
                </tr>
                <?php
                $usernewid = $_SESSION['username'];
                $newresult = mysql_query( "SELECT * FROM stu_score WHERE stu_number = '$usernewid' AND score < 60 ");
                while($row = mysql_fetch_array($newresult))
                {
                ?>
                <tr>
                    <td class="head0" ><?php echo $row[course_id]; ?></td>
                    <td class="head1"><?php echo $row[course_name]; ?></td>
                    <td class="head0"><?php echo $row[course_id]; ?></td>
                    <td class="head1"><?php echo $row[course_id]; ?></td>
                    <td class="head0"><?php echo $row[score]; ?></td>
                </tr>
                <?php
                }  
                    mysql_close($databaseConnection);
                ?>
            </thead>
        </div><!--contentwrapper-->
    
    </div><!--centercontent-->
    
    
</div><!--bodywrapper-->

</body>
</html>
