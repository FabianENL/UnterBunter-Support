<?php
    include('./init.php');

    if (isset($_GET['darkmode'])) {
        if(strcmp($_GET['darkmode'], "checked") == 0 || strcmp($_GET['darkmode'], "unchecked") == 0){
            $_SESSION['darkmode'] = $_GET['darkmode'];
        }else{
            echo "<script>alert('Er is een error opgetreden');</script>";
        }
    } else{
        echo "<script>alert('Er is een error opgetreden');</script>";
    }
?>
