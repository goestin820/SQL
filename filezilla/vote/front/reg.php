<?php

if(isset($_GET['error'])){
    echo "<span style='color:red'>";
    echo "帳號或密碼不可為空";
    echo "</span>";
}

?>

<form action="./api/reg.php" method="post">
    <div>
        <label for="acc">帳號</label>
        <input type="text" name="acc" id="acc">
    </div>
    <div>
        <label for="pw">密碼</label>
        <input type="password" name="pw" id="pw">
    </div>
    <div>
        <label for="name">姓名</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="addr">地址</label>
        <input type="text" name="addr" id="addr">
    </div>
    <div>
        <label for="email">電子郵件</label>
        <input type="text" name="email" id="email">
    </div>
    <div>
        <input type="submit" value="註冊">
    </div>
</form>