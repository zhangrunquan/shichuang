<?php
$sid=$_GET['sid'];
session_id($sid);
session_start();
$info=[];
foreach ($_SESSION as $key=>$value){
    $info[$key]=$value;
}
echo(json_encode($info));