<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
require_once "../connection.php";
require_once "../utils.php";
require_once "../html.php";

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

<div>
<form method="post">
    <table><tr>
        <td>Название: </td>
        <td><input name="title" type="text" placeholder="Название лота" required="true" /></td>
    </tr><tr>
        <td>Дата окончания: </td>
        <td><input name="endTime" type="date" placeholder="Время окончания" required="true" /></td>
    </tr></table>
    <input name="send" type="hidden" value="true"/>
    <input type="submit" />
    <br /><button onclick="history.back()">Назад</button>
</form>
</div>
<?php
    if (isset($_REQUEST['send'])) {
        $title = $_REQUEST['title'];
        $endTime = $_REQUEST['endTime'];
        $connection = Connection::connect();
        $sql = "insert into auctions (title, isVisible, endTime) values ('$title', true, '$endTime')";
        $query = $connection->query($sql);
        p($query ? "Создан" : "Ошибка");
    }
}
