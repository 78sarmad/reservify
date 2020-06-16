<?php
error_reporting(E_ERROR | E_PARSE);

function fetch_sitting_details()
{
    include 'connect.php';
   $reservationType = $_GET['reservationType'];
   $sql = "SELECT * FROM sittings WHERE sitting_type = '$reservationType'";
   $result = mysqli_query($conn, $sql);

   if ($result)
   {
      while($row =mysqli_fetch_assoc($result))
      {
          $data = $row;
      }
   } else {
      echo "No results";
   }

   $conn->close();

   return json_encode($data);
}

print_r(fetch_sitting_details());