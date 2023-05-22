<?php
$topic=$pdo->query("select * from `topics` where `id`='{$_GET['id']}'")
           ->fetch(PDO::FETCH_ASSOC);

$options=$pdo->query("select * from `options` where `subject_id`='{$_GET['id']}'")
             ->fetchAll(PDO::FETCH_ASSOC);

?>
 
    <h1>編輯
        主題</h1>
    <form action="../api/edit_vote.php" method="post">
        <div>
            <label for="subject">主題說明：</label>
            <input type="text" 
                   name="subject" 
                   id="subject" 
                   class="subject-input" 
                   value="<?=$topic['subject'];?>">
        </div>
        <div class="time-set">
            <div class="time-item">
                <label for="open_time">開放時間：</label>
                <input type="datetime-local" name="open_time" id="open_time" value="<?=$topic['open_time'];?>">
            </div>
            <div class="time-item">
                <label for="close_time">關閉時間：</label>
                <input type="datetime-local" name="close_time" id="close_time" value="<?=$topic['close_time'];?>">
            </div>
        </div>
        <div>
            <label for="type">單複選：</label>
            <input type="radio" name="type" value="1" <?=($topic['type']==1)?'checked':'';?>>單選&nbsp;&nbsp;
            <input type="radio" name="type" value="2" <?=($topic['type']==2)?'checked':'';?>>複選
        </div>
        <hr>
    <div class="options">
    <?php 
        foreach($options as $opt){
    ?>
        <div>
            <label for="description">項目：</label>
            <input type="text" name="description[]"  class="description-input" value="<?=$opt['description'];?>">
            <span onclick="addOption()">+</span>
            <span onclick="removeOption(this)">-</span>
            <input type="hidden" name="opt_id[]" value="<?=$opt['id'];?>" > 
        </div>

    <?php 
    }
    ?>        
    </div>
        <div>
            <input type="hidden" name="subject_id" value="<?=$topic['id'];?>">
            <input type="submit" value="編輯">
        </div>
    </form>


<script>
function addOption(){
    let opt=`<div>
                <label for="description">項目：</label>
                <input type="text" name="description[]"  class="description-input">
                <span onclick="addOption()">+</span>
                <span onclick="removeOption(this)">-</span>
            </div>`
    $(".options").append(opt);    
}

function removeOption(el){
    let dom=$(el).parent()
    $(dom).remove();
}


</script>