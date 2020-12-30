<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php

class Connection {
    private $connection = null;

    public function __construct(string $host, string $user, string $password, string $database) {
        $this->connection = mysqli_connect($host, $user, $password, $database);
        $this->connection->set_charset("utf8");
    }

    public static function connect() {
        $host = 'localhost';
        $user = 'root';
        $password = 'root';
        $database = 'app';
        return new self($host, $user, $password, $database);
    }

    public function query(string $sql) {
        // str_replace("'", "\\'", $sql);
        $query = mysqli_query($this->connection, $sql);

        if (is_bool($query)) return $query;
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    public function commit(string $sql = null) {
        $result = null;
        if ($sql !== null) $result = $this->query($sql);
        mysqli_commit($this->connection);
        return $result;
    }

    public function close() {
        mysqli_commit($this->connection);
        return mysqli_close($this->connection);
    }

    public function __destruct() {
        $this->close();
    }
}
