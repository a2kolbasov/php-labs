<!-- Copyright © 2020 Aleksandr Kolbasov -->

<?php

class Task6 {
    /*
    Напечатать самое длинное слово, найденное в тексте, находящемся в заданном текстовом файле.
    */
    public static function run() {
        $file = file("task6.txt");
        $words = array();
        foreach ($file as $line)
            $words = array_merge($words, preg_split("/[\s,]+/", $line));

        $maxLengthWorld = "";
        foreach ($words as $word)
            if (strlen($word) > strlen($maxLengthWorld))
                $maxLengthWorld = $word;
        return $maxLengthWorld;
    }
}
