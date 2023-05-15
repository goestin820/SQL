<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=coffee";
$pdo=new PDO($dsn,'root','');

$sql="INSERT INTO `members`(`name`, `acc`, `password`, `email`, `tel`) 
                    VALUES ('{$_POST['name']}','{$_POST['acc']}','{$_POST['password']}','{$_POST['email']}','{$_POST['tel']}')";
$pdo->exec($sql);

header("location:index.html");