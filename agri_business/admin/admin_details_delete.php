<?php
                require("db_connection.php");
                $ad_id=base64_decode($_REQUEST["ad_id"]);
                $sql=$conn->prepare("DELETE FROM admin_details WHERE ad_id=?");
                $sql->bind_param("i",$ad_id);
                if($sql->execute())
                {
                    echo "<script type='text/javascript'>
                        alert('Record Deleted Successfully');
                        window.location='admin_details_view.php';
                        </script>";
                }
                else
                {
                  echo"<script type='text/javascript'>
                        alert('Record Not Deleted Successfully');
                        window.location='admin_details_view.php';
                        </script>";  
                }
                ?>