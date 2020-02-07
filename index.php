<?php
    require('components/Router.php');
    require('components/DataStorage.php');

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

    if (!isset($_SESSION['data-storage']))
        DataStorage::init();

    Router::route('/', function(){
        include('template/header.php');

        $template = isset($_SESSION['data-storage']['template']) ? $_SESSION['data-storage']['template'] : '';

        if ($template != '') {

            foreach ($template as $value) {
                if ($value['active'] == '1') {
                    include($value['dir']);
                }
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
?>