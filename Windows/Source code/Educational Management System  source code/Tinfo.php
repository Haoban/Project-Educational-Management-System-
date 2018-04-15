<?php
session_start();
ini_set("error_reporting","E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED");
$databaseConnection = mysql_connect("127.0.0.1", "root", "15130188024");
$db = "educationsystem";
mysql_select_db($db, $databaseConnection);
mysql_query("set names 'utf8'");
$userid = $_SESSION['username'];
$sql = "SELECT * FROM teacher WHERE tea_number = '$userid'";
$result = mysql_query($sql, $databaseConnection);
$teacher_name = mysql_result($result, 0, 0);
$teacher_email = mysql_result($result, 0, 12);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>个人信息页面</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.flot.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.slimscroll.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/dashboard.js"></script>
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
                    <span class="email"><?php echo $teacher_email; ?></span>
                    <ul>
                        <li><a href="index.html">Sign Out</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    
    <div class="header">
    	<ul class="headermenu">
        	<li class="current"><a href="Tperson.php"><span class="icon icon-flatscreen"></span>个人信息</a></li>
            <li><a href="Tselectcourse.php"><span class="icon icon-pencil"></span>选课管理</a></li>
            <li><a href="Tgrades.php"><span class="icon icon-chart"></span>成绩录入</a></li>
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
    
    <div class="vernav2 iconmenu">
    	<ul>
            <li class="current"><a href="Tinfo.html" class="elements">教职工信息</a></li>
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->
        
    <div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">教职工信息</h1>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
        
        	<div class="contenttitle2">
                    <h3>基本信息</h3>
                </div><!--contenttitle-->
                    
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable">
            
                    <thead>
                        <tr>
                            <th class="head0">姓名:</th>
                            <td class="head0"><?php echo mysql_result($result,0,0); ?></td>
                        </tr>
                            <th class="head1">工号:</th>
                            <td class="head1"><?php echo mysql_result($result,0,1); ?></td>
                        </tr>
                            <th class="head0">性别:</th>
                            <td class="head0"><?php echo mysql_result($result,0,2); ?></td>
                        </tr>
                            <th class="head1">民族:</th>
                            <td class="head1"><?php echo mysql_result($result,0,3); ?></td>
                        </tr>
                            <th class="head0">出生日期:</th>
                            <td class="head0"><?php echo mysql_result($result,0,4); ?></td>
                        </tr>
                            <th class="head1">通讯地址:</th>
                            <td class="head1"><?php echo mysql_result($result,0,5); ?></td>
                        </tr>
                            <th class="head0">身份证号:</th>
                            <td class="head0"><?php echo mysql_result($result,0,6); ?></td>
                        </tr>
                            <th class="head1">籍贯:</th>
                            <td class="head1"><?php echo mysql_result($result,0,7); ?></td>
                        </tr>
                            <th class="head0">政治面貌:</th>
                            <td class="head0"><?php echo mysql_result($result,0,8); ?></td>
                        </tr>
                            <th class="head1">老师类别:</th>
                            <td class="head1"><?php echo mysql_result($result,0,9); ?></td>
                        </tr>
                            <th class="head0">学历:</th>
                            <td class="head0"><?php echo mysql_result($result,0,10); ?></td>
                        </tr>
                            <th class="head0">职称:</th>
                            <td class="head0"><?php echo mysql_result($result,0,11); ?></td>
                        </tr>
                    </thead>
        </table>
        </div><!--contentwrapper-->
        
        <br clear="all" />
        
	</div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

</body>
</html>
