<?php
                require("db_connection.php");
                $cd_id=base64_decode($_REQUEST["cd_id"]);
                $sql=$conn->prepare("DELETE FROM customer_details WHERE cd_id=?");
                $sql->bind_param("i",$cd_id);
                if($sql->execute())
                {
                    echo "<script type='text/javascript'>
                        alert('Record Deleted Successfully');
                        window.location='customer_details_view.php';
                        </script>";
                }
                else
                {
                  echo"<script type='text/javascript'>
                        alert('Record Not Deleted Successfully');
                        window.location='customer_details_view.php';
                        </script>";  
                }
                ?>