<?php
require_once 'mysqllink.php';
$q = $_GET["q"];
$table = $_GET['table'];
$username = $_GET['username'];


// 检测连接
if ($link->connect_error) {
    die("连接失败: " . $link->connect_error);
}
mysqli_query($link, "SET NAMES 'utf8'");
//如果已存在记录删除之

$sql = "insert into " . $table . "(username,content) values('$username','$q') ON DUPLICATE KEY UPDATE username='$username',content='$q'";
if ($link->query($sql) === TRUE) {
    echo "新记录插入成功";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}


$link->close();
exit();