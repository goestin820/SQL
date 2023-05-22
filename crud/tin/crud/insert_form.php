<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增學生資料</title>
</head>

<body>

    <form action="insert.php" method="post">

        <!-- (div>lable+input)*10  -->
        <lable>學號</lable>
        <input type="text" name="uni_id" id="">
        </div>
        <div>
            <lable>班級座號</lable>
            <input type="text" name="seat_num" id="">
        </div>
        <div>
            <lable>姓名</lable>
            <input type="text" name="name" id="">
        </div>
        <div>
            <lable>出生年月日</lable>
            <input type="text" name="birthday" id="">
        </div>
        <div>
            <lable>身分證號碼</lable>
            <input type="text" name="national_id" id="">
        </div>
        <div>
            <lable>住址</lable>
            <input type="text" name="address" id="">
        </div>
        <div>
            <lable>家長</lable>
            <input type="text" name="parent" id="">
        </div>
        <div>
            <lable>電話</lable>
            <input type="text" name="telphone" id="">
        </div>
        <div>
            <lable>科別</lable>
            <input type="text" name="major" id="">
        </div>
        <div>
            <lable>畢業國中</lable>
            <input type="text" name="secondary" id="">
        </div>
        <div>
            <input type="submit" value="新增">
            <input type="reset" value="取消">
        </div>


    </form>
</body>

</html>