<?php
session_start();
ini_set("error_reporting","E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED");
$databaseConnection = mysql_connect("127.0.0.1", "root", "15130188024");
$db = "educationsystem";
mysql_select_db($db, $databaseConnection);
mysql_query("set names 'utf8'");
$userid = $_SESSION['username'];

$elective_id = $_POST['elective_id'];
$elective_name = $_POST['elective_name'];
$elective_location = $_POST['elective_location'];
$elective_sums = $_POST['elective_sums'];
$tea_id = $_POST['tea_id'];
$credit = $_POST['credit'];
$attribute = $_POST['attribute'];
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
                <span><?php echo $userid; ?></span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
                <div class="avatar">
                    <a href=""><img src="images/thumbs/avatarbig.png" alt="" /></a>
                </div><!--avatar-->
                <div class="userdata">
                    <h4><?php echo $userid; ?></h4>
                    <span class="email">christal.ycsd@gmail.com</span>
                    <ul>
                        <li><a href="index.html">Sign Out</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    
    <div class="header">
        <ul class="headermenu">
            <li><a href="adminhome.php"><span class="icon icon-flatscreen"></span>公告发布</a></li>
            <li class="current"><a href="Aselectcourse.php"><span class="icon icon-pencil"></span>选课管理</a></li>
            <li><a href="Agrades.php"><span class="icon icon-chart"></span>成绩管理</a></li>
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
            <li class="current"><a href="courseset.php" class="elements">课程设置</a></li>
            <li><a href="coursetable.php" class="elements">课表安排</a></li>
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
    
    <div class="centercontent">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">课程设置</h1>
        </div><!--pageheader-->

<div id="contentwrapper" class="contentwrapper">
            <div>
            <span class="field">
            <form action = "insertcourse.php" method = "post">
                <label>课程号:</label>
                <input type="text" name="elective_id"  >
                <label>课程名:</label>
                <input type="text" name="elective_name">
                <label>教室:</label>
                <input type="text" name="elective_location" >
                <label>课程余量:</label>
                <input type="text" name="elective_sums" >
                <label>老师工号:</label>
                <input type="text" name="tea_id"  >
                <label>学分:</label>
                <input type="text" name="credit"  >
                <label>属性:</label>
                <input type="text" name="attribute">

                <input type = "submit" value="提交">
            </form>
                <br></br>
            </span>
            </div>

        <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
                   
        
            <colgroup>
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />
                <col class="con1" />
            </colgroup>
            <thead>
                <tr>
                    <th class="head1">课程号</th>
                    <th class="head0">课程名</th>
                    <th class="head1">教室</th>
                    <th class="head0">数量</th>
                </tr>
               <?php
               if(empty($elective_id) || empty($elective_name) || empty($elective_location) || empty($elective_sums) || empty($tea_id) || empty($credit) || empty($attribute)){
					echo "不能有空的数据" ;
				}
				else if(mysql_query("SELECT * FROM teacher WHERE $tea_id = tea_number")){
					echo "老师工号不存在!";
				}
				else{
					$sql = "INSERT INTO elective VALUES('$elective_id','$elective_name','$elective_location','$elective_sums','$tea_id','$credit','$attribute')";
					if(mysql_query($sql, $databaseConnection)){
						echo "成功";
					}

				}
               	$sql2 = "SELECT * FROM elective";
               	$result2 = mysql_query($sql2);
               	while($row = mysql_fetch_array($result2)){
               ?>
               <tr>
               	<th><?php echo $row[elective_id]; ?></th>
               	<th><?php echo $row[elective_name]; ?></th>
               	<th><?php echo $row[elective_location]; ?></th>
               	<th><?php echo $row[elective_sums]; ?></th>
               </tr>
               <?php
				}
               ?>
            </thead>

        </div><!--contentwrapper-->
        </table>
    </div><!--centercontent-->

    
</div><!--bodywrapper-->

</body>
</html>