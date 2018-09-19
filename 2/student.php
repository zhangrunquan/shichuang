<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="css/style.css" type="text/css" rel="stylesheet"/>
	<style>
	 body{margin:0px;padding:0px;border:0px;}
	 h1{margin:0px;padding:0px;border:0px;text-align:center;line-height: 100px;}
	 #top{background-color:#C0C0C0;margin:0px;height:100px;}
     #login{width:600px;margin:0 auto;padding:40px 0px;}
     #login_logo{text-align:center; margin-top:20px;}
     #login_font{font-size:30px;text-align:center;}
     .login_input1{ display:block; width:350px; height:30px; padding:20px 20px;margin-left:auto;margin-right:auto; background-color:white; text-align:left; 
     	 border-top-left-radius:10px; border-top-right-radius:10px; border:1px solid #fff; outline:none;  margin:0px auto; color:#999;}
     .login_input1{border-top:2px solid #30a5ff;
                   border-left:2px solid #30a5ff;
                   border-right:2px solid #30a5ff;
                   border-bottom:1.5px solid #30a5ff;}
     .login_input2{ display:block; width:350px; height:30px; padding:20px 20px;margin-left:auto;margin-right:auto; background-color:white; text-align:left; 
     	 border-bottom-left-radius:10px; border-bottom-right-radius:10px; border:2px solid #fff; outline:none;  margin:0px auto; color:#999;}
     .login_input2{border-top:1px solid #30a5ff;
                   border-left:2px solid #30a5ff;
                   border-right:2px solid #30a5ff;
                   border-bottom:2px solid #30a5ff;}
    </style>
    <script>
function goBack()
  {
  window.history.back()
  }

</script>
    <script src="jquery-3.3.1.min.js"></script>
    <script src="student.js"></script>
</head>
<body>
  <?php
   session_start();
  ?>
	<div id="top"><h1>形成性评价系统</h1></div>
	<a id="查看成绩" ><button type="button" style="position:absolute;left:650px;top:120px;width:150px;">查看成绩</button></a>
  <!--<button style="display: none" id="互评"><a id="link">小组互评</a></button>-->
	<table width="100%" border="1" cellspacing="1" cellpadding="4" bgcolor="#cccccc" class="tabtop13" align="center">


        <?php
        $COLNUM=3;
        require_once 'mysqllink.php';
        // 检测连接
        if ($link->connect_error) {
            die("连接失败: " . $link->connect_error);
        }
        mysqli_query($link, "SET NAMES 'utf8'");
        $sql = "SELECT content,id FROM standard order by id desc limit 1";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            // 输出数据
            while ($row = $result->fetch_assoc()) {
                $str = $row["content"];
            }
        } else {
            echo "0 结果";
            exit();
        }
        $arr1 = explode(',', $str);
        $row_num=[3,8,15];
        $length = count($arr1);
        for ($x = 0; $x < $length; $x++) {
            if($x==33){
                echo '<a href="#" id="xiaozuzuoye">'.$arr1[$x].'</a>'.' ';
                continue;
            }
            if ($arr1[$x] == '') {
                echo "&nbsp" . " ";
            } else {
                echo $arr1[$x] . " ";
            }
            if ($x % $COLNUM == $COLNUM-1) {
                echo "<br>";
            }
        }
        ?>
        <!--
        <?php
        require_once 'mysqllink.php';
        // 检测连接
        if ($link->connect_error) {
            die("连接失败: " . $link->connect_error);
        }
        mysqli_query($link, "SET NAMES 'utf8'");
        $sql = "SELECT content,id FROM standard order by id desc limit 1";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            // 输出数据
            while ($row = $result->fetch_assoc()) {
                $str = $row["content"];
            }
        } else {
            echo "0 结果";
            exit();
        }
        $arr1 = explode(',', $str);

        $length = count($arr1);
        for ($x = 0; $x < $length; $x++) {
            if($x%7==0){
                echo '<a>'.$arr1[$x].'</a>'.' ';
                continue;
            }
            if ($arr1[$x] == '') {
                echo "&nbsp" . " ";
            } else {
                echo $arr1[$x] . " ";
            }
            if ($x % 7 == 6) {
                echo "<br>";
            }
        }
        ?>
        -->
    </table>
	<div class="btn-group">
	<!--<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="position:absolute;left:550px;width:150px;top:250px">小组作业
		<span class="caret"></span>
	</button>-->
	<ul class="dropdown-menu" role="menu" style="position:absolute;left:550px;top:282px;width:150px;">
		<li style="width:150px;"><a href="个人自评.html">个人自评</a></li>
		<li style="width:150px;"><a href="小组互评.html">小组互评</a></li>
	</ul>
    </div>
	<button type="button" style="position:absolute;left:650px;width:150px;top:700px">完成</button>
	<button type="button" onclick="goBack()" style="position:absolute;left:820px;width:150px;top:700px">返回上一级</button>
  <?php
    require_once 'mysqllink.php';
    // 检测连接
    if ($link->connect_error) {
     die("连接失败: " . $link->connect_error);
    } 
    mysqli_query($link,"SET NAMES 'utf8'");
    $txt=$_SESSION['username'];
    echo '现在登录的账户名是'.$txt.'<br/>';
    $link->close();
  ?>


</body>
</html>
	



