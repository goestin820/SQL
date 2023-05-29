<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>自訂函式</title>
</head>

<body>
    <?php
    $name = "mack";

    // $sum = sum(15, 21);
    // echo $sum;
    // echo sum(15, 21);

    echo sum(10, 20, 30, 40, 50);
    echo "<br>";
    g();
    echo "<br>";
    echo circle(10);
    echo "<br>";
    echo circle(10, 6.18);
    ?>
</body>

</html>


<?php
// function sum1($a,$b){

// //return $a+$b;

// $sum=$a+$b;

// return $sum1;

// }

function sum(...$arg)
{
    $sum = 0;

    foreach ($arg as $num) {
        $sum = $sum + $num;
    }

    return $sum;
    //return $a+$b;

    // print_r($arg);

}

function g()
{
    global $name;

    echo "My name is " . $name;
}

function circle($r, $p = 3.1415)
{
    return $r * $r * $p;
}
?>