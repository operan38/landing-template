<?php

class Settings {

    public static $LOGIN = 'admin';
    public static $PASSWORD = '123';

    public static function save($dir = '', $sections) {
        file_put_contents($dir.'data.json', json_encode($sections));
    }

    public static function load($dir = '') {
        if (file_exists($dir.'data.json')) {
            $file = file_get_contents($dir.'data.json');  // Открыть файл data.json
            $taskList = json_decode($file, true);  // Декодировать в массив
            return $taskList;
        }
        else {
            return NULL;
        }
    }
}

?>