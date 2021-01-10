<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
require_once "../connection.php";
require_once "../utils.php";
require_once "../html.php";

if (!isset($_SESSION['login'])) {
    go("/");
} else { ?>
<style>
    .change-data {
        display: none;
    }
    .change-data:target {
        display: block;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function (e) {
        const regexpr = /#[a-z\-]*$/gm;
        if (document.location.href.match(regexpr))
            document.location.href = document.location.href.replace(regexpr, '');
    });
</script>
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
            <form method="get">
                <input type="text" name="new-name" required placeholder="Новое имя" />
                <input type="submit" value="Сохранить">
            </form>
            <?php
            if (isset($_REQUEST['new-name'])) {
                $new_name = $_REQUEST['new-name'];
                $sql = "update users set name='$new_name' where login = '$login'";
                p("sql: ".$sql);
                $response = $connection->query($sql);
                p($response);
                /*if (!$response) {
                    ?>
                    <script>alert("Ошибка");</script>
                    <?php
                }*/
            }
            ?>
        </div>
        <p>E-mail: <?= $email ?> <a href="#change-email">Изменить</a></p>
        <div id="change-email" class="change-data">
            <form method="get">
                <input type="email" name="new-email" required placeholder="Новая почта" />
                <input type="submit" value="Сохранить">
            </form>
            <?php
            if (isset($_REQUEST['new-email'])) {
                $new_email = $_REQUEST['new-email'];
                $sql = "update users set email='$new_email' where login = '$login'";
                p("sql: ".$sql);
                $response = $connection->query($sql);
                p($response);
                /*if (!$response) {
                    ?>
                    <script>alert("Ошибка");</script>
                    <?php
                }*/
            }
            ?>
        </div>
        <a href="change-pass.php">Изменить пароль</a>
    </div>
<?php }
