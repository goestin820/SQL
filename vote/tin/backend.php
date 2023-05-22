<?php include_once "db.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理後台</title>
    <script src="./js/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<header>
    <a href="index.php">網站首頁</a>
    <a href="backend.php">管理首頁</a>
    <a href="./api/logout.php">登出</a>
    <nav>
        <a href='./backend.php?do=add_vote'>新增投票</a>     
        <a href='./backend.php?do=query_vote'>會員管理</a>
        <a href='./backend.php?do=query_vote'>投票明細管理</a>
    </nav>
</header>
<main>
<?php
 //include "./back/topic_list.php";

/*  if(isset($_GET['do'])){
    $file="./back/".$_GET['do'].".php";
 }else{
    $file="./back/topic_list.php";
 } */

//$do=(isset($_GET['do']))?$_GET['do']:'topic_list';
$do=$_GET['do']??'topic_list';

$file="./back/".$do.".php";

if(file_exists($file)){
    include $file;
}else{
    include "./back/topic_list.php";
}

//include (file_exists($file))?$file:"./back/topic_list.php";
 /* 
 switch($_GET['do']){
    case "add_vote":
        include "./back/add_vote.php";
    break;
    case 'query_vote':
        include "./back/query_vote.php";
    break;
    default :
        include "./back/topic_list.php";
 } */
 ?>
</main>
<footer></footer>
</body>
</html>