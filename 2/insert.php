<head>
    <meta charset="utf-8">
</head>
<?php
require_once 'mysqllink.php';
$q=$_GET["q"];
echo $q;

// 检测连接
if ($link->connect_error) {
    die("连接失败: " . $link->connect_error);
} 
    mysqli_query($link,"SET NAMES 'utf8'");
    $sql="insert into standard(content) values('$q')";
if ($link->query($sql) === TRUE) {
    echo "新记录插入成功";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}
$link->close();
