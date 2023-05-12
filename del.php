<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=student";
$pdo = new PDO($dsn, 'root', '');

$sql="delete from students where `id`='{$_GET['id']}'";

$pdo->exec($sql);

header("location:crud.php");
?>
