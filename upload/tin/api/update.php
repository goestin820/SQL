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

    $sql="update `images` set
    `img`='$name',`desc`='{$_POST['desc']}',`type`='{$_FILES['img']['type']}',`size`='{$_FILES['img']['size']}' where `id`='{$_POST['id']}'";

    $old_image=$pdo->query("select `img` from `images` where id='{$_POST['id']}'")->fetchColumn();
    unlink("../img/".$old_image);
    $pdo->exec($sql);
    
    header("location:../upload.php");
}
?>