<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php

// Обработка запроса
if (isset($_REQUEST['task'])) {
    // № задачи
    $task = $_REQUEST['task'];

    $taskClass = "Task" . $task;
    ( new $taskClass() ) -> run();
}


/**
 * Найти площадь полной поверхности и объем куба по известному ребру
 */
class Task1 {
    function s($lenght) {
        return 6 * ($lenght**2);
    }

    function v($lenght) {
        return $lenght**3;
    }

    public function run() {
        $val = $_REQUEST['val'];
        echo "Площадь = " . $this->s($val) . "<br/>Объём = " . $this->v($val);
    }
}

/**
 * Даны три положительных числа. Проверить, могут ли они быть длинами сторон треугольника.
 * Если да, то вычислить радиус вписанной окружности.
 */
class Task2 {
    function isTriangle($a, $b, $c) {
        return ($a + $b > $c) && ($a + $c > $b) && ($b + $c > $a);
    }

    /** Полупериметр */
    private function p($a, $b, $c) {
        return ($a + $b + $c) / 2;
    }

    function getRadius($a, $b, $c) {
        if (!$this->isTriangle($a, $b, $c)) return null;

        $p = $this->p($a, $b, $c);
        return sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));
    }

    public function run() {
        // todo: json_decode
        $a = (int) $_REQUEST['a'];
        $b = (int) $_REQUEST['b'];
        $c = (int) $_REQUEST['c'];

        $isTriangle = $this->isTriangle($a, $b, $c);
        echo "Треугольник? - " . ($isTriangle ? "Да" : "Нет");
        if ($isTriangle)
            echo "<br/>Радиус вписанной окружности = " . $this->getRadius($a, $b, $c);
    }
}


/**
 * Дано натуральное число n. Переставить его цифры так, чтобы образовалось максимальное число, записанное теми же цифрами.
 */
class Task3 {
    public function run() {
        $n = $_REQUEST["val"];
        echo $this->reorganize($n);
    }

    private function reorganize($n) {
        $arr = str_split($n);
        // обратная сортировка
        arsort($arr);
        return implode("", $arr);
    }
}
