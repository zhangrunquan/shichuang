<?php
//指定表和username读取content字段并打散成数组以json形式返回
$username=$_GET['username'];
$table=$_GET['table'];
require_once 'mysqllink.php';

// 检测连接
if ($link->connect_error) {
    die("连接失败: " . $link->connect_error);
}
mysqli_query($link, "SET NAMES 'utf8'");


$query="SELECT content FROM ".$table." WHERE username='$username' limit 1";
$res=mysqli_query($link,$query);
mysqli_close($link);

if(!$res){
    echo 'err 1';
    exit();
}

$row=mysqli_fetch_assoc($res);
$arr=explode(',',$row['content']);
echo json_encode($arr);
exit();