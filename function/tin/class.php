<?php

class Animal
{
    protected $name = "大雄";
    protected $hair = "紅色";
    private $age = 10;

    //建構式
    function __construct()
    {
        echo "建立物件";
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        return $this->name = $name;
    }

    public function age()
    {
        return $this->age;
    }

    protected function run()
    {
        return "跑跑跑";
    }

    private function speed()
    {
        return "跑速1000";
    }
}

//建立一個物件(實例) = new 類別名稱
$animal = new Animal;
echo "<br>";
// echo $animal->name;
//危險存取，不建議使用此方法
// $animal->name = "小莉";
echo "<br>";
echo $animal->getName();
echo "<br>";
$animal->setName("小莉");
echo $animal->getName();


//不能直接呼叫protected和private
// echo $animal->hair;
// echo $animal->age;

echo $animal->age();
// echo $animal->age;
// echo $animal->speed();

//繼承，假如內容為空的話，表示父類別完全複製一份過來
class Cat extends Animal
{

    function catrun()
    {
        return $this->run();
    }

    function run()
    {
        return "去去走走走";
    }
}
echo "<br>";

//建立物件
$cat = new Cat;
//回傳值age值為10
echo $cat->age();
echo "<br>";

//跑跑跑=>走走走
echo $cat->catrun();
echo "<br>";

//因為$cat已經覆蓋改寫了父類別為public，所以可以直接呼叫run()
echo $cat->run();
echo "<br>";

// echo run();
// echo "<br>";