<?php 
/* echo $_POST['desc'];
echo "<pre>";
print_r($_FILES['img']);
echo "</pre>";
  */
$dsn="mysql:host=localhost;charset=utf8;dbname=upload";
$pdo=new PDO($dsn,'root','');


if($_FILES['img']['error']==0){

    //$name=md5(strtotime('now') . $_FILES['img']['name']);
    $name=$_FILES['img']['name'];
    //$tmp=explode('.',$_FILES['img']['name']);
    //$sub="." . array_pop($tmp);
    
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$name);

    $sql="insert into `images` (`img`,`desc`,`type`,`size`) 
                        values('$name','{$_POST['desc']}','{$_FILES['img']['type']}','{$_FILES['img']['size']}')";

    $pdo->exec($sql);
    
    header("location:../upload.php");
}
?>