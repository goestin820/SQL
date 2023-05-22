<ul class="vote-list">
    <div class="vote-subject-title">
        <div class="vote-item">序號</div>
        <div class="vote-item">投票主題</div>
        <div class="vote-item">功能</div>
    </div>
<?php
$sql="select * from `topics` where `close_time` >= '".date("Y-m-d H:i:s")."'";
$rows=$pdo->query($sql)->fetchAll();
foreach($rows as $idx => $row){
?>
<li class="vote-subject">
    <div class="vote-item"><?=$idx+1;?></div>

    <div class="vote-item"><?=$row['subject'];?></div>
    <div>
        <button class="type-info">
            <?php
                switch($row['type']){
                    case 1:
                        echo "單選";
                    break;
                    case 2:
                        echo "多選";
                    break;
                }                
            ?>
        </button>
        <?php
            if($row['login']==1){
                echo "<button class='vip-login'>";
                echo "會員限定";                
            }else{
                echo "<button class='normal' >";
                echo "公開";
            }
        ?>
        </button>
        <button onclick="location.href='?do=vote&id=<?=$row['id'];?>'">我要投票</button>
    </div>
</li>
<?php
}
?>
</ul>