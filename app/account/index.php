<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
require_once "../connection.php";
require_once "../utils.php";
require_once "../html.php";

if (!isset($_SESSION['login'])) {
    go("/");
} else { ?>
<script>
    document.addEventListener("DOMContentLoaded", function (e) {
        const regexpr = /#[a-z\-]*$/gm;
        if (document.location.href.match(regexpr))
            document.location.href = document.location.href.replace(regexpr, '');
    });
</script>
<div class="center">
    <div>
        <?php
        $connection = Connection::connect();
        $login = $_SESSION['login'];
        $user_data = $connection->query("select name, email from users where login='$login'")[0];
        $name = $user_data['name'];
        $email = $user_data['email'];
        ?>
        <p>Логин: <b><?= $_SESSION['login'] ?></b></p>
        <p>Имя: <?= $name ?> <a href="#change-name">Изменить</a></p>
        <div id="change-name" class="change-data">
            <form method="post">
                <input type="text" name="new-name" required placeholder="Новое имя" />
                <br/><input type="submit" value="Сохранить">
            </form>
            <?php
            if (isset($_REQUEST['new-name'])) {
                $new_name = $_REQUEST['new-name'];
                $sql = "update users set name='$new_name' where login = '$login'";
                $response = $connection->query($sql);
            }
            ?>
        </div>
        <p>E-mail: <?= $email ?> <a href="#change-email">Изменить</a></p>
        <div id="change-email" class="change-data">
            <form method="post">
                <input type="email" name="new-email" required placeholder="Новая почта" />
                <br/><input type="submit" value="Сохранить">
            </form>
            <?php
            if (isset($_REQUEST['new-email'])) {
                $new_email = $_REQUEST['new-email'];
                $sql = "update users set email='$new_email' where login = '$login'";
                $response = $connection->query($sql);
            }
            ?>
        </div>
        <p><a href="change-pass.php">Изменить пароль</a></p>
    </div>
</div>
<?php }
