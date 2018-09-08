<?php
    //判断uname和pwd是否赋值
    if(isset($_POST['username']) && isset($_POST['password'])){
        $name = $_POST['username'];
        $pwd = $_POST['password'];
        $sid=$name;
        session_id($sid);
        session_start();
        //连接数据库
        require_once 'mysqllink.php';
        //验证内容是否与数据库的记录吻合。
        $query = "SELECT * FROM account WHERE (username='$name') AND (password='$pwd') limit 1";
        $result = mysqli_query($link,$query);
        //判断结果集的记录数是否大于0
        if ($result->num_rows > 0) {
            $row=mysqli_fetch_assoc($result);
            //将信息存储到session
            foreach ($row as $key => $value){
                $_SESSION[$key]=$value;
            }
            //抹掉密码
            $_SESSION['password']='';
            if($row['role']=='teacher'){
                header("Location:Te.php?sid=".$sid);
            } else{
                header("Location:student.php?sid=".$sid);
            }
        } else {
           echo "<script language=\"JavaScript\">alert(\"账号或密码错误\");</script>";
        }
    }
?>
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
</head>
<body>
	<div id="top"><h1>形成性评价系统</h1></div>
	<div id="login">
		<div id="login_font">用户登录</div>
	</div>
<form  method="post">
	    <input class="login_input1" type="text" placeholder="用户名" name="username">
	    <input class="login_input2" type="password" placeholder="密码" name="password">
    <div class="btn-group">
	<button type="button" class="btn btn-default dropdown-toggle" 
			data-toggle="dropdown" class="login_btn1" style="position:absolute;left:590px;width:150px;">
		注册 
	</button>
	
    </div>
<div class="btn-group">
	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="position:absolute;left:790px;width:150px;">登录 
		<span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu" style="position:absolute;left:790px;top:32px;width:150px;">
		<li style="width:150px;"><input type="submit"  value="教师登陆" /></li>
		<li style="width:150px;"><input type="submit"  value="学生登陆" /></li>
	</ul>
</div>
</form>
</body>
</html>
	



