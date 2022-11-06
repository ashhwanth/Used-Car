<?php
    session_start();

    unset($_SESSION['id']);
    unset($_SESSION['idd']);
    unset($_SESSION['cardetails_id']);
    session_destroy();
    
    header("Location:index.php");
?>