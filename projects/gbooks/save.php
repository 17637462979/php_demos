<?php
include("input.php");
include ("connect.php");
$content = $_POST["content"];
$user = $_POST["user"];
$input = new input();
#检查留言内容
$is = $input->post($content);
if($is == false){
    die("留言内容不合法");

}
#检测留言用户
$is = $input->post($user);
if ($is==false){
    die("留言用户不合法");
}
//var_dump($content, $user);
#插入到数据库
//$time = time();   不是为何,时间戳插不进去
$time = date('Y-m-d H:i:s',time());
$sql = "INSERT INTO msg (username, content, intime) values ('{$user}', '{$content}','{$time}')";
print_r($sql);
$is = $db->query($sql);
header("location: gbook.php");//登陆成功后要显示的页面名称
?>