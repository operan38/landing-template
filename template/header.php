<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    <title><?php echo $PAGE_TITLE ?></title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/dist/css/main.css" />
</head>
<body>
<?php 
    echo $G_SETTINGS['General']['FacebookMetric'];

    if (isset($_SESSION['Admin'])) {
        echo '
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex mt-2 mb-2 align-items-center">
                            <form action="logout.php" method="POST">
                                <button class="btn btn-sm btn-danger mr-2" type="submit"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
                            </form>
                            <a class="btn btn-sm btn-secondary" href="/admin"><i class="fa fa-cogs" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        ';
    }
?>