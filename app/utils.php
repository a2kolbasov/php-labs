<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
function p($string) {
    echo "<p>$string</p>";
}
function go($link) {
    header("Location: $link", true);
}

class Time {
    const timeFormat = "d.m.Y";
    const fullTimeFormat = "d.m.Y H:i";

    public static function getTimestamp(string $timestampFromDB) : int {
        return date_timestamp_get(new DateTime($timestampFromDB));
    }

    public static function format(string $timestampFromDB, string $timeFormat) : string {
        return date($timeFormat, self::getTimestamp($timestampFromDB));
    }
}
