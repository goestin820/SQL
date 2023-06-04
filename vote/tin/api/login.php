<?php include_once "../db.php";

// $sql = "select count(*) from `members` where `acc`='{$_POST['acc']}' && `pw`='{$_POST['pw']}'";
// $chk = $pdo->query($sql)->fetchColumn();
$chk = _count('members', ['acc' => $_POST['acc'], 'pw' => $_POST['pw']]);


if ($chk) {

    // $sql = "select `pr` from `members` where `acc`='{$_POST['acc']}' && `pw`='{$_POST['pw']}'";
    // $pr = $pdo->query($sql)->fetchColumn();
    $pr = find('members',['acc' => $_POST['acc'], 'pw' => $_POST['pw']])['pr'];

    // if($chk){
    $_SESSION['login'] = $_POST['acc'];
    $_SESSION['pr'] = $pr;

    if (isset($_SESSION['position'])) {
        // header("location:" . $_SESSION['position']);
        to($_SESSION['position']);
        unset($_SESSION['position']);
        exit();
    }

    // header("location:../index.php");
    to("../index.php");
} else {
    // header("location:../index.php?do=login&error=1");
    to("../index.php?do=login&error=1");
}

?>
