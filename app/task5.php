<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
/*
Разработать приложение по работе с массивом:
Создайте массив, содержащий сведения о продукции фирмы: номер товара, название, цена.
Отсортируйте массив по названиям в алфавитном порядке. Среди товаров с одинаковым названием сначала идут более дешевые.
*/

class Product {
    public $id = 0;
    public $name = "";
    public $price = 0;

    public function __construct($id, $name, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    public function __toString() {
        return "id: $this->id, name: $this->name, price: ¤ $this->price";
    }
}

$products = array(
    new Product(213, "Хлеб", 20),
    new Product(342, "Молоко", 34),
    new Product(842, "Молоко", 33),
    new Product(424, "Тофу", 250),
);

usort($products,  function (Product $o1, Product $o2) {
    if ($o1->name === $o2->name) return $o1->price > $o2->price ? 1 : -1;
    return strcmp($o1->name, $o2->name);
});

foreach ($products as $product) {
    echo $product."<br>";
}
