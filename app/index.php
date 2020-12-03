<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
$title = "ПР №4, вариант №5";
include("tasks.php");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>

<body>
    <h1><?= $title ?></h1>
    <div>
        <?php { ?>
        <h2>Задание 6</h2>
        <?php $response = Task6::run() ?>
        <h3>Файл:</h3>
        <?=$response["text"]?>
        <h3>Ответ:</h3>
        <?=$response["word"]?>
        <?php } ?>
    </div>
    <div>
        <?php { ?>
        <h2>Задание 7</h2>
        <form method="POST">
            <?php foreach (array("mkfile", "rmfile", "info") as $act) { ?>
            <input type="radio" name="act" value="<?=$act?>">
            <label><?=$act?></label>
            <br>
            <?php } ?>
            <input type="submit" value="Отправить">
        </form>
        <div>
            <?php if (isset($_REQUEST["act"])) { ?>
            <b>Ответ:</b>
            <?= Task7::{$_REQUEST["act"]}() ?>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</body>

</html>
