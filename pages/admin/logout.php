<?php
    if (isset($_SESSION['admin'])) {
        unset($_SESSION['admin']);
        header('Location: /');
    }
    else {
        header('Location: /admin');
    }
?>