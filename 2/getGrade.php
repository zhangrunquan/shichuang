<?php
if(isset($_GET['sid'])){
    $sid = $_GET['sid'];
    session_id($sid);
    session_start();
    $txt = $_SESSION['username'];
}else{
    $txt=$_GET['username'];
}


require_once 'mysqllink.php';
// 检测连接
if ($link->connect_error) {
    die("连接失败: " . $link->connect_error);
}
mysqli_query($link, "SET NAMES 'utf8'");


$sql = "SELECT * FROM totalgrade where name='$txt'";
$result = mysqli_query($link,$sql);
if(!$result){
    echo 'err 1';
}

$info=[];
if ($result->num_rows > 0) {
    // 输出数据
    while ($row = $result->fetch_assoc()) {
        /*
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["g1"] . "</td>";
        echo "<td>" . $row["g2"] . "</td>";
        echo "<td>" . $row["g3"] . "</td>";
        echo "<td>" . $row["g4"] . "</td>";
        echo "<td>" . $row["g5"] . "</td>";
        echo "</tr>";*/
        foreach ($row as $key=>$value){
            $info[$key]=$value;
        }
        echo json_encode($info);
    }
} else {
    echo json_encode("0 结果");
}
$link->close();
