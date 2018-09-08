<head>
    <meta charset="utf-8"> 
</head>
<?php
    // Session需要先启动。
    session_start();
    //判断uname和pwd是否赋值
    if(isset($_POST['username']) && isset($_POST['password'])){
        $name = $_POST['username'];
        $pwd = $_POST['password'];
        //连接数据库
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //验证内容是否与数据库的记录吻合。
        $sql = "SELECT * FROM teacher-name WHERE (username='$name') AND (password='$pwd')";
        //执行上面的sql语句并将结果集赋给result。
        $result = $conn->query($sql);
        //判断结果集的记录数是否大于0
        if ($result->num_rows > 0) {
            $_SESSION['username'] = $name;
            header("Location:Te.html");
            // 输出每行数据
            
        } else {
           echo "<script language=\"JavaScript\">alert(\"账号或密码错误\");</script>";
        }
        $conn->close();       
    }
?>