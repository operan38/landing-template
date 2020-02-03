<?php

class DataStorage
{
    public static $login = 'admin';
    public static $password = '123';

    private function __construct() {}
    private function __clone() {}

    public static function init() {
        return self::loadFile();
    }

    public static function saveFile() {
        file_put_contents('data-storage.json', json_encode($_SESSION['DataStorage']));
    }

    public static function loadFile() {
        if (file_exists('data-storage.json')) {
            $file = file_get_contents('data-storage.json');  // Открыть файл data-storage.json
            $taskList = json_decode($file, true);  // Декодировать в массив
            $_SESSION['DataStorage'] = $taskList;
            return $taskList;
        }
        else {
            return NULL;
        }
    }
}

?>