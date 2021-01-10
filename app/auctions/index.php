<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
require_once "../connection.php";
require_once "../utils.php";
require_once "../html.php";

$connection = Connection::connect();
$sql = "select * from auctions";
$auctions = $connection->query($sql);
?>
<div>
<a href="add.php" class="center" style="display:<?=$_SESSION['priveleges'] === 'admin' ? 'inherit' : 'none'?>">Добавить</a>
<table class="center">
    <tr>
        <th>№</th><th>Название</th><th>Дата начала</th><th>Дата окончания</th>
    </tr>
<?php
foreach ($auctions as $auction) {
    $id = $auction['id'];
    $title = $auction['title'];
    $isVisible = $auction['isVisible'] == 1;
    $startTime = Time::format($auction['startTime'], Time::timeFormat);
    $endTime = Time::format($auction['endTime'], Time::timeFormat);

    if (!$isVisible) continue;
?>
    <tr>
        <td><?=$id?></td><td><a href="bets.php?id=<?=$id?>"><?=$title?></a></td><td><?=$startTime?></td><td><?=$endTime?></td>
    </tr>
<?php
}
?>
</table>
</div>
