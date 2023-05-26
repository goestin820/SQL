<?php include_once "../db.php";

$sql = "select count(*) from `members` where `acc`='{$_POST['acc']}' && `pw`='{$_POST['pw']}'";

$chk = $pdo->query($sql)->fetchColumn();

if ($chk) {

    $sql = "select `pr` from `members` where `acc`='{$_POST['acc']}' && `pw`='{$_POST['pw']}'";

    $pr = $pdo->query($sql)->fetchColumn();

    // if($chk){
    $_SESSION['login'] = $_POST['acc'];
    $_SESSION['pr'] = $pr;

    if (isset($_SESSION['position'])) {
        header("location:" . $_SESSION['position']);
        unset($_SESSION['position']);
        exit();
    }

    header("location:../index.php");
} else {
    header("location:../index.php?do=login&error=1");
}
