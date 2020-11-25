<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
session_start();
if (isset($_REQUEST["userName"])) $_SESSION["userName"] = $_REQUEST["userName"];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <a href="/">Домой</a>
    <form method="post">
        Имя:
        <input type="text" name="userName" value="<?= $_SESSION["userName"] ?>">
        <input type="submit" value="Изменить">
    </form>
</body>
</html>
