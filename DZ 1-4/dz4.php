<?php

/*$content = file_get_contents('https://www.google.com/robots.txt');
file_put_contents('robots.txt', $content);


$content = file_get_contents('robots.txt');


$content = str_replace('www.google.com', 'site.ru', $content);


file_put_contents('robots.txt', $content);


echo '<pre>' . htmlspecialchars($content) . '</pre>';*/


/*function processXml(string $fileName): void
{
    if (!file_exists($fileName)) {
        echo "Файл $fileName не найден<br>";
        return;
    }

    $xml = simplexml_load_file($fileName);

    if ($xml === false) {
        echo "Ошибка чтения XML-файла $fileName<br>";
        return;
    }

    echo "<h3>Файл: $fileName</h3>";

    foreach ($xml->item as $item) {
        echo "active: " . htmlspecialchars((string)$item->attributes()->active) . "<br>";
        echo "name: " . htmlspecialchars((string)$item->name) . "<br>";
        echo "price: " . htmlspecialchars((string)$item->price) . "<br>";
        echo "oldPrice: " . htmlspecialchars((string)$item->oldPrice) . "<br>";
        echo "<hr>";
    }
}

processXml('test.xml');
processXml('test2.xml');*/


class Basket
{
    private array $items = [];

    public function addItem(array $arr): void
    {
        if (
            !isset($arr['id']) ||
            !isset($arr['name']) ||
            !isset($arr['price'])
        ) {
            echo "Ошибка: товар должен содержать id, name и price<br>";
            return;
        }

        $this->items[] = $arr;
    }

    public function showItems(): void
    {
        echo "<pre>";
        print_r($this->items);
        echo "</pre>";
    }

    public function deleteItem(int $id): void
    {
        foreach ($this->items as $key => $item) {
            if ($item['id'] === $id) {
                unset($this->items[$key]);
            }
        }

        $this->items = array_values($this->items);
    }
}


$basket = new Basket();

$basket->addItem([
    'id' => 1,
    'name' => 'Телефон',
    'price' => 15000
]);

$basket->addItem([
    'id' => 2,
    'name' => 'Наушники',
    'price' => 5000
]);

$basket->addItem([
    'id' => 3,
    'name' => 'Мышка',
    'price' => 2500
]);

echo "<h3>Корзина до удаления:</h3>";
$basket->showItems();

$basket->deleteItem(2);

echo "<h3>Корзина после удаления товара с id = 2:</h3>";
$basket->showItems();
?>