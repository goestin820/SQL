<?php

include_once "../db.php";


$sql="update `members` set `pr`='{$_POST['pr']}' where `id`='{$_POST['id']}'";

$pdo->exec($sql);

header("location:../backend.php?do=super");