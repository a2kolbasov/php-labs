<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php
require_once "../utils.php";
session_start();
p("Выход...");
session_destroy();
go("/");
