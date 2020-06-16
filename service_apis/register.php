<?php
error_reporting(E_ERROR | E_PARSE);

 include 'connect.php';
    $customerEmail = $_GET['userEmail'];
    $customerPass = $_GET['userPass'];
    $customerFullname = $_GET['userFullname'];
    $customerContact = $_GET['userContact'];
   
   $sql = "INSERT INTO customers(customer_email, customer_password, customer_fullname, customer_contact) VALUES ('$customerEmail', '$customerPass', '$customerFullname', '$customerContact')";
   $result = mysqli_query($conn, $sql);
   
   $conn->close();

?>