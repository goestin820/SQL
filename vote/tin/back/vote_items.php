<?php

$sql="select * from `logs` where `topic_id`='{$_GET['sub_id']}'";
$logs=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$subject=$pdo
            ->query("select `subject` from `topics` where `id`='{$_GET['sub_id']}'")
            ->fetchColumn();
?>
<style>
.vote-items{
    border-collapse: collapse;
    width:500px;
    margin:auto;
}
.vote-items div{
    padding:10px 25px;
    border:1px solid #ccc;
}

</style>
<h1><?=$subject;?></h1>
<table class="vote-items">
    <tr>
        <td>會員</td>
        <td>投票時間</td>
        <td>操作</td>
    </tr>
    <?php
    foreach($logs as $log){
        $sql_name="select `name` from `members` where `id`='{$log['mem_id']}'";
        $name=$pdo->query($sql_name)->fetchColumn();
        if($name==''){
            $name="一般訪客";
        }
    ?>
    <!-- 仔細看一下影片中老師選擇路徑的畫面 -->
    <form action="./api/del_log.php" method="post">
        <tr>
            <td><?=$name;?></td>
            <td><?=$log['vote_time'];?></td>
            <td>
                <input type="hidden" name="topic_id" value="<?=$log['topic_id'];?>">
                <input type="hidden" name="id" value="<?=$log['id'];?>">
                <button type="submit">刪除</button>
            </td>
        </tr>
    </form>
    <?php
    }
    ?>
</table>