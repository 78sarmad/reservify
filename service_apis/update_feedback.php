<?php
error_reporting(E_ERROR | E_PARSE);

     include 'connect.php';
    $reservationID = $_GET['reservationID'];
    $orderFeedback = $_GET['orderFeedback'];
    $orderRemarks = $_GET['orderRemarks'];
    
   echo "$reservationID $orderFeedback $orderRemarks";
   
   $sql = "UPDATE reservations SET order_feedback='$orderFeedback', order_remarks='$orderRemarks' WHERE reservation_id='$reservationID'";
   $result = mysqli_query($conn, $sql);
   
   $conn->close();
?>