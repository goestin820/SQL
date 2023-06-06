<h1>投票</h1>
<?php
/*
    ../,./  -> 相對位置
    / -> 絕對位置
*/

$topic = $pdo->query("select * from `topics` where `id`='{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
#$topic=find('topics',$_GET['id']); 更新為物件導向
#$Subject = new Subject;
#$topics = $Subject->find($_GET['id']);
// dd($topic);
// dd($Subject->options());

// 因$topic已變為物件，因此要用瘦箭頭->存取物件屬性
// if ($topic->login == 1) {
if ($topic['login'] == 1) {
    if (!isset($_SESSION['login'])) {
        $_SESSION['position'] = "/index.php?do=vote&id={$_GET['id']}";

        // header("location:index.php?do=login&msg=1");
        to("index.php?do=login&msg=1");
    }
}

#$options=$pdo->query("select * from `options` where `subject_id`='{$_GET['id']}'")->fetchAll(PDO::FETCH_ASSOC);更新為function
##$options=all('options', ['subject_id'=>$_GET['id']]);更新為物件導向
###$options=$Option->all(['subject_id'=>$_GET['id']]);物件導向繼續簡化為下面這一行
####$options=$Subject->options();  這段可取消，因$
?>

<!-- 更新為物件導向 -->
<!-- <h2><$topic->subject;></h2> -->
<h2>
    <?= $topic['subject']; ?>
</h2>

<?php
// if (!empty($topic->image)) {
if (!empty($topic['image'])) {
    echo "<img src='./upload/{$topic['image']}' style='width:450px;height:300px'>";
}
?>

<form action="./api/vote.php" method="post">
    <ul>
        <?php
        // foreach ($topic->$options as $idx => $opt) {
        foreach ($options as $idx => $opt) {
            echo "<li>";
            // switch ($topic->type) {
            switch ($topic['type']) {
                case 1:
                    echo "<input type='radio' name='desc' value='{$opt['id']}'>";
                    break;
                case 2:
                    echo "<input type='checkbox' name='desc[]' value='{$opt['id']}'>";
                    break;
            }

            echo "<span>" . ($idx + 1) . ". </span>";
            echo "<span>{$opt['description']}</span>";
            echo "</li>";
        }
        ?>
    </ul>

    <div>
        <input type="hidden" name="subject_id" value="<?= $_GET['id']; ?>">
        <input type="submit" value="投票">
        <input type="button" value="取消">
    </div>

</form>