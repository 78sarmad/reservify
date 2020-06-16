<?php
error_reporting(E_ERROR | E_PARSE);

function fetch_reservations()
{
    include 'connect.php';
   $userEmail = $_GET['userEmail'];
   $sql = "SELECT * FROM reservations WHERE customer_email = '$userEmail'";
   $result = mysqli_query($conn, $sql);

    $data = array();
   if ($result)
   {
      while($row =mysqli_fetch_assoc($result))
      {
          $data[] = $row;
      }
   } else {
      echo "No results";
   }

   $conn->close();

   return json_encode($data);
}

print_r(fetch_reservations());