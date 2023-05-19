<ul class="topic-list">
    <li class="list-row">
        <div class="list-item-title">主題</div>
        <div class="list-item-title">狀態</div>
        <div class="list-item-title">期間</div>
        <div class="list-item-title">投票數</div>
        <div class="list-item-title">操作</div>
    </li>
<?php
    $sql="select * from `topics`";
    $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row){
?>
    <li class="list-row">
        <div class="list-item"><?=$row['subject'];?></div>
        <div class="list-item"></div>
        <div class="list-item">
          <?=$row['open_time'] . " ~ " . $row['close_time'];?>
        </div>
        <div class="list-item"></div>
        <div class="list-item">
            <button onclick="location.href='./back/edit_vote.php?id=<?=$row['id'];?>'">編輯</button>
            <button onclick="location.href='./back/del_vote.php?id=<?=$row['id'];?>'">刪除</button>
        </div>
    </li>
<?php
    }
?>
</ul>  