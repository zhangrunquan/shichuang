<?php
//-----------------mysql参数----------------------------------------------
$servername = 'localhost:3306';
$usern = "root";
$passw = "12345678";
$dbname = "database3";
//-----------------连接mysql服务器----------------------------------------------
$link = mysqli_connect($servername,$usern ,$passw);;
$res = mysqli_set_charset($link, 'utf8');
//选择数据库
if(!mysqli_query($link, 'use '.$dbname)){
    echo '数据库连接失败';
}
