<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
require_once "../connection.php";
session_start();
include "../html.php";
include "../utils.php";

if (!isset($_SESSION['login'])) { ?>
<h1 style="text-align: center;">Войти</h1>
<style type="text/css">
        input {
            width: 400px;
        }
        form {
            position: relative;
            left: 30%;
        }
    </style>
<form method="get">
    <input name="login" type="text" placeholder="Логин" required="true" />
    <br /><input name="password" type="password" placeholder="Пароль" required="true" />
    <input name="send" type="hidden" value="true"/>
    <br /><input type="submit" />
</form>
<?php
    if (isset($_REQUEST['send'])) {
        $login = $_REQUEST['login'];
        $password = $_REQUEST['password'];
        $sql = "select password, priveleges from users where login = '$login'";
        $query = Connection::connect()->query($sql);
        $dbPassword = $query ? $query[0]['password'] : null;
        p($dbPassword);
        p($password);
        p(password_verify($password, $dbPassword) ? "t" : "f");
        if (!$query) echo p("Неверный логин");
        else if (!password_verify($password, $dbPassword)) echo p("Неверный пароль");
        else {
            $_SESSION['login'] = $login;
            $_SESSION['priveleges'] = $query[0]['priveleges'];
            p("Вы вошли");
            go(".");
        }
    }
} else {
    p("Вы уже вошли");
    // go("/");
}
