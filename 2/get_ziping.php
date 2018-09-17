<?php
$username=$_GET['username'];
require_once 'mysqllink.php';

// 检测连接
if ($link->connect_error) {
    die("连接失败: " . $link->connect_error);
}
mysqli_query($link, "SET NAMES 'utf8'");


$query="SELECT (username,g1,g2,g3,g4) FROM ziping WHERE username='$username' limit 1";
$res=mysqli_query($link,$query);
mysqli_close($link);

if(!$res){
    echo 'err 1';
    exit();
}

$row=mysqli_fetch_assoc($res);

echo json_encode($row);
exit();