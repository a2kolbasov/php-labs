<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
$title = "ПР №5";
include_once "connection.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
    <h1><?= $title ?></h1>
    <h2>Текущие записи:</h2>
<?php
$connection = Connection::connect();
$response = $connection->query("SELECT * FROM books");
foreach ($response as $row) {
    $id = $row['id']; $name = $row['name']; $year = $row['year'];
    echo "id: $id<br>";
    echo "Название: $name<br>";
    echo "Год: $year<br>";
    echo "<br>";
}
?>
    <h2>Добавить:</h2>
    <form action="" method="post" name="form">
        <p>Название: <input name="name" type="text"></p>
        <p>Год издания: <input name="year" type="number" size="4" maxlength="4"></p>
        <p>№ издательства: <input name="publisher" type="number"></p>
        <input type="hidden" name="sended">
        <input type="submit" value="Отправить">
    </form>
<?php
function is_set(string $param) {
    return $_POST[$param] && $_POST[$param] != "";
}

if (isset($_POST['sended'])) {
    if (is_set('name') && is_set('year') && is_set('publisher')) {
        $name = $_POST['name'];
        $year = (int) $_POST['year'];
        $publisher = (int) $_POST['publisher'];
        $sql = "insert into books (name, year, publisher) values ('$name', '$year', '$publisher')";
        echo $sql . "<br>";
        $is_added = $connection->query($sql);
        echo $is_added ? "Сохранено<br>" : "Ошибка<br>";
    } else {
        echo "Ошибка<br>";
    }
}
?>
    <button onclick="document.location.replace(window.location.href)">Обновить</button>
</body>
</html>
