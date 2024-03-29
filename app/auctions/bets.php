<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
require_once "../connection.php";
require_once "../utils.php";
require_once "../html.php";

if (isset($_REQUEST['id'])) {
    $id = (int) $_REQUEST['id'];
    $connection = Connection::connect();
    $sql = "select * from auctions where id = $id";
    $auction = $connection->query($sql);
    $sql = "select * from bets where auction = $id";
    $bets = $connection->query($sql);
    if (!$auction) p("Лот не найден");
    else {
        $maxPrice = 0;
        $title = $auction[0]['title'];
        $endTimeFromDB = $connection->query("select endTime from auctions where id=$id")[0]["endTime"];
        $endTimestamp = Time::getTimestamp($endTimeFromDB);
        $endTime = date(Time::fullTimeFormat, $endTimestamp);
        $nowTimestamp = time();
        echo "<h2>$title</h2>";
        p("Время окончания аукциона: <b>$endTime (UTC)</b>");
?>
<a href="" class="center">Обновить</a>
<table class="center">
    <tr>
        <th>№ заявки</th><th>Ставка</th><th>Пользователь</th><th>Время (UTC)</th>
    </tr>
<?php
        foreach ($bets as $bet) {
            $betId = $bet['id'];
            $price = (int) $bet['price'];
            $maxPrice = max($price, $maxPrice);
            $time = Time::format( $bet['time'], Time::fullTimeFormat);
            $user = $bet['user'];

?>
    <tr>
        <td><?=$betId?></td><td><?=$price?> ¤</td><td><?=$user?></td><td><?=$time?></td>
    </tr>
<?php
        }
?>
</table>
<?php
    p("Текущая максимальная ставка: $maxPrice ¤");
        if($_SESSION['login'] && $nowTimestamp < $endTimestamp) {
            $login = $_SESSION['login'];
            ?>
            <p>Сделать ставку:</p>
            <div class="center">
            <form method="post">
                <input type="number" name="newPrice" placeholder="Цена"/>
                <input type="hidden" name="newBet" value="true"/>
                <br/><input type="submit" value="Отправить"/>
            </form>
            </div>
            <?php
            if (isset($_REQUEST['newBet'])) {
                $newPrice = (int) $_REQUEST['newPrice'];
                if ($newPrice <= $maxPrice) {
                    p("Ставка ниже текущей максимальной");
                } else {
                    $sql = "insert into bets (auction, price, user) values ($id, $newPrice, '$login')";
                    $isBetAdded = $connection->query($sql);
                    p($isBetAdded ? "Принято" : "Ошибка");
                    go("");
                }
            }
        }
    }
}
