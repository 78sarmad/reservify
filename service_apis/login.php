<?php
error_reporting(E_ERROR | E_PARSE);

function attemptLogin()
{
    include 'connect.php';
   $email = $_GET['userEmail'];
   $pass = $_GET['userPass'];
   
   $sql = "SELECT customer_fullname, customer_email, customer_contact FROM customers WHERE customer_email = '$email' AND customer_password = '$pass'";
   $result = mysqli_query($conn, $sql);

    $flag = false;
   if ($result)
   {
          while($row =mysqli_fetch_assoc($result))
          {
              $data = $row;
                $flag = true;
          }
        if ($flag == false)
        {
            $value = array( "customer_name"=>"zero", "customer_email"=>"zero","customer_contact"=>"zero"); 
            $conn->close();
            return json_encode($value); 
        }
      
   }


         $conn->close();
        return json_encode($data);


}

print_r(attemptLogin());