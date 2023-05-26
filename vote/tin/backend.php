<?php include_once "db.php";
// $do=$_GET['do']??'error.php';
//判斷網頁是否有取得do參數，有的話就存入$do變數；假如不是的話再判斷登入者是否有pr權限；假如都不是就顯示錯誤畫面error.php
$do = '';
if (isset($_GET['do'])) {
    $do = $_GET['do'];
} else {
    if (isset($_SESSION['pr'])) {
        $do = $_SESSION['pr'];
    } else {
        $do = "error";
    }
}

?>

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
        <?php
        switch ($_SESSION['pr']) {
            case "super":

                break;
            case "admin":
                echo "<nav>";
                echo "    <a href='./backend.php?do=add_vote'>新增投票</a>";
                echo "    <a href='./backend.php?do=query_vote'>投票明細管理</a>";
                echo "</nav>";
                break;
            case "member":
                echo "<nav>";
                echo "    <a href='./backend.php?do=edit_self'>修改個人資料</a>";
                echo "    <a href='./backend.php?do=vote_history'>投票紀錄查詢</a>";
                echo "</nav>";
                break;
        }

        ?>
        <!-- <nav>
            <a href='./backend.php?do=add_vote'>新增投票</a>
            <a href='./backend.php?do=query_vote'>投票明細管理</a>
            <a href='./backend.php?do=query_vote'>會員管理</a>
        </nav> -->
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


        // $do=$_GET['do']??'topic_list';
        // $do=$_GET['do'] ?? 'error.php';


        $file = "./back/" . $do . ".php";

        if (file_exists($file)) {
            include $file;
        } else {
            include "./back/error.php";
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