<?php

require_once('template/header.html');



if(!empty($_POST['client']) && !empty($_POST['phone'])) {
    echo 'test';
}
else {
    echo false;
}

?>