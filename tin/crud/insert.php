<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=student";
$pdo=new PDO($dsn,'root','');

$sql="insert into students ( `uni_id`, `seat_num`, `name`, `birthday`, `national_id`, `address`, `parent`, `telphone`, `major`, `secondary` ) 
                      value( '{$_POST['uni_id']}', '{$_POST['seat_num']}', '{$_POST['name']}', '{$_POST['birthday']}', '{$_POST['national_id']}', '{$_POST['address']}', '{$_POST['parent']}', '{$_POST['telphone']}', '{$_POST['major']}', '{$_POST['secondary']}' )";
$pdo->exec($sql);

header("location:crud.php");

