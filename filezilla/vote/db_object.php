<?php
// $dsn = "mysql:host=localhost;charset=utf8;dbname=vote";
// $pdo = new PDO($dsn, 'root', '');

date_default_timezone_set("Asia/Taipei");

session_start();

$msg = [
    1 => "本調查為會員限定，請登入後再進行投票",
    2 => "本調查已結束，請進行其它調查"
];

#建立一個DB類別
class DB
{
    /**
     * 1. 自動連線資料庫
     * 2. 能夠執行CRUD的操作
     * 3. 能指定資料表
     */
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=vote";
    protected $user = "root";
    protected $pw = "";
    protected $table;
    protected $pdo;
    protected $query_result;
    protected $result;


    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
    }

    function all(...$arg)
    {
        $sql = "select * from $this->table ";

        if (!empty($arg)) {
            if (is_array($arg[0])) {
                foreach ($arg[0] as $key => $value) {

                    $tmp[] = "`$key`='$value'";
                }

                $sql = $sql .  " where " . join(" && ", $tmp);
            } else {

                $sql = $sql .  $arg[0];
            }
        }

        if (isset($arg[1])) {
            $sql = $sql .  $arg[1];
        }

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function find($arg)
    {
        $sql = "select * from `$this->table`  where ";

        if (is_array($arg)) {
            foreach ($arg as $key => $value) {

                $tmp[] = "`$key`='$value'";
            }

            $sql .= join(" && ", $tmp);
        } else {

            $sql .= " `id` = '$arg' ";
        }

        //echo $sql; 
        #return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        $this->result = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $this->result;
    }

    function save($cols)
    {
        if (isset($cols['id'])) {
            //update
            foreach ($cols as $key => $value) {
                if ($key != 'id') {
                    $tmp[] = "`$key`='$value'";
                }
            }

            $sql = "update `$this->table` set  " . join(",", $tmp) . " where `id`='{$cols['id']}'";

            return $this->pdo->exec($sql);
        } else {
            //insert
            $keys = array_keys($cols);
            $sql = "insert into $this->table (`" . join("`,`", $keys) . "`) values('" . join("','", $cols) . "')";
            //echo $sql;
            return $this->pdo->exec($sql);
        }
    }

    function del($arg)
    {
        $sql = "delete from `$this->table` where ";
        if (is_array($arg)) {
            foreach ($arg as $key => $value) {

                $tmp[] = "`$key`='$value'";
            }
            $sql .= join(" && ", $tmp);
        } else {
            $sql .= " `id` = '$arg' ";
        }
        //echo $sql;
        return $this->pdo->exec($sql);
    }

    function count(...$arg)
    {
        $sql = "select count(*) from $this->table ";

        if (!empty($arg)) {
            if (is_array($arg[0])) {
                foreach ($arg[0] as $key => $value) {

                    $tmp[] = "`$key`='$value'";
                }

                $sql = $sql . " WHERE " . join(" && ", $tmp);
            } else {

                $sql = $sql .  $arg[0];
            }
        }

        if (isset($arg[1])) {
            $sql = $sql .  $arg[1];
        }

        return $this->pdo->query($sql)->fetchColumn();
    }

    function sum($cols, ...$arg)
    {
        return $this->math('sum', $cols, ...$arg);
    }
    function min($cols, ...$arg)
    {
        return $this->math('min', $cols, ...$arg);
    }
    function avg($cols, ...$arg)
    {
        return $this->math('avg', $cols, ...$arg);
    }
    function max($cols, ...$arg)
    {
        return $this->math('max', $cols, ...$arg);
    }

    //計數用的函式
    private function math($math, $col, ...$arg)
    {
        $sql = "select $math(`$col`) from $this->table ";

        if (!empty($arg)) {
            if (is_array($arg[0])) {
                foreach ($arg[0] as $key => $value) {

                    $tmp[] = "`$key`='$value'";
                }

                $sql = $sql . " where " . join(" && ", $tmp);
            } else {

                $sql = $sql .  $arg[0];
            }
        }

        if (isset($arg[1])) {
            $sql = $sql .  $arg[1];
        }
        //echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }
}

// 執行select 較複雜的語法
function q($sql)
{
    $dsn = "mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo = new PDO($dsn, 'root', '');

    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

//用來傾印陣列內容...direct_dump
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url)
{
    header("location:" . $url);
}

// function pdo()
// {
//     $dsn = "mysql:host=localhost;charset=utf8;dbname=vote";
//     $pdo = new PDO($dsn, 'root', '');

//     return $pdo;
// }
// dd(all('options'));

// find('options',33);
// find('options',['subject_id'=>5,'description'=>'4.5萬']);
// find('options',['subject_id'=>12,'description'=>'200','total'=>'2']);

// update('options', ['id' => 60, 'description' => '1000萬', 'total' => 30]);
// insert('options', ['description' => '600', 'subject_id' => '12','total' => 100]);

// del('options', 64);
// del指令一次只能刪除一個欄位
// del('options', ['subject_id' => 6]);
// del('options', ['total' => 100]);
// echo "<br>";
// echo math('options','max','id');
// echo "<br>";
// echo math('options','min','id');
// echo "<br>";
// echo math('options','sum','total',['subject_id'=>7]);

/* 
 * all($table) => 全部資料表的內容
 * 例:select * from `topics` => all('topics')
 * ---------------------------------------------------------------
 * all($table,$array) => 以and為基礎的符合條件資料
 * 例: select * from `topics` where `type`='1' && `login`=1; => all('topics',['type'=>1,'login'=>1]) ;
 * ---------------------------------------------------------------
 * all($table,$sql) => 以sql字串為條件的資料
 * 例: select * from `topics` where open_time => '2023/06/02' order by `id` desc
 * all(`topcis`,"where open_time => '2023/06/02' order by `id` desc")
 * ---------------------------------------------------------------
 * all($table,$array,$sql) => 符合複雜條件的資料
 * 例: select * from `topics` where `type`=1 && `login`=1  order by `id` desc
 * all(`topcis`,['type'=>1,,'login'=>1], " order by `id` desc")
 */


$Topic = new DB('topics');
$Option = new DB('options');
$Log = new DB('logs');
$User = new DB('members');

class Subject extends DB
{

    function __construct()
    {
        $this->table = 'topics';
        $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
    }

    function find($arg)
    {
        $sql = "select * from `$this->table`  where ";

        if (is_array($arg)) {
            foreach ($arg as $key => $value) {

                $tmp[] = "`$key`='$value'";
            }

            $sql .= join(" && ", $tmp);
        } else {

            $sql .= " `id` = '$arg' ";
        }

        //echo $sql;
        $this->result->this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

        //建立一個stdClass物件，命名為$topic
        $topic = new stdClass;
        foreach ($this->result as $col => $value) {
            // 要存取的是$col變數，而不是col屬性 
            $topic->$col = $value;
        }

        $topic->options = $this->options();
        return $topic; //回傳一個$topic物件，不是一個值
    }

    function options()
    {
        $sql = "select * from `options` where `subject_id`='{$this->result['id']}'";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>