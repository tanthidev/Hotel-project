<?php
    session_start();
    ob_start();

    if(isset($_SESSION['id'])&&($_SESSION['id']!="")){
        unset($_SESSION['id']);
        header('Location: /home');
    }
?>