<?php
#连接数据库
$host = "127.0.0.1";
$user = "root";
$pwd = "520131";
$dbname = "gbooks";
$db = new mysqli($host,$user,$pwd,$dbname);
if ($db->connect_errno <>0){
    echo "连接失败";
    echo $db->connect_error;
    exit;
}
#设定数据库传输时的编码
$db->query("SET NAMES UTF-8");
$sql = "SELECT * FROM msg ORDER BY id DESC";
$mysqli_result = $db->query($sql);
if ($mysqli_result === false){
    echo "sql 错误";
    exit;
}
$rows = [];
while ($row = $mysqli_result->fetch_array(MYSQLI_ASSOC)){
    $rows[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/gbook.css">
    <title>留言板</title>
</head>
<body>
<div class="wrap">
    <!--发表留言-->
    <div class="add">
        <form action="save.php" method="post">
            <textarea name="content" class="content" cols="50" rows="5"></textarea>
            <input type="text" class="user" name="user">
            <input type="submit" class="btn" value="发表留言">
        </form>
    </div>
    <!--查看留言-->
    <?php
    foreach ($rows as $row){
    ?>
    <div class="msg">
        <div class="info">
            <span class="user"><?php
                echo $row['username'];
                ?></span>
            <span class="time"><?
                echo date("Y-m-d H:i:s", $row["intime"]);
                ?></span>
        </div>
        <div class="content">
            <?php echo $row["content"];?>
        </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
</body>
</html>

