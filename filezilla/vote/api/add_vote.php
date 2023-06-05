<?php
include_once "../db.php";

/* echo "<pre>";
print_r($_POST);
echo "</pre>"; */

//從topics搜尋某一個"subject(主題)"並統計其數量
$sql_chk_subject = "select count(*) from `topics` where subject='{$_POST['subject']}'";
//因為count只會回傳一筆資料(數量)，所以使用fetchColumn()回傳給$chk
$chk = $pdo->query($sql_chk_subject)->fetchColumn();

//一開始預設使用者會上傳image圖片，所以先判斷image檔案是否為空值及陣列
/* if(!empty($_FILES['img']['tmp_name'])){
    if(in_array($_FILES['img']['type'],['image/jpeg','image/png','image/gif'])){
        move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
        $image=$_FILES['img']['name'];
    }else{
        header("location:../backend.php?do=add_vote&error=非圖片格式");
        exit();
    }
}else{
    $image='';
} */

//一開始就預設使用者不會上傳image圖片，所以設定$image為空值''
$image = '';
//判斷
if (!empty($_FILES['img']['tmp_name'])) {
    if (in_array($_FILES['img']['type'], ['image/jpeg', 'image/png', 'image/gif'])) {
        move_uploaded_file($_FILES['img']['tmp_name'], '../upload/' . $_FILES['img']['name']);
        $image = $_FILES['img']['name'];
    } else {
        header("location:../backend.php?do=add_vote&error=非圖片格式");
        exit();
    }
}


//判斷$chk是否大於0，假如大於0表示從topics搜尋某一個"subject(主題)"的結果至少有1筆
//"select count(*) from `topics` where subject='{$_POST['subject']}'";
if ($chk > 0) {
    echo "此主題已被使用過,請修改主題內容";
    echo "<a href='../back/add_vote.php'>返回新增主題</a>";
} else {

    // $sql = "INSERT INTO `topics`(`subject`, `open_time`, `close_time`, `type`,`image`,`login`) 
    //    VALUES ('{$_POST['subject']}','{$_POST['open_time']}','{$_POST['close_time']}','{$_POST['type']}','$image','{$_POST['login']}')";
    // $pdo->exec($sql);

    /*function save($table, $cols)
    {
        if (isset($cols['id'])) {
            update($table, $cols);
        } else {
            insert($table, $cols);
        }
    }*/

    //呼叫save函式，並判斷因為$cols參數內無'id'欄位，所以執行insert($table, $cols)
    save('topics', [
        'subject' => $_POST['subject'],
        'open_time' => $_POST['open_time'],
        'close_time' => $_POST['close_time'],
        'type' => $_POST['type'],
        'image' => $image,
        'login' => $_POST['login']
    ]);

    //寫入選項
    //echo $sql_subject_id;
    //$subject_id=$pdo->query($sql_subject_id)->fetchColumn();

    //呼叫find函式，從topics資料表中搜尋相關subject主題結果的id欄位
    //$sql_subject_id="select `id` from `topics` where `subject`='{$_POST['subject']}'";
    $subject_id = find('topics', ['subject' => $_POST['subject']])['id'];
    //echo $subject_id;

    foreach ($_POST['description'] as $desc) {
        if ($desc != '') {
            //$sql_option="INSERT INTO `options`(`description`,`subject_id`) 
            //           VALUES ('$desc','$subject_id')";
            //$pdo->exec($sql_option);

            save('options', ['description' => $desc, 'subject_id' => $subject_id]);
        }
    }
}
header("location:../backend.php");
