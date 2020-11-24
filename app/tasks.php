<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php

class Task6 {
    /*
    Напечатать самое длинное слово, найденное в тексте, находящемся в заданном текстовом файле.
    */
    public static function run() {
        $file = file("task6.txt");
        $words = array();
        $text = "";
        foreach ($file as $line) {
            $words = array_merge($words, preg_split("/[\s,]+/", $line));
            $text = $text . $line . "<br>";
        }

        $maxLengthWorld = "";
        foreach ($words as $word) {
            if (strlen($word) > strlen($maxLengthWorld))
                $maxLengthWorld = $word;
        }
        return array("word" => $maxLengthWorld, "text" => $text);
    }
}
