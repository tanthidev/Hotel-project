<?php
    session_start();
    ob_start();

    if(isset($_SESSION['us'])&&($_SESSION['us']!="")){
        unset($_SESSION['us']);
        header('Location: /index.php');
    }
?>