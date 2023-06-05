投票紀錄

<?php

$user=$pdo
        ->query("select * from `members` where `acc`='{$_SESSION['login']}'")
        ->fetch(PDO::FETCH_ASSOC);

$logs=$pdo
        ->query("select * from `logs` where `mem_id`='{$user['id']}'")
        ->fetchAll(PDO::FETCH_ASSOC);
/*         echo "<pre>";
        print_r($logs);
        echo "</pre>"; */

foreach($logs as $log){
    $topic=$pdo
            ->query("select `id`, `subject` from `topics` where `id`='{$log['topic_id']}'")
            ->fetch(PDO::FETCH_ASSOC);
    echo "<div><a href='?do=vote_detail&log_id={$log['id']}&sub_id={$topic['id']}'>";
    echo $topic['subject'];
    echo "</a>";
    echo $log['vote_time'];
    echo "</div>";
}


?>