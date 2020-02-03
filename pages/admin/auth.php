<?php
    if (isset($_POST['Auth'])) {
        if ($_POST['Login'] == DataStorage::$login && $_POST['Password'] == DataStorage::$password) {
            $_SESSION['Admin'] = DataStorage::$login;
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