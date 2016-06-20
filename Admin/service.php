<?php
    session_start();

    include('../dbcontroller.php');
    
    $serial = $_POST['serial_id'];

       $query = 'update item_serial set SERVICE_DATE = DATE_ADD(CURDATE(), INTERVAL 6 MONTH) WHERE SERIAL_ID = "'.$serial.'"';
         
     $result = mysqli_query($link, $query);
     header('location: admin_main.php');
     exit();
?>