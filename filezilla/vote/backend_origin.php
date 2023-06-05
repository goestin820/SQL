<?php include_once "./db.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理後台</title>
    <link rel="stylesheet" href="./css/style.css">
    <!-- <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .time-set {
            display: flex;
            width: 70%;
            min-width: 615px;
            justify-content: space-between;
        }

        .time-item {
            margin: 5px 0;
        }

        .subject-input {
            font-family: '微軟正黑體', Arial, Helvetica, sans-serif;
            padding: 3px;
            font-size: 16px;
            width: 50%;
        }

        main {
            width: 60%;
            margin: auto;
        }

        .topic-list {
            list-style-type: none;
        }

        .list-row {
            display: flex;
            width: 100%;
        }

        .list-row div:not(1) {
            text-align: center;
        }

        .list-item-title:nth-child(1),
        .list-item:nth-child(1) {
            width: 40%;
        }

        .list-item-title:nth-child(2),
        .list-item:nth-child(2) {
            width: 5%;
        }

        .list-item-title:nth-child(3),
        .list-item:nth-child(3) {
            width: 15%;
        }

        .list-item-title:nth-child(4),
        .list-item:nth-child(4) {
            width: 5%;
        }

        .list-item-title:nth-child(5),
        .list-item:nth-child(5) {
            width: 25%;
        }
    </style> -->
</head>

<body>
    <header>
        <a href="index.php">首頁</a>
        <a href="login.php">登出</a>
    </header>
    <main>
        <nav>
            <a href='./back/add_vote.php'>新增投票</a>
            <a href='./back/edit_vote.php'>編輯投票</a>
            <a href='./back/del_vote.php'>刪除投票</a>
            <a href='./back/query_vote.php'>結果查詢</a>
        </nav>
        <ul class="topic-list">
            <li class="list-row">
                <div class="list-item-title">主題</div>
                <div class="list-item-title">狀態</div>
                <div class="list-item-title">期間</div>
                <div class="list-item-title">投票數</div>
                <div class="list-item-title">操作</div>
            </li>
            <?php
            $sql = "select * from `topics`";
            $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
            ?>
                <li class="list-row">
                    <div class="list-item"><?= $row['subject']; ?></div>
                    <div class="list-item"></div>
                    <div class="list-item">
                        <?= $row['open_time'] . " ~ " . $row['close_time']; ?>
                    </div>
                    <div class="list-item"></div>
                    <div class="list-item">
                        <button onclick="location.href='./back/edit_vote.php?id=<?= $row['id']; ?>'">編輯</button>
                        <button onclick="location.href='./back/del_vote.php?id=<?= $row['id']; ?>'">刪除</button>
                    </div>
                </li>
            <?php
            }
            ?>
        </ul>



    </main>
    <footer></footer>
</body>

</html>