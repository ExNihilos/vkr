<!DOCTYPE html>
<html>
<head>
    <title>Homework</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../Homework2/homework2/index.css"/>
</head>
<body>

<div>
    <form class="taskPanel">
        <input type="submit" name="task1" value="Задание 1"/>
    </form>
    <form class="taskPanel">
        <input type="submit" name="task2" value="Задание 2"/>
    </form>
    <form class="taskPanel">
        <input type="submit" name="task3" value="Задание 3"/>
    </form>
    <form class="taskPanel">
        <input type="submit" name="task4" value="Задание 4"/>
    </form>
    <form class="taskPanel">
        <input type="submit" name="task5" value="Задание 5"/>
    </form>
    <form class="taskPanel">
        <input type="submit" name="task6" value="Задание 6"/>
    </form>
</div>


<?php                                     // Task1
if (isset($_GET['task1'])) {
    for ($i = 2; $i < 10000; $i *= 2) {
        echo '<div class="task">' . $i . '<br>' . '</div>';
    }
}
?>


    <?php                              // Task2
        if (isset($_GET['task2'])):
            if (isset($_GET['string'])) {

                    $string = $_GET['string'];
                    $reversedString = "";
                    for ($i = mb_strlen($string, "UTF-8") - 1; $i >= 0; $i--) {
                        $reversedString .= mb_substr($string, $i, 1, "UTF-8");
                    }

                    echo '<div class="task">'.$reversedString.'</div>';
            }
    ?>

    <form class="task">
        <input type="hidden" name="task2">
        <input type="text" name="string">
        <input type="submit" name="reverseString" value="Преобразовать">
    </form>

<?php endif ?>

<?php
if (isset($_GET['task5'])):
    function changeArray($string, $array)
    {
        if (is_null($array)==false && is_null($string)==false)
        {
            $string = $_GET['string'];

            foreach ($array as &$item) {
                $item .= $string;
            }

            return $array;
        }

        else return false;
    }

    $array = ["1", "2", "3", "4"];
    $array = changeArray("aaa", $array);


    foreach ($array as $item) {
        echo $item.'<br>';
    }
?>

    <form class="task">
        <input type="hidden" name="task5">
        Введите строку: <input type="text" name="string">
        <input type="submit" name="addString" value=Добавить>
    </form>

<?php endif ?>



<?php

if (isset($_GET['task3'])):   // Task 3
function arraySum($array)
{
    if (is_string($array[2]) == false && is_string($array[5]) == false && is_string($array[7]) == false) {
        return $array[2] + $array[5] + $array[7];
    } else {
        echo "Achtung! Achtung!";
    }
}

$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
echo '<br>';

    foreach ($array as $item) {
        echo $item.'<br>';
    }

    for ($i=0; i<count($array); $i++)
    {
        echo "[".$i."] ".$item.'<br>';
    }

echo '<br>'."Сумма 3-го, 6-го и 8-го элементов: ".arraySum($array);

endif;

echo '<br>';


$year = date("Y");                      // 4
$month = date("m");
$day = date("d");
$weekDay = "2";
echo "Год " . $year . " Месяц " . $month . " День " . $day . '<br>';
$date = new DateTime("01.09.2020");
$isTuesday = false;
$m = $date->format("m");
while ($date->format("m") == $m) {
    if ($isTuesday === false) {
        if ($date->format("N") === $weekDay) {
            $isTuesday = true;
        } else {
            $date->add(new DateInterval("P1D"));
        }
    }

    if ($isTuesday === true) {
        echo $date->format("d") . "\t";
        $date->add(new DateInterval("P1W"));
    }
}

function getTuesday($year, $month)           // 6
{
    $weekDay = "2";
    $date = new DateTime("01.$month.$year");
    $isTuesday = false;
    $m = $date->format("m");
    while ($date->format("m") == $m) {

        if ($isTuesday === false) {

            if ($date->format("N") === $weekDay) {
                $isTuesday = true;
            } else {
                $date->add(new DateInterval("P1D"));
            }
        } else {
            echo $date->format("d") . "\t";
            $date->add(new DateInterval("P1W"));
        }
    }
}

echo '<br>';
echo getTuesday("2020", "08");

?>

</body>
</html>

