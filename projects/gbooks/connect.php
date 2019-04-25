<?php
#连接数据库
$host = "127.0.0.1";
$dbuser = "root";
$pwd = "520131";
$dbname = "gbooks";
$db = new mysqli($host,$dbuser,$pwd,$dbname);
if ($db->connect_errno <>0){
    die("sucess");

}
#设定数据库传输时的编码
$db->query("SET NAMES UTF-8");