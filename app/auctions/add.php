<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
require_once "../connection.php";
require "../utils.php";
session_start();
include "../html.php";

if ($_SESSION['priveleges'] !== 'admin') {
    p("Недостаточно прав");
} else {
?>
<h1 style="text-align: center;">Создать лот</h1>
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
    <p><a href="./">Назад</a></p>
    <input name="title" type="text" placeholder="Название" required="true" />
    <br /><input name="endTime" type="date" placeholder="Время окончания" required="true" />
    <input name="send" type="hidden" value="true"/>
    <br /><input type="submit" />
</form>
<?php
    if (isset($_REQUEST['send'])) {
        $title = $_REQUEST['title'];
        $endTime = $_REQUEST['endTime'];
        $connection = Connection::connect();
        $sql = "insert into auctions (title, isVisible, endTime) values ('$title', true, '$endTime')";
        p($sql);
        $query = $connection->query($sql);
        p($query ? "Создан" : "Ошибка");
    }
}
