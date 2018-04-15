<?php
session_start();
ini_set("error_reporting","E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED");
$databaseConnection = mysql_connect("127.0.0.1", "root", "15130188024");      //连接数据库
$db = "educationsystem";
mysql_query("set names 'utf8'");
mysql_select_db($db,$databaseConnection);
$stu_num = $_POST['stu_num'];
$course_id = $_POST['course_id'];
$score = $_POST['score'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>录入成绩页面</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="js/plugins/jquery.alerts.js"></script>
<script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/blog.js"></script>
<script type="text/javascript" src="js/custom/tables.js"></script>
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
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
                <span><?php echo $teacher_name; ?></span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
                <div class="avatar">
                    <a href=""><img src="images/thumbs/avatarbig.png" alt="" /></a>
                </div><!--avatar-->
                <div class="userdata">
                    <h4><?php echo $teacher_name; ?></h4>
                    <span class="email"><?php echo $teacher_name; ?></span>
                    <ul>
                        <li><a href="index.html">Sign Out</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    
    <div class="header">
        <ul class="headermenu">
            <li><a href="Tperson.php"><span class="icon icon-flatscreen"></span>个人信息</a></li>
            <li><a href="Tselectcourse.php"><span class="icon icon-pencil"></span>选课管理</a></li>
            <li class="current"><a href="Tgrades.php"><span class="icon icon-chart"></span>成绩录入</a></li>
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
            <li class="current"><a href="Tgrades.php" class="editor">录入成绩</a></li>
            <li><a href="Tstatistics.php">成绩统计</a></li>
            <li><a href="Tmakeup.php">补考安排</a></li>
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
    
    <div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">录入成绩</h1>
        </div><!--pageheader-->
        <div id="contentwrapper" class="contentwrapper">
        
            <form action = "insertgrades.php" method = "post">
            <span class="field">
                <label>课程号:</label>
                <input type="text" name="stu_num" class="longinput" />
                <label>学号:</label>
                <input type="text" name="course_id" class="longinput" />
                <label>分数:</label> 
                <input type="text" name="score" class="longinput" />
                <input type="submit" value="提交"  />
                <br><label>
				<?php
				$result0 = mysql_query("SELECT course_id FROM course WHERE course_id = $course_id");

				if(empty($stu_num) || empty($course_id) || empty($score)){
	echo "失败";
}
else{
$sql = "INSERT INTO stu_score(stu_num,course_id,score)VALUES('$stu_num', '$course_id', '$score')";
$result = mysql_query($sql, $databaseConnection);
if($result){
	echo "OK";
}
}
?>


                </label></br>
            </span>
            </form>

            
            
        <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
                   
        <div id="contentwrapper" class="contentwrapper">
            <colgroup>
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />
                <col class="con1" />
            </colgroup>
            <thead>
                <tr>
                    <th class="head0">课程名</th>
                    <th class="head1">学院</th>
                    <th class="head0">班级</th>
                    <th class="head1">学生姓名</th>
                    <th class="head0">学生学号</th>
                    <th class="head1">分数</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                    <th class="head0">English</th>
                    <th class="head1">软件学院</th>
                    <th class="head0">1513018</th>
                    <th class="head1">曹俊</th>
                    <th class="head0">15130188024</th>
                    <th class="head1">100</th>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th class="head0">课程名</th>
                    <th class="head1">学院</th>
                    <th class="head0">班级</th>
                    <th class="head1">学生姓名</th>
                    <th class="head0">学生学号</th>
                    <th class="head1">分数</th>
                </tr>
            </tfoot>


        </div><!--contentwrapper-->
    
    </div><!--centercontent-->
    
    
</div><!--bodywrapper-->

</body>
</html>

