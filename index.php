<?php
    require('components/Router.php');
    require('components/DataStorage.php');

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

    if (!isset($_SESSION['DataStorage']))
        DataStorage::init();

    Router::route('/', function(){
        include('template/header.php');

        $template = $_SESSION['DataStorage']['Template'];

        foreach ($template as $value) {
            if ($value['active'] == '1') {
                include($value['dir']);
            }
        }

        include('template/footer.php');
    });

    Router::route('/admin', function(){
        include('template/header.php');

        include('pages/admin/index.php');

        include('template/footer.php');
    });

    Router::route('/admin/auth', function(){
        include('pages/admin/auth.php');
    });

    Router::route('/admin/save', function(){
        include('pages/admin/save.php');
    });

    Router::route('/admin/saveFile', function(){
        include('pages/admin/saveFile.php');
    });

    Router::route('/admin/reset', function(){
        include('pages/admin/reset.php');
    });

    Router::route('/admin/loadFile', function(){
        include('pages/admin/loadFile.php');
    });

    Router::route('/admin/logout', function(){
        include('pages/admin/logout.php');
    });

    Router::route('/send', function(){
        include('template/header.php');

        print 'send страница';

        include('template/footer.php');
    });

    // запускаем маршрутизатор, передавая ему запрошенный адрес
    Router::execute($_SERVER['REQUEST_URI']);

    /*Router::route('/blog/(\w+)/(\d+)', function($category, $id){
        print $category . ':' . $id;
    });*/

    /*require_once('admin/settings/settings.php');
    $G_SETTINGS = Settings::load('admin/settings/');

    $PAGE_TITLE = isset($G_SETTINGS['General']['PageTitle']) ? $G_SETTINGS['General']['PageTitle'] : '';

    require_once('template/header.php'); // Подключение header

    if (!isset($G_SETTINGS) || $G_SETTINGS === NULL) {
        print('Файл data.json не найден');
        exit();
    }

    $template = $G_SETTINGS['Template'];

    foreach ($template as $value) {
        if ($value['active'] == '1') {
            include($value['dir']);
        }
    }*/



    //require_once('template/footer.php'); // Подключение footer
?>