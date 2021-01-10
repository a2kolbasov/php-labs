<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
require_once "../connection.php";
require_once "../utils.php";
require_once "../html.php";

if (isset($_SESSION['login'])) {
    p("Разлогиньтесь");
    go("/");
} else {
?>
<h1 class="center">Регистрация</h1>
<div class="center">
<form method="post">
    <input name="login" type="text" placeholder="Логин" required />
    <br /><input name="password" type="password" placeholder="Пароль" required />
    <br /><input name="email" type="email" placeholder="e-mail" required />
    <br /><input name="name" type="text" placeholder="ФИО" required />
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
        $isAdded = $db->query($sql);
        p($isAdded ? "Успешно" : "Ошибка: логин уже занят");
    }
}
