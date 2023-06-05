<h1>會員權限管理</h1>
<style>
    .system.admin {
        border-collapse: collapse;
        width: 360px;
        padding: 15px;
        box-shadow: 0 0 10px #ccc;
    }

    .system-admin tr:nth-child(1) td {
        border: 1px solid #ccc;
        padding: 5px 10px;
        background: #ccc;
        font-weight: 600;
    }

    .system-admin td {
        border: 1px solid #ccc;
        padding: 5px 10px;
    }
</style>
<?php
$sql = "select * from `members`";
$mems = $pdo->query($sql)->fetchAll();
?>
<table class="system-admin">
    <tr>
        <td>會員</td>
        <td>權限</td>
        <td>操作</td>
    </tr>
    <?php
    foreach ($mems as $mem) {
    ?>
        <form action="./api/change_pr.php" method="post">
            <tr>
                <td><?= $mem['name']; ?></td>
                <td>
                    <select name="pr">
                        <option value="super" <?= ($mem['pr'] == 'super') ? 'selected' : ''; ?>>超級管理員</option>
                        <option value="admin" <?= ($mem['pr'] == 'admin') ? 'selected' : ''; ?>>管理員</option>
                        <option value="member" <?= ($mem['pr'] == 'member') ? 'selected' : ''; ?>>會員</option>
                    </select>
                </td>
                <td>
                    <input type="hidden" name="id" value="<?= $mem['id']; ?>">
                    <button type="submit">編輯</button>
                    <button type="button">刪除</button>
                </td>
            </tr>
        </form>


    <?php
    }
    ?>
</table>