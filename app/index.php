<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
$title = "ПР №3, вариант №5";
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>

<body>
    <h1><?= $title ?></h1>
    <?php for ($taskNum = 5; $taskNum <= 7; $taskNum++) { ?>
    <h2>Задание <?=$taskNum?></h2>
    <div>
        <?php include("task" . $taskNum . ".php") ?>
    </div>
    <?php } ?>
</body>

</html>
