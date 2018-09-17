<?php
require_once 'mysqllink.php';
$key=$_GET['key'];
$value=$_GET['value'];
$username = $_GET['username'];


// 检测连接
if ($link->connect_error) {
    die("连接失败: " . $link->connect_error);
}
mysqli_query($link, "SET NAMES 'utf8'");
//如果已存在记录删除之

$sql = "UPDATE totalgrade SET ".$key."='$value' WHERE name='$username'";
if ($link->query($sql) === TRUE) {
    echo "总成绩插入成功";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}


$link->close();
exit();