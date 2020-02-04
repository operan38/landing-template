<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    <title><?php echo isset($_SESSION['DataStorage']['General']['PageTitle']) ? $_SESSION['DataStorage']['General']['PageTitle'] : ''; ?></title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/dist/css/main.css" />
</head>
<body>
<?php 
    echo isset($_SESSION['DataStorage']['General']['FacebookMetric']) ? $_SESSION['DataStorage']['General']['FacebookMetric'] : '';

    if (isset($_SESSION['Admin'])) {
        echo '
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex mt-2 mb-2 align-items-center">
                            <form action="/admin/logout" method="POST">
                                <button class="btn btn-sm btn-danger mr-2" type="submit"><i class="fa fa-sign-out mr-1" aria-hidden="true"></i>Выйти</button>
                            </form>';
                            if ($_SERVER['REQUEST_URI'] == '/')
                                echo '<a class="btn btn-sm btn-secondary" href="/admin" title="На страницу администратора" alt="На страницу администратора"><i class="fa fa-cogs" aria-hidden="true"></i></a>';
                            else
                                echo '<a class="btn btn-sm btn-primary" href="/" title="Вернуться на сайт" alt="Вернуться на сайт"><i class="fa fa-arrow-left pr-1" aria-hidden="true"></i></a>';
                        echo'</div>
                    </div>
                </div>
            </div>
        </section>
        ';
    }
?>