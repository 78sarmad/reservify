<?php
error_reporting(E_ERROR | E_PARSE);

function fetch_all_items()
{
   include 'connect.php';
   $sql = "SELECT * FROM items";
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

print_r(fetch_all_items());