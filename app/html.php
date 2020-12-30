<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
if (!isset($title)) $title = "Аукцион";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
</head>
<body>
    <style type="text/css">
        .header {
            position: fixed;
            top: 5px;
            right: 5px;
        }
    </style>
    <div class="header">
        <a href="/">На главную</a>
        <a href="/auctions">Аукционы</a>
        <a href="/signin">Войти</a>
        <a href="/signup">Регистрация</a>
        <a href="/signout">Выйти</a>
    </div>
    <p><br/></p>