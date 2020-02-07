<?php
    if (isset($_SESSION['admin'])) {
        unset($_SESSION['data-storage']);
    }
    else {
        header('Location: /admin');
    }
?>