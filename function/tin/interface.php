<?php

interface Animal
{
    const type = "animal";  //必需是常數
    public function sound();
    public function run();
}


class Cat implements Animal
{

    public function name()
    {
        return "小花";
    }

    public function sound()
    {
        return "汪汪汪";
    }

    public function run()
    {
        return "跑跑";
    }
}



$ani = new Cat;
echo $ani->name();
echo $ani->sound();
echo $ani->run();
