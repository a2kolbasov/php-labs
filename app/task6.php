<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
/*
Написать функцию в соответствии с индивидуальным заданием, входные данные передаются через форму.

Создать пользовательскую функцию, которая принимает два аргумента, а возвращает их произведение.
Вызовите функцию, передав ей в качестве аргументов два числа и выведите на экран результат.
*/
function multiply($a, $b) {
    return (float) $a * (float) $b;
}

?>
<form method="get">
    <input type="number" step="0.01" name="a">
    <input type="number" step="0.01" name="b">
    <input type="hidden" name="task" value="6">
    <input type="submit" value="Отправить">
</form>
<? if ($_REQUEST["task"] == 6) { ?>
<div>
    Ответ:
    <?= multiply($_REQUEST["a"], $_REQUEST["b"]) ?>
</div>
<? } ?>
