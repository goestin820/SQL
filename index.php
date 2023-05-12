<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=student";

$pdo = new PDO($dsn, 'root', '');

$sql = "select * from students limit 1";

// 限制取回的資料型態 FETCH_ASSOC
// $row = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($row);
// echo "</pre>";

// 沒有加FETCH的寫法，只能回傳SQL查詢句子
// $row = $pdo->query($sql);
// echo "<pre>";
// var_dump($row);
// echo "</pre>";

// 限制取回的資料型態 FETCH_NUM
$row = $pdo->query($sql)->fetch(PDO::FETCH_NUM);

echo "<pre>";
print_r($row);
echo "</pre>";

echo $row['name'];
echo $row[3];
echo "<br>";
