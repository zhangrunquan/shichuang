<?php
require_once 'mysqllink.php';
// 检测连接
if ($link->connect_error) {
    die("连接失败: " . $link->connect_error);
}
mysqli_query($link, "SET NAMES 'utf8'");

$sql = "SELECT * FROM totalgrade";
$result = mysqli_query($link,$sql);
if(!$result){
    echo 'err 1';
}

$info=[];
$i=0;
if ($result->num_rows > 0) {
    // 输出数据
    while ($row = $result->fetch_assoc()) {
        foreach ($row as $key=>$value){
            $info[$i++][$key]=$value;
        }
        echo json_encode($info);
    }
} else {
    echo json_encode("0 结果");
}
$link->close();
