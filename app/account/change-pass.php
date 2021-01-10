<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
require_once "../connection.php";
require_once "../utils.php";
require_once "../html.php";

if (!isset($_SESSION['login'])) {
    go("/");
} else { ?>
    <p>Новый пароль:</p>
    <div class="center">
        <form method="post">
            <input type="password" name="new-pass" required placeholder="Новый пароль"/>
            <br/><input type="submit" value="Отправить"/>
            <br/><a href=".">Назад</a>
        </form>
    </div>
        <?php
        if (isset($_REQUEST['new-pass'])) {
            $connection = Connection::connect();
            $login = $_SESSION['login'];
            $password = password_hash($_REQUEST['new-pass'], PASSWORD_BCRYPT);
            $sql = "update users set password = '$password', pw_hash = 'bcrypt' where login = '$login'";
            $isChanged = $connection->query($sql);
            p($isChanged ? "Пароль изменён" : "Ошибка");
        }
    }
