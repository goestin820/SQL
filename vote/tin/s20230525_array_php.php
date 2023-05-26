<?php
function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

// PHP Indexed Arrays
$indexArr = [1, 2, 3, 4, 5];
dd($indexArr);

// PHP Associative Arrays
$assArr = [
    's1' => 'amy',
    's2' => 'bob',
    's3' => 'cat',
];
dd($assArr);

// 多維陣列 PHP Multidimensional Arrays
// 北部
// 中部
// 南部
$store = [
    's1' => [
        ['test', 'test2', ['a', 'b', 'c']], 2, 3
    ],
    's2' => '中部',
    's3' => '南部',
];
print_r($store);
dd($store);

dd($store['s1'][0][2][2]);

// id
// name
// mobile
// 1 amy 0911-111-111
// 2 bob 0922-222-222
// 3 cat 0933-333-333

$data = [
    0 => [
        'id' => 1,
        'name' => 'amy',
        'mobile' => '0911-111-111'
    ],
    1 => [
        'id' => 2,
        'name' => 'bob',
        'mobile' => '0922-222-222'
    ],
    2 => [
        'id' => 3,
        'name' => 'cat',
        'mobile' => '0933-333-333'
    ],
];

dd($data);

foreach ($data as $key => $value) {
    dd($value['id']);
    dd($value['name']);
    dd($value['mobile']);
}
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <h2>HTML Table</h2>

    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>mobile</th>
        </tr>
        <?php foreach ($data as $key => $value) : ?>
            <tr>
                <td><?= $value['id']; ?></td>
                <td><?= $value['name']; ?></td>
                <td><?= $value['mobile']; ?></td>
            </tr>
        <?php endforeach; ?>

        <?php
        foreach ($data as $key => $value) {
        ?>
            <tr>
                <td><?= $value['id']; ?></td>
                <td><?= $value['name']; ?></td>
                <td><?= $value['mobile']; ?></td>
            </tr>
        <?php
        }
        ?>


    </table>

</body>

</html>