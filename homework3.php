<?php
//function someFunction()
//{
//    $name = "as";
//    $age = 20;
//    $pdo = new PDO("mysql:host=localhost;dbname=db_homework", 'root', 'qwerty123456');
//    $sql = "INSERT INTO users (name, age) VALUES ('$name', $age)";
//    $pdo->exec("set names utf8");
//    $pdo->exec($sql);
//}

//someFunction();

$pdo = new PDO("mysql:host=localhost;dbname=db_homework", 'root', 'qwerty123456');

function firstTask()
{
    global $pdo;
    $symbols = 'абвгдежзиклмнопрстуфхцэюя';

    for ($i = 0; $i < 1000; $i++) {

        $age = rand(10, 100);
        $string = '';
        for ($j = 0; $j < 7; $j++) {
            $index = rand(0, mb_strlen($symbols) - 1);
            $string .= mb_substr($symbols, $index, 1);
            if ($j == 0) {
                $string = mb_strtoupper($string);
            }
        }

        $name = $string;
        $sql = "INSERT INTO `users` (`name`, `age`) VALUES('$name', '$age')";
        $pdo->exec($sql);
    }
}

//firstTask();

function secondTask()
{
    global $pdo;
    $sql = "SELECT * FROM users WHERE age>50";
    $stmt = $pdo->query($sql);
    $array = $stmt->fetchAll();
    foreach ($array as $item) {
        echo $item['name'] . "\n";
    }
}

//secondTask();

function thirdTask()
{
    global $pdo;
    $sql = "SELECT * FROM users WHERE name LIKE '%ав%' OR name LIKE '%аб%'";
    $stmt = $pdo->query($sql);
    $array = $stmt->fetchAll();
    echo json_encode($array);
    //var_export(json_decode(json_encode($array)));
}

echo "\n";
//thirdTask();

function fourthTask()
{
    global $pdo;
    $sql = "UPDATE users SET name = 'Pepito' WHERE age>70";
    $pdo->exec($sql);
}

echo "\n";
//fourthTask();


function fifthTask()
{
    global $pdo;
    $sql = "SELECT DISTINCT name FROM users";
    $stmt = $pdo->query($sql);
    $array = $stmt->fetchAll();
    foreach ($array as $item) {
        echo $item['name'] . "\n";
    }
}

echo "\n";
fifthTask();

?>