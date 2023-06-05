<?php
include_once "../db.php";

$subject=$pdo->query("select * from `topics` where `id`='{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);

//先計算投票期間長度
$duration=strtotime($subject['close_time'])-strtotime($subject['open_time']);

$new_close=date("Y-m-d H:i:s",strtotime("now")+$duration);
$new_open=date("Y-m-d H:i:s");
$sql="update `topics` set `open_time`='$new_open',`close_time`='$new_close' where `id`='{$_GET['id']}'";

$pdo->exec($sql);

header("location:../backend.php");