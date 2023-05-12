<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=student";
$pdo=new PDO($dsn,'root','');

?>
<style>
table{
    border-collapse:collapse;
    width:70%;
    min-width:800px;
}    

td{
    border:1px solid lightblue;
    padding:5px 8px;
}
a.btn{
    border: 1px solid lightgreen;
    padding: 5px 15px;
    border-radius: 7px;
    display: inline-block;
    margin: 5px;
    box-shadow: 2px 2px 10px green;
    background-color: deepskyblue;
    color: white;
    text-decoration:none;
    position:relative;
    top:0px;
    transition:all 0.5s;
}

a.btn:hover{
    text-decoration:underline;
    background-color: skyblue;
    position:relative;
    top:-5px;
    transform:scale(1.1);
    transition:all 0.5s;
} 
</style>

<h1>學生列表</h1>
<a class='btn' href="insert_form.php">新增學生資料</a>
<table>
    <tr>
        <td>序號</td>
        <td>學號</td>
        <td>班級座號</td>
        <td>姓名</td>
        <td>出生年月日</td>
        <td>身分證號碼</td>
        <td>住址</td>
        <td>家長</td>
        <td>電話</td>
        <td>科別</td>
        <td>畢業國中</td>
        <td>編輯</td>
        <td>刪除</td>
    </tr>
    <?php
        $sql="select * from students order by id desc ";
        $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as  $row){
    ?>
    <tr>
        <td><?=$row['id'];?></td>
        <td><?=$row['uni_id'];?></td>
        <td><?=$row['seat_num'];?></td>
        <td><?=$row['name'];?></td>
        <td><?=$row['birthday'];?></td>
        <td><?=$row['national_id'];?></td>
        <td><?=$row['address'];?></td>
        <td><?=$row['parent'];?></td>
        <td><?=$row['telphone'];?></td>
        <td><?=$row['major'];?></td>
        <td><?=$row['secondary'];?></td>
        <td>編輯</td>
        <td><a href='del.php?id=<?=$row['id'];?>'>刪除</a></td>
    </tr>
    <?php
    }
    ?>    
</table>
