<?php
$groupname=$_GET['groupname'];
require_once 'mysqllink.php';

// 检测连接
if ($link->connect_error) {
    die("连接失败: " . $link->connect_error);
}
mysqli_query($link, "SET NAMES 'utf8'");


$query="SELECT id FROM account WHERE groupname='$groupname'";
if(!($res=mysqli_query($link,$query))){
    echo 'err1';
    echo $link->error;
    exit();
}
$id_ar=[];
while($row=mysqli_fetch_assoc($res)){
    $id_ar[]=$row['id'];
}

$query="SELECT g1,g2,g3,g4,pingjiazu FROM huping WHERE beipingzu='$groupname' limit 1;";
if(!($res=mysqli_query($link,$query))){
    echo 'err2';
    echo $link->error;
    exit();
}
$row=mysqli_fetch_assoc($res);
$row['g5']=$row['g1']+$row['g2']+$row['g3']+$row['g4'];
$row['id']=$id_ar;


echo json_encode($row);
exit();