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
                            <a class="btn btn-sm btn-secondary" href="/admin"><i class="fa fa-cogs" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        ';
    }
?>