<?php
    if (isset($_SESSION['admin'])) {
        DataStorage::loadFile(); 
    }
    else {
        header('Location: /admin');
    }
?>