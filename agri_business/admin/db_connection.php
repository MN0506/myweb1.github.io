<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database_name="agri_business";
    $conn=new mysqli($servername,$username,$password,$database_name);
   if($conn->connect_errno)
  {
    echo"failed to connect";
  }
?>