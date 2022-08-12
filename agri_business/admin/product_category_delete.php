<?php
                require("db_connection.php");
                $pc_id=base64_decode($_REQUEST["pc_id"]);
                $sql=$conn->prepare("DELETE FROM product_category WHERE pc_id=?");
                $sql->bind_param("i",$pc_id);
                if($sql->execute())
                {
                    echo "<script type='text/javascript'>
                        alert('Record Deleted Successfully');
                        window.location='product_category_view.php';
                        </script>";
                }
                else
                {
                  echo"<script type='text/javascript'>
                        alert('Record Not Deleted Successfully');
                        window.location='product_category_view.php';
                        </script>";  
                }
                ?>