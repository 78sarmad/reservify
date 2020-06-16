<?php
error_reporting(E_ERROR | E_PARSE);

function fetch_item()
{
    include 'connect.php';
   $itemName = $_GET['recipeName'];
   $sql = "SELECT * FROM items WHERE item_name = '$itemName'";
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

print_r(fetch_item());