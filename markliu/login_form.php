<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
</head>
<body>
<h1>會員登入</h1>
<?php
if(isset($_GET['error'])){
    echo "<span style='color:red'>";
    switch($_GET['error']){
        case 1:
            echo "帳號或密碼錯誤";
        break;
        case 2:
            echo "無法連線,請稍候再試";
        break;
        default:
            echo "未知的錯誤,請聯絡系統管理員;";
    }
    echo "</span>";
}

?>
<form action="login.php" method="post">
<p>
    <label for="acc">帳號:</label>
    <input type="text" name="acc" id="acc">
</p>
<p>
    <label for="">密碼:</label>
    <input type="password" name="pw" id="pw">
</p>
<p><input type="submit" value="登入"></p>
</form>
</body>
</html>