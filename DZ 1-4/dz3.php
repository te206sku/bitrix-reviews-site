
<?php
/*задание 1
$arr = ['apple', 'banana', 'orange', 'grape', 'kiwi', 'mango', 'pear'];

$result = '';

if (!empty($_POST['fruit'])) {
    $fruit = trim($_POST['fruit']);
    $found = false;

    foreach ($arr as $item) {
        if ($item === $fruit) {
            $found = true;
            break;
        }
    }

    $result = $found ? 'Найдено' : 'Не найдено';
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Поиск фрукта</title>
</head>
<body>
    <form method="post">
        <input type="text" name="fruit" placeholder="Введите фрукт">
        <button type="submit">Найти</button>
    </form>

    <?php if ($result !== ''): ?>
        <p><?= $result ?></p>
    <?php endif; ?>
</body>
</html>
*/

/* задание 2 
session_start();

if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['count']++;

    $text = isset($_POST['text']) ? trim($_POST['text']) : '';

    setcookie('text', $text, time() + 3600, '/');

    $_COOKIE['text'] = $text;
}

$count = isset($_SESSION['count']) ? $_SESSION['count'] : 0;
$value = !empty($_COOKIE['text']) ? htmlspecialchars($_COOKIE['text']) : '';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Количество отправок - <?= $count ?></title>
</head>
<body>
    <form method="post">
        <input type="text" name="text" value="<?= $value ?>">
        <button type="submit">Отправить</button>
    </form>

    <p>Количество отправок: <?= $count ?></p>
</body>
</html>
*/

/* задание 3 

function countdays(int $month1, int $month2): string
{
    if ($month1 < 1 || $month1 > 12 || $month2 < 1 || $month2 > 12) {
        throw new Exception('Месяцы должны быть в диапазоне от 1 до 12');
    }

    if ($month2 <= $month1) {
        throw new Exception('Второй месяц должен быть больше первого');
    }

    $year = date('Y');

    $start = new DateTime("$year-$month1-01");
    $end = new DateTime("$year-$month2-01");
    $end->modify('last day of this month');

    $interval = $start->diff($end);
    $days = $interval->days + 1;

    return 'Между ' . $start->format('d.m') . ' и ' . $end->format('d.m') . ' находится дней: ' . $days;
}

try {
    echo countdays(6, 9);
} catch (Exception $e) {
    echo 'Ошибка: ' . $e->getMessage();
}