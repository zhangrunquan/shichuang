<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>
    <style>
        body {
            margin: 0px;
            padding: 0px;
            border: 0px;
        }

        a:link {
            text-decoration: none;
            color: black;
        }

        a:visited {
            text-decoration: none;
            color: black;
        }

        a:hover {
            text-decoration: none;
            color: black;
        }

        a:active {
            text-decoration: none;
            color: black;
        }

        h1 {
            margin: 0px;
            padding: 0px;
            border: 0px;
            text-align: center;
            line-height: 100px;
        }

        #top {
            background-color: #C0C0C0;
            margin: 0px;
            height: 100px;
        }

        #login {
            width: 600px;
            margin: 0 auto;
            padding: 40px 0px;
        }

        #login_logo {
            text-align: center;
            margin-top: 20px;
        }

        #login_font {
            font-size: 30px;
            text-align: center;
        }

        .login_input1 {
            display: block;
            width: 350px;
            height: 30px;
            padding: 20px 20px;
            margin-left: auto;
            margin-right: auto;
            background-color: white;
            text-align: left;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border: 1px solid #fff;
            outline: none;
            margin: 0px auto;
            color: #999;
        }

        .login_input1 {
            border-top: 2px solid #30a5ff;
            border-left: 2px solid #30a5ff;
            border-right: 2px solid #30a5ff;
            border-bottom: 1.5px solid #30a5ff;
        }

        .login_input2 {
            display: block;
            width: 350px;
            height: 30px;
            padding: 20px 20px;
            margin-left: auto;
            margin-right: auto;
            background-color: white;
            text-align: left;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            border: 2px solid #fff;
            outline: none;
            margin: 0px auto;
            color: #999;
        }

        .login_input2 {
            border-top: 1px solid #30a5ff;
            border-left: 2px solid #30a5ff;
            border-right: 2px solid #30a5ff;
            border-bottom: 2px solid #30a5ff;
        }
    </style>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div id="top"><h1>形成性评价系统</h1></div>
<div class="btn-group">
    <button type="button" class="btn btn-default" style="left:250px"><a href="Sgc.php">课程及评价角度</a></button>
    <button type="button" class="btn btn-default" style="left:550px">评价内容</button>
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="left:900px">
            学生成绩查看
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" style="left:900px;position:absolute;">
            <li><a href="Sgc.html">总评结果</a></li>
            <li><a href="Sme.html">学生自评</a></li>
            <li><a href="Sse.html">小组互评</a></li>
        </ul>
    </div>
</div>
<div style="padding:100px;height:550px;width:500px;">
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
    $href_ar=['出勤及课堂表现.html','个人作业.html','小组作业.html'];
    $row_num=[3,8,15];
    //$row_num=[1,2,1];
    $count_i=0;
    $index=0;
    $length = count($arr1);
    for ($x = 0; $x < $length; $x++) {
        if($x==0){
            echo '<a'.' href="'.$href_ar[$count_i].'"'.'>'.$arr1[$x].'</a>'.' ';
            $index+=$row_num[$count_i++]*$COLNUM;
            continue;
        }
        if($x==$index){
            echo '<a'.' href="'.$href_ar[$count_i].'"'.'>'.$arr1[$x].'</a>'.' ';
            if($count_i<count($row_num)-1){
                $index+=$row_num[$count_i++]*$COLNUM;
            }
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
</div>

</body>
</html>
	



