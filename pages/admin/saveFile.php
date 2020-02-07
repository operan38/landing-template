<?php
    if (isset($_SESSION['admin'])) {
        DataStorage::saveFile();
    }
    else {
        header('Location: /admin');
    }
?>