<?php

$host='localhost';
$user='root';
$password='';
$database='db_smart_shop';
$link= mysqli_connect($host, $user, $password, $database);
if($link){
    return $link;
} else {
    die('Connection problem'.mysqli_error($link));
}