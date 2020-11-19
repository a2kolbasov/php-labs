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
        echo "Площадь = " . self::s($val) . "<br/>Объём = " . self::v($val);
    }
}
