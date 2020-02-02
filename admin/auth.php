<?php
    session_start();
    require_once('settings/settings.php');

    if (isset($_POST['Auth'])) {
        if ($_POST['Login'] == Settings::$LOGIN && $_POST['Password'] == Settings::$PASSWORD) {
            $_SESSION['Admin'] = Settings::$LOGIN;
            unset($_SESSION['Message']);
            header('Location: /admin');
        }
        else {
            $_SESSION['Message'] = '<div class="alert alert-danger mt-1" role="alert">Неверный логин или пароль!</div>';
            header('Location: /admin');
        }
    }
    else {
        header('Location: /admin');
    }
?>