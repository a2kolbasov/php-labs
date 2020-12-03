<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
$title = "ПР 2, вариант 5";
session_start();
// session_destroy();

class Product {
    private $id;
    private $name;

    public function __construct(string $id, string $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId() {return $this->id;}

    public function getName() {return $this->name;}
}

$products = array(
    new Product("A4", "Бумага А4"),
    new Product("A3", "Бумага А3"),
    new Product("pens", "Набор ручек"),
);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
    <a href="setUserName.php" style="position: absolute; top: 5px; right: 5px">Изменить имя</a>
    <h1><?= $title ?></h1>
    <div>
        <?php $userName = $_SESSION["userName"] ?>
        <?= "Здравствуйте" . ($userName != "" ? ", $userName!" : "!") ?>
    </div>
    <div>
        <h2>Заказать канцелярские товары</h2>
        <form method="get">
            <input type="hidden" name="sended">
            <div id="cart">
                <?php foreach ($products as $product) { ?>
                    <input type="checkbox" name="<?= $product->getId() ?>">
                    <label><?= $product->getName() ?></label><br>
                <?php } ?>
            </div>
            Кабинет № <input type="text" name="office" required><br>
            Почта: <input type="email" name="email" required><br>
            <input type="submit">
        </form>
    </div>
    <div>
        <?php if (isset($_REQUEST["sended"])) { ?>
            Вы заказали:
            <ol>
            <?php foreach ($products as $product) {
                if (isset($_REQUEST[$product->getId()])) { ?>
                    <li><?= $product->getName() ?></li>
                <?php }
            } ?>
            </ol>
            После сборки заказа, его принесут в кабинет №<?= $_REQUEST["office"] ?>.<br>
            Копию заказа отправят на e-mail: <?=$_REQUEST["email"]?>
        <?php } ?>
    </div>
</body>
</html>
