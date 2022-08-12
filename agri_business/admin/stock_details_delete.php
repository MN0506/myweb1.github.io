<?php
                require("db_connection.php");
                $sd_id=base64_decode($_REQUEST["sd_id"]);
                $sql=$conn->prepare("DELETE FROM stock_details WHERE sd_id=?");
                $sql->bind_param("i",$sd_id);
                if($sql->execute())
                {
                    echo "<script type='text/javascript'>
                        alert('Record Deleted Successfully');
                        window.location='stock_details_view.php';
                        </script>";
                }
                else
                {
                  echo"<script type='text/javascript'>
                        alert('Record Not Deleted Successfully');
                        window.location='stock_details_view.php';
                        </script>";  
                }
                ?>