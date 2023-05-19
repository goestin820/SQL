<ul>
<?php
$sql="select * from `topics`";
$rows=$pdo->query($sql)->fetchAll();
foreach($rows as $row){
?>
<li>
    <?=$row['subject'];?>
    <button onclick="location.href='?do=vote&id=<?=$row['id'];?>'">我要投票</button>
</li>
<?php
}
?>
</ul>