<?php

echo $_GET['id'];
$dsn = "mysql:host=localhost;charset=utf8;dbname=student";
$pdo = new PDO($dsn, 'root', '');
$sql = "select * from `students` where `id`='{$_GET['id']}'";
$row = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯學生資料</title>
</head>

<body>

    <form action="edit.php" method="post">

        <!-- (div>lable+input)*10  -->
        <div>
            <lable>編號</lable><?= $row['id']; ?>
        </div>
        <div>
            <lable>學號</lable>
            <input type="text" name="uni_id" value="<?= $row['uni_id']; ?>">
        </div>
        <div>
            <lable>班級座號</lable>
            <input type="text" name="seat_num" value="<?= $row['seat_num']; ?>">
        </div>
        <div>
            <lable>姓名</lable>
            <input type="text" name="name" value="<?= $row['name']; ?>">
        </div>
        <div>
            <lable>出生年月日</lable>
            <input type="text" name="birthday" value="<?= $row['birthday']; ?>">
        </div>
        <div>
            <lable>身分證號碼</lable>
            <input type="text" name="national_id" value="<?= $row['national_id']; ?>">
        </div>
        <div>
            <lable>住址</lable>
            <input type="text" name="address" value="<?= $row['address']; ?>">
        </div>
        <div>
            <lable>家長</lable>
            <input type="text" name="parent" value="<?= $row['parent']; ?>">
        </div>
        <div>
            <lable>電話</lable>
            <input type="text" name="telphone" value="<?= $row['telphone']; ?>">
        </div>
        <div>
            <lable>科別</lable>
            <input type="text" name="major" value="<?= $row['major']; ?>">
        </div>
        <div>
            <lable>畢業國中</lable>
            <input type="text" name="secondary" value="<?= $row['secondary']; ?>">
        </div>
        <div>
            <input  type="hidden" name="id" value="<?= $row['id']; ?>">
            <input type="submit" value="編輯">
            <input type="reset" value="取消">
        </div>

    </form>
</body>

</html>