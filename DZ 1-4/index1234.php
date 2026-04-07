<?php
/*$stringVar = "Привет, мир!";
$stringVar2 = "Это тоже строка";
$intVar = 42;
$intVar2 = -100;
$floatVar = 3.14159;
$floatVar2 = 2.0;
$boolVarTrue = true;
$boolVarFalse = false;
$arrayVar = [1, 2, 3, "четыре", "пять"];
$arrayVar2 = array("имя" => "Иван", "возраст" => 25, "город" => "Москва");
$nullVar = null;
$fileResource = fopen('php://memory', 'r');
$objectVar = new stdClass();
$objectVar->name = "Тестовый объект";
$objectVar->value = 100;

echo "<h2>4. Комбинированный вывод:</h2>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Переменная</th><th>Тип</th><th>var_dump()</th><th>print_r()</th><th>echo</th></tr>";

$variables = [
    'stringVar' => ['Строка', $stringVar],
    'intVar' => ['Целое число', $intVar],
    'floatVar' => ['Float', $floatVar],
    'boolVarTrue' => ['Boolean true', $boolVarTrue],
    'boolVarFalse' => ['Boolean false', $boolVarFalse],
    'arrayVar' => ['Массив', $arrayVar],
    'nullVar' => ['NULL', $nullVar]
];

foreach ($variables as $key => $info) {
    echo "<tr>";
    echo "<td><b>$key</b></td>";
    echo "<td>{$info[0]}</td>";
    echo "<td><pre>" . htmlspecialchars(var_export($info[1], true)) . "</pre></td>";
    echo "<td><pre>" . htmlspecialchars(print_r($info[1], true)) . "</pre></td>";
    echo "<td>" . htmlspecialchars(@(string)$info[1]) . "</td>";
    echo "</tr>";
}
echo "</table>";*/

/*umbers = [10, 20, 30, 40, 50];

echo "Задание 1: Вывод массива<br>";
echo "Вывод через for():<br>";
for ($i = 0; $i < count($numbers); $i++) {
    echo $numbers[$i] . "<br>";
}

echo "<br>Вывод через foreach():<br>";
foreach ($numbers as $value) {
    echo $value . "<br>";
}

echo "<br>Задание 2: Конкатенация констант<br>";
define("FIRST", "Hello");
define("SECOND", "World");
$result = FIRST . " " . SECOND;
echo $result . "<br><br>";

echo "Задание 3: Сравнение переменных<br>";
$x = 5;
$y = "5";

if ($x === $y) {
    echo "равны";
} elseif ($x == $y) {
    echo "равны, но разного типа";
} else {
    echo "не равны";
}*/


/*$a = 5;
$a += 10;
$a *= 5;
?>
Значение <?=$a?>*/

/*$num = 15;

if ($num > 10) {
    echo 'Большое число';
} elseif ($num == 5) {
    echo 'Среднее число';
} else {
    echo 'Число слишком мало';
}
?>*/

/*
$num = 3;

switch ($num) {
    case 10:
        echo 'Большое число';
        break;
    case 5:
    case 6:
    case 7:
    case 8:
        echo 'Среднее число';
        break;
    default:
        echo 'Число слишком мало';
}*/

/*
echo "Цикл while():<br>";
$i = 1;
while ($i <= 5) {
    echo "Итерация while: $i<br>";
    $i++;
}

echo "<br>Цикл do...while():<br>";
$j = 1;
do {
    echo "Итерация do...while: $j<br>";
    $j++;
} while ($j <= 5);

echo "<br>Разница при условии false:<br>";

echo "while (условие false):<br>";
$k = 10;
while ($k <= 5) {
    echo "Это не выполнится<br>";
    $k++;
}

echo "<br>do...while (условие false):<br>";
$l = 10;
do {
    echo "Это выполнится один раз<br>";
    $l++;
} while ($l <= 5);
?>*/

/*
$arr = [];

for ($i = 0; $i < 10; $i += 2) {
    $arr[] = $i;
}

echo "<pre>";
print_r($arr);
echo "</pre>";
?>*/

/*$arr = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

foreach ($arr as $value) {
    if ($value == 3) {
        continue;
    }
    if ($value == 8) {
        echo 'the end';
        break;
    }
    echo $value . "<br>";
}
?>*/
/*echo '<pre>REQUEST<br>';
print_r($_REQUEST);
echo '<br>GET<br>';
print_r($_GET);
echo '<br>POST<br>';
print_r($_POST);
echo '<br>FILES<br>';
print_r($_FILES);
echo "</pre>";
?>

<form enctype="multipart/form-data" action="/action.php?step=1" method="post">
   <input type="hidden" name="type" value="personal" />
   Ваше имя: <input type="text" name="name" /> <br/>
   Ваш возраст: <input type="text" name="age" /><br/>
   Ваш файл: <input type="file" name="download_file"  multiple/><br/>
   <input type="submit" value="send"/>
</form>
*/
/*function getitem(...$array)
{
    return count($array);
}

echo getitem(['id' => 10, 'price' => 5]);
?>*/

