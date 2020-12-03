<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
/*
Написать функцию для решения задачи в соответствии с индивидуальным заданием,
входные данные передаются через форму.

∑(n=1…k) (-1**(a*n-1))/((b*n+c)!)
Значение k задает пользователь,
a = 2,
b = 2,
c = 4.
*/

function calc($k) {
    $k = (int) $k;
    $result = 0;
    for ($n = 1; $n <= $k; $n++) {
        $result += calc4N($n);
    }
    return $result;
}

function calc4N($n) {
    $a = 2;
    $b = 2;
    $c = 4;
    return ( (-1) ** ($a * $n - 1) ) / factorial($b * $n + $c);
}

function factorial(int $val) {
    return $val == 0 ? 1 : $val * factorial($val - 1);
}
?>
<form method="get">
    k:
    <input type="number" name="k">
    <input type="hidden" name="task" value="7">
    <input type="submit" value="Отправить">
</form>
<div>
    <?php if ($_REQUEST["task"] == 7) { ?>
    Ответ:
    <?= calc($_REQUEST["k"]) ?>
    <?php } ?>
</div>
