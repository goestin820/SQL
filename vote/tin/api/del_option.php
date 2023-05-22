<?php
include_once "../db.php";

$subject_id=$pdo->query("select `subject_id` from `options` where `id`='{$_GET['id']}'")->fetchColumn();

$pdo->exec("delete from `options` where `id`='{$_GET['id']}'");

header("location:../backend.php?do=result&id=$subject_id"); 