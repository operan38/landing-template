<?php
    if (isset($_POST['auth'])) {
        if ($_POST['login'] == DataStorage::$login && $_POST['password'] == DataStorage::$password) {
            $_SESSION['admin'] = DataStorage::$login;
            header('Location: /admin');
        }
        else {
            $_SESSION['message'] = '<div class="alert alert-danger mt-1" role="alert">Неверный логин или пароль!</div>';
            header('Location: /admin');
        }
    }
    else {
        header('Location: /admin');
    }
?>