<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
function p($string) {
    echo "<p>$string</p>";
}
function go($link) {
    header("Location: $link", true);
}
