<?php
//echo "<pre>";
//print_r(find('options',23));
//echo "</pre>";
//echo "<pre>";
//print_r(find('options',['subject_id'=>5,'description'=>'4.5萬']));
//echo "</pre>";
/* echo "<pre>";
print_r(all('options'));
echo "</pre>"; */

update('options', ['id' => 59, 'description' => '100萬', 'total' => 300]);
insert('options', ['description' => '50萬', 'subject_id' => '6','total' => 200]);

//insert('options',['description'=>'60萬','subject_id'=>5,'total'=>0]);
del('options', 8);
del('options', ['subject_id' => 5]);

function all($table)
{
    $dsn = "mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo = new PDO($dsn, 'root', '');

    $sql = "select * from $table ";

    $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    return $rows;
}

function find($table, $arg)
{
    $dsn = "mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo = new PDO($dsn, 'root', '');

    $sql = "select * from `$table`  where ";

    if (is_array($arg)) {
        foreach ($arg as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }

        $sql .= join(" && ", $tmp);
    } else {
        $sql .= " `id` = '$arg' ";
    }

    echo $sql;

    $row = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

    return $row;
}

//一次更新一筆
function update($table, $cols)
{
    $dsn = "mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo = new PDO($dsn, 'root', '');

    //['subject'=>'今天天氣很好吧?',
    // 'open_time'=>'2023-05-29',
    // 'close_time'=>'2023-06-05',
    //]
    foreach ($cols as $key => $value) {
        if ($key != 'id') {
            $tmp[] = "`$key`='$value'";
        }
    }

    //`subject`='今天天氣很好吧?',`open_time`='2023-05-29',`close_time`='2023-06-05'

    $sql = "update `$table` set  " . join(",", $tmp) . " where `id`='{$cols['id']}'";

    $result = $pdo->exec($sql);

    return $result;
}

function insert($table, $cols)
{
    $dsn = "mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo = new PDO($dsn, 'root', '');
    $col = array_keys($cols);

    /*     $sql ="insert into $table (`";
    $sql .=join("`,`", $col);
    $sql .="`) values('";
    $sql .=join("','",$cols);
    $sql .="')"; */

    $sql = "insert into $table (`" . join("`,`", $col) . "`) values('" . join("','", $cols) . "')";
    //echo $sql;

    $result = $pdo->exec($sql);

    return $result;
}


function del($table, $arg)
{
    $dsn = "mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo = new PDO($dsn, 'root', '');

    $sql = "delete from `$table` where ";
    if (is_array($arg)) {
        foreach ($arg as $key => $value) {

            $tmp[] = "`$key`='$value'";
        }
        $sql .= join(" && ", $tmp);
    } else {
        $sql .= " `id` = '$arg' ";
    }
    echo $sql;
    return $pdo->exec($sql);
}

function save($table, $cols)
{
    if (isset($cols['id'])) {
        update($table, $cols);
    } else {
        insert($table, $cols);
    }
}
