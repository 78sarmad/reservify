<?php
error_reporting(E_ERROR | E_PARSE);

 include 'connect.php';
 
    $customerEmail = $_GET['userEmail'];
    $itemName = $_GET['itemName'];
    $sittingType = $_GET['reservationType'];
    $resHours = $_GET['timingHours'];
    $resMins = $_GET['timingMins'];
    $orderTotal = $_GET['orderTotal'];
    $orderSidenote = $_GET['orderSidenote'];
    
    echo $orderTotal;
    
   $sql = "INSERT INTO reservations(customer_email, item_name, reservation_type, booking_hours, booking_mins, order_total, order_sidenote) VALUES ('$customerEmail', '$itemName', '$sittingType', '$resHours', '$resMins', '$orderTotal', '$orderSidenote')";
   $result = mysqli_query($conn, $sql);
  
   $conn->close();
 
 ?>