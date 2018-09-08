<?php
    require_once 'mysqllink.php';
    // 检测连接
    if ($link->connect_error) {
        die("连接失败: " . $link->connect_error);
    }
    mysqli_query($link, "SET NAMES 'utf8'");
    //$sql = "SELECT content,id FROM standard order by id desc limit 1";
    $sql = "SELECT content FROM chuqin WHERE username='stu4'limit 1";
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