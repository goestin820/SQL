<?php

class Animal{

    private $age=10;
    protected $name;
    protected $hair="紅色";

    function __construct($name)
    {
        // echo "建立物件";
        $this->name=$name;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        return $this->name=$name;
    }

    public function age(){
        return $this->age;
    }   

    protected function run(){
        return "跑跑跑";
    }

    private function speed(){
        return "跑速1000";
    }
}

// Uncaught ArgumentCountError: Too few arguments to function Animal::__construct(), 0 passed and exactly 1 expected
// $animal=new Animal;
$animal=new Animal('小明');
echo "<br>";
echo $animal->getName();
$animal->setName("小莉");
echo $animal->getName();
//echo $animal->hair;
//echo $animal->speed();
echo $animal->age();


class Cat extends Animal{
    private $age;

    function __construct($name,$age)
    {
        $this->name=$name;
        $this->age=$age;
    }

    function catrun(){
        return $this->run();
    }

    function age(){
        return $this->age;
    }

    function run(){
        return "走走走";
    }
}


echo "<BR>";
$cat=new Cat('小花',30);
echo "<BR>";

// echo $cat->$name;
// echo "<BR>";
echo $cat->age();
echo "<BR>";
echo $cat->catrun();
echo "<BR>";
echo $cat->run();
echo "<BR>";