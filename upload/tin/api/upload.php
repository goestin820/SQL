<?php
// echo $_POST['desc'];
// echo "</pre>";

//img檔案無法用echo顯示出來，只能用print_r顯示
// echo $_POST['img'];
// // echo "<pre>";
// print_r($_FILES['img']);
// echo "</pre>";

$dsn = "mysql:host=localhost;charset=utf8;dbname=upload";
$pdo = new PDO($dsn, 'root', '');


if ($_FILES['img']['error'] == 0) {

    // 運用md5編碼方式將檔案以亂數名稱重新命名
    // $name = md5(strtotime('now') . $_FILES['img']['name']);

    // $sub = "." . array_pop(explode('.', $FILES['img']['name']));
    //array_pop無法直接使用在這種情況，所以需要先指定一個變數$tmp再套用到array_pop函式
    // $tmp = explode('.', $FILES['img']['name']);
    // $sub = "." . array_pop($tmp);

    $name = $_FILES['img']['name'];

    // $_FILES['img']['name']='2022-05-29.pdf';
    // move_uploaded_file($_FILES['img']['tmp_name'], "../img/" . $name . $sub);
    // move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$name);

    $sql="insert into `images` (`img`,`desc`,`type`,`size`) 
                        values('$name','{$_POST['desc']}','{$_FILES['img']['type']}','{$_FILES['img']['size']}')";

    $pdo->exec($sql);
    
    header("location:../upload.php");
}
