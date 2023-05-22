<?php 

$subjects=$pdo->query("SELECT `topics`.`id`,
                              `topics`.`subject`,
                              sum(`options`.`total`) as '總計'
                       FROM `topics`,`options` 
                       WHERE `topics`.`id`=`options`.`subject_id` 
                       GROUP BY `topics`.`id`;")->fetchAll(PDO::FETCH_ASSOC);

?>
<h1>選擇你想看的投票項目</h1>
<ul class="vote-result">
    <li class="vote-option-title">
        <div class="vote-item">序號</div>
        <div class="vote-item">主題</div>
        <div class="vote-item">票數</div>
    </li>
    <?php 
    foreach($subjects as $idx => $subject){
    ?>
    <li class="vote-option">
        <div class="vote-item"><?=$idx+1;?>. 
    </div>
        <div class="vote-item">
            <a href="index.php?do=result&id=<?=$subject['id'];?>">
                <?=$subject['subject'];?>
            </a>
        </div>
        <div class="vote-item"><?=$subject['總計'];?></div>
    </li>
    <?php
    }
    ?>
</ul>