<?php

$sub_id=$_GET['sub_id'];
$log_id=$_GET['log_id'];
$subject=$pdo->query("select `subject` from `topics` where `id`='{$sub_id}'")->fetchColumn();
$options=$pdo->query("select * from `options` where `subject_id`='{$sub_id}'")->fetchAll(PDO::FETCH_ASSOC);

$log=$pdo->query("select * from `logs` where `id`='{$log_id}'")->fetch(PDO::FETCH_ASSOC);

//將取出的records資料，解序列化unserialize
$records=unserialize($log['records']);
/* echo "<pre>";
print_r($records);
echo "</pre>"; */
?>

<h2><?=$subject;?></h2>
<ul>
    <?php
    foreach($options as $opt){

    ?>
    <li>
        <?php
            if(in_array($opt['id'],$records)){
                echo "V";
            }
        ?>
        <?=$opt['description'];?>
    </li>
    <?php
    }
    ?>
</ul>