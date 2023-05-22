<?php

include_once "../db.php";

$opt=$_POST['desc'];

/* 1.單選 $_POST['desc']=3;
   2.多選 $_POST['desc']=[1,3,6]; */

$subject_id = $_POST['subject_id'];
$subject_type=$pdo->query("select `type` from `topics` where `id`='$subject_id'")->fetchColumn();

switch($subject_type){
    case 1:
        $pdo->exec("update `options` set `total`=`total`+1 where `id`='$opt'");
    break;
    case 2:
        foreach($opt as $opt_id){
            $pdo->exec("update `options` set `total`=`total`+1 where `id`='$opt_id'");
        }
    break;
}

//記錄使用者投票狀況
if(isset($_SESSION['login'])){
    $mem_id=$pdo->query("select `id` from `members` where `acc`='{$_SESSION['login']}'")->fetchColumn();
}else{
    $mem_id=0;
}
$topic_id=$_POST['subject_id'];
$vote_time=date("Y-m-d H:i:s");
/*
    serialize()=>將陣列轉成可儲存的字串格式
    json_encode()=>將陣列轉成json字串格式
*/
$records=serialize([$_POST['subject_id']=>$opt]);

$sql="insert into `logs`(`mem_id`,`topic_id`,`vote_time`,`records`) 
                  values('$mem_id','$topic_id','$vote_time','$records')";
$pdo->exec($sql);


header("location:../index.php?do=result&id=$subject_id");