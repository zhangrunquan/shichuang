<?php
require_once 'mysqllink.php';
$g1=$_GET['g1'];
$g2=$_GET['g2'];
$g3=$_GET['g3'];
$g4=$_GET['g4'];
$username=$_GET['username'];
$pingjiazu=$_GET['pingjiazu'];
$beipingzu=$_GET['beipingzu'];

// 检测连接
if ($link->connect_error) {
    die("连接失败: " . $link->connect_error);
}
mysqli_query($link, "SET NAMES 'utf8'");
//如果已存在记录删除之


$sql = "insert into huping(pingjiazu,beipingzu,g1,g2,g3,g4) VALUES ('$pingjiazu','$beipingzu','$g1','$g2','$g3','$g4')";
if ($link->query($sql) === TRUE) {
    echo "新记录插入成功";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}


$link->close();
exit();