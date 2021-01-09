<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
require_once "../connection.php";
require "../utils.php";
session_start();
include "../html.php";

if (isset($_SESSION['login'])) {
    p("Разлогиньтесь");
    // go("/");
} else {
?>
<h1 style="text-align: center;">Регистрация</h1>
<style type="text/css">
        input {
            width: 400px;
        }
        form {
            position: relative;
            left: 30%;
        }
    </style>
<div>
<form method="get">
    <input name="login" type="text" placeholder="Логин" required="true" />
    <br /><input name="password" type="password" placeholder="Пароль" required="true" />
    <br /><input name="email" type="email" placeholder="e-mail" required="true" />
    <br /><input name="name" type="text" placeholder="ФИО" required="true" />
    <input name="send" type="hidden" value="true"/>
    <br /><input type="submit" />
</form>
</div>
<?php
    if (isset($_REQUEST['send'])) {
        $login = $_REQUEST['login'];
        $password = password_hash($_REQUEST['password'], PASSWORD_BCRYPT);
        $email = $_REQUEST['email'];
        $name = $_REQUEST['name'];

        $db = Connection::connect();
        $sql = "insert into users (login, password, pw_hash, name, email, priveleges) values
        ('$login', '$password', 'bcrypt', '$name', '$email', 'user')";
        p($sql);
        $isAdded = $db->query($sql);
        p("<p>".($isAdded ? "Успешно" : "Ошибка: логин уже занят")."</p>");
    }
}
