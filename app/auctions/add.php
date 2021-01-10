<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
require_once "../connection.php";
require_once "../utils.php";
require_once "../html.php";

if ($_SESSION['priveleges'] !== 'admin') {
    p("Недостаточно прав");
} else {
?>
<h1 class="center">Создать лот</h1>
<div class="center">
<form method="post">
    <table><tr>
        <td>Название: </td>
        <td><input name="title" type="text" placeholder="Название лота" required /></td>
    </tr><tr>
        <td>Дата окончания: </td>
        <td><input name="endTime" type="date" placeholder="Время окончания" required /></td>
    </tr></table>
    <input name="send" type="hidden" value="true"/>
    <input type="submit" style="width: 100%;"/>
    <br /><a href=".">Назад</a>
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
