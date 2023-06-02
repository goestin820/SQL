<?php  include_once "../db.php";

// $pdo->exec("delete from `logs` where `id`='{$_POST['id']}'");
del('logs',$_POST['id']);

// header("location:../backend.php?do=vote_items&sub_id={$_POST['topic_id']}");
to("../backend.php?do=vote_items&sub_id={$_POST['topic_id']}");