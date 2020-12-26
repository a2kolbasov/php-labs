<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php

include_once "connection.php";

class Row {
    public string $name;
    public string $type;
    public int $size;

    public function __construct(string $name, string $type, int $size = 0) {
        $this->name = $name;
        $this->type = $type;
        $this->size = $size;
    }
}

class Create_table {
    public static function add_rand_data($tableName, array $rows, int $inserts_count) {
        $connection = Connection::connect();

        $names = implode(", ", array_map(
            function(Row $row) {return $row->name;},
            $rows
        ));
        echo "names: $names<br>";

        $sql_begin = "insert into $tableName ($names) values ";

        for ($i = 0; $i < $inserts_count; $i++) {
            $rand_data = self::gen_rand_data($rows);
            $sql = $sql_begin . "(" . implode(", ", $rand_data) . ")";
            echo $sql . "<br>";

            $result = $connection->query($sql);
            echo ($result == true ? "true" : "false") . "<br>";
        }
        // $connection->commit();
    }

    private static function gen_rand_data(array $rows) : array {
        $replace_fun = function(Row $row) {
            if ($row->type === "str") {
                $rand_str = str_split(str_shuffle("qwertyuiopasdfghjklzxcvbnm"), $row->size)[0];
                return "'$rand_str'";
            } else if ($row->type === "num") {
                return mt_rand(0, 100);
            } else throw "Неверный тип";
        };

        return array_map($replace_fun, $rows);
    }
}

Create_table::add_rand_data(
    "users",
    [
        // new Row("id", "num"),
        new Row("login", "str", 10),
        new Row("name", "str", 10),
        new Row("password", "str", 20),
        new Row("pw_hash", "str", 5)
    ],
    2
);
