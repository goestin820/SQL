<?php 
include_once "../db.php";

$sql="update `topics` 
         set  `subject`='{$_POST['subject']}',
              `open_time`='{$_POST['open_time']}',
              `close_time`='{$_POST['close_time']}',
              `type`='{$_POST['type']}'
       where `id`='{$_POST['subject_id']}'";


$pdo->exec($sql);

$options=$pdo->query("select `id` from `options` where `subject_id`='{$_POST['subject_id']}'")
             ->fetchAll(PDO::FETCH_ASSOC);

//將資料表中的選項撈出來和表單中的選項id做比對.
if(!empty($options)){
    if(isset($_POST['opt_id'])){

        //以迴圈的方式將資料表中的選項id一個一個拿出來做檢查
        foreach($options as $opt){

            //如果資料表中的id沒有在表單中的選項id陣列，則刪除
            if(!in_array($opt['id'],$_POST['opt_id'])){
               $pdo->exec("delete from `options` where `id`='{$opt['id']}'");
            }
        }
    }else{

        //如果表單選項id沒有傳來表示要刪除全部的選項資料
        $pdo->exec("delete from `options` where `subject_id`='{$_POST['subject_id']}'");
    }
}

//更新資料中已有的選項內容
if(isset($_POST['opt_id'])){
    foreach($_POST['opt_id'] as $idx => $id){
       $pdo->exec("update `options` set `description`='{$_POST['description'][$idx]}' where `id`='$id'");
       unset($_POST['description'][$idx]);
    }

}


//處理新增的選項
if(!empty($_POST['description'])){
    foreach($_POST['description'] as $desc){
        $pdo->exec("insert into `options` (`description`,`subject_id`) values('$desc','{$_POST['subject_id']}')");
    }
}

/* echo "<pre>";
print_r($options);
echo "<pre>";
echo "<pre>";
print_r($_POST['description']);
echo "<pre>";
echo "<pre>";
print_r($_POST['opt_id']);
echo "<pre>";
 */

 header("location:../backend.php");


