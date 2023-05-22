<?php include_once "../db.php";

//可以選擇使用編碼來為密碼或資料加密
/* $pw=md5($_POST['pw']);
echo $pw; */

if(!empty($_POST) && $_POST['acc']!="" && $_POST['pw']!=""){
    $sql="insert into `members` (`acc`,`pw`,`name`,`addr`,`email`) 
                          values('{$_POST['acc']}',
                                 '{$_POST['pw']}',
                                 '{$_POST['name']}',
                                 '{$_POST['addr']}',
                                 '{$_POST['email']}')";
$pdo->exec($sql);
    header("location:../index.php");
}else{
    header("location:../index.php?do=reg&error=1");
}


