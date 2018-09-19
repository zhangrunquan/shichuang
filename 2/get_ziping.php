<?php
$username=$_GET['username'];
require_once 'mysqllink.php';

// 检测连接
if ($link->connect_error) {
    die("连接失败: " . $link->connect_error);
}
mysqli_query($link, "SET NAMES 'utf8'");
$query="SELECT groupname FROM account WHERE username='$username'";
if(!($res=mysqli_query($link,$query))){
    echo 'err2';
    echo $link->error;
}
$row=mysqli_fetch_assoc($res);
$group=$row['groupname'];

$query="SELECT id,username,g1,g2,g3,g4 FROM ziping WHERE username='$username' ";
$res=mysqli_query($link,$query);

if(!$res){
    echo 'err 1';
    echo $link->error;
    exit();
}
mysqli_close($link);
if(mysqli_num_rows($res)==0){
    echo json_encode('0');
    exit();
}
$row=mysqli_fetch_assoc($res);
$row['group']=$group;
$row['g5']=$row['g1']+$row['g2']+$row['g3']+$row['g4'];
echo json_encode($row);
exit();