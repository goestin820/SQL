<?php
// echo "<pre>";
// print_r(all('options'));
// echo "</pre>";
echo "<pre>";
print_r(find('options',33));
echo "</pre>";
// echo "<pre>";
// print_r(find('options',['subject_id'=>12,'description'=>'200','total'=>'2']));
// echo "</pre>";

find('options',33);
find('options',['subject_id'=>5,'description'=>'4.5萬']);
// find('options',['subject_id'=>12,'description'=>'200','total'=>'2']);

// update('options', ['id' => 60, 'description' => '1000萬', 'total' => 30]);
// insert('options', ['description' => '600', 'subject_id' => '12','total' => 100]);

// del('options', 64);
// del指令一次只能刪除一個欄位
// del('options', ['subject_id' => 6]);
// del('options', ['total' => 100]);

function all($table)
{
    $dsn = "mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo = new PDO($dsn, 'root', '');

    $sql = "select * from $table ";
    //將$sql內容全部取出來
    $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    //回傳$rows值，不能省略
    return $rows;
}

function find($table, $arg)
{
    $dsn = "mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo = new PDO($dsn, 'root', '');

    $sql = "select * from `$table`  where ";
    //is_array判斷是否為陣列，是的話將取出的Key、value值存入$tmp[]陣列，否的話將$arg指派給id欄位
    if (is_array($arg)) {
        foreach ($arg as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        //使用join語法，以&&將$tmp的$key=$value值串接在一起，再以.=結合在"select * from `$table`  where "後面
        $sql .= join(" && ", $tmp);
    } else {
        $sql .= " `id` = '$arg' ";
    }

    echo $sql;
    //將$sql內容取第一筆出來
    $row = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    //回傳$rows值，不能省略
    return $row;
}

// update('options', ['id' => 58, 'description' => '200萬', 'total' => 200]);

//一次只能更新一筆資料
function update($table, $cols)
{
    $dsn = "mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo = new PDO($dsn, 'root', '');

    //['subject'=>'今天天氣很好吧?',
    // 'open_time'=>'2023-05-29',
    // 'close_time'=>'2023-06-05',]
    foreach ($cols as $key => $value) {
        //假如key值不是id，就將key=value存入$tmp[]陣列
        if ($key != 'id') {
            $tmp[] = "`$key`='$value'";
        }
    }

    //`subject`='今天天氣很好吧?',`open_time`='2023-05-29',`close_time`='2023-06-05'
    //使用join語法，以,將$tmp的$key=$value值串接在一起，再以.接在"update `$table` set 和 where `id`='{$cols['id']}之間
    $sql = "update `$table` set  " . join(",", $tmp) . " where `id`='{$cols['id']}'";
    //將sql更新後的結果以exec($sql)執行到資料庫，並存入$result
    $result = $pdo->exec($sql);
    //回傳$result值？
    return $result;
}

// insert('options', ['description' => '800', 'subject_id' => '12', 'total' => 800]);
// $data=['description' => '600', 'subject_id' => '12','total' => 100];
// echo print_r($data);

function insert($table, $cols)
{
    $dsn = "mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo = new PDO($dsn, 'root', '');

    //利用array_keys語法取得陣列$cols的key值
    $col = array_keys($cols);
    //Array ( [0] => description [1] => subject_id [2] => total ) 
    // echo print_r($col);

    // $sql ="insert into $table (`";
    // $sql .=join("`,`", $col);
    // $sql .="`) values('";
    // $sql .=join("','",$cols);
    // $sql .="')";

    $sql = "insert into $table (`" . join("`,`", $col) . "`) values('" . join("','", $cols) . "')";
    //將$sql內容顯示在瀏覽器上
    echo $sql;

    $result = $pdo->exec($sql);

    return $result;
}

// del('options', 88);
// del('options', ['subject_id' => 12]);

function del($table, $arg)
{
    $dsn = "mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo = new PDO($dsn, 'root', '');

    $sql = "delete from `$table` where ";
    //is_array判斷是否為陣列，是的話將取出的Key、value值存入$tmp[]陣列，否的話將$arg指派給id欄位
    if (is_array($arg)) {
        foreach ($arg as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        //使用join語法，以&&將$tmp的$key=$value值串接在一起，再以.=結合在"delete from `$table` where"後面
        $sql .= join(" && ", $tmp);
    } else {
        $sql .= " `id` = '$arg' ";
    }

    echo $sql;

    return $pdo->exec($sql);
}

// save('options', 125);

function save($table, $cols)
{
    if (isset($cols['id'])) {
        update($table, $cols);
    } else {
        insert($table, $cols);
    }
}