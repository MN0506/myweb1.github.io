<!DOCTYPE html>
<html lang="en">
<head>
	<?php require("1_metatags.php"); ?>
</head>

<body class="">
	<div class="site-wrapper">
	<?php require("2_header.php"); ?>
	
<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Request Summary</li>
		</ol>
	</div>
</nav>

 <div class="page-section sp-inner-page">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="row">

						<!-- My Account Tab Content Start -->
						<div class="col-12">
							<div class="tab-content" id="myaccountContent">

								<!-- Single Tab Content Start -->
								<div>
    <div class="myaccount-content">
        <h3>REQUEST DETAILS</h3>

        <div class="myaccount-table1 table-responsive text-center">
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>SLNO</th>
                    <th>PRODUCT CATEGORY</th>
                    <th>DESCRIPTION</th>
                    <th>QUANTITY PURCHASED</th>
                    <th>UNIT PRICE</th>
                    <th>TOTAL AMOUNT</th>
                    <th>DATE</th>
                    <th>STATUS</th>
                </tr>
                </thead>

                <tbody>
    <?php     
require("db_connection.php");    
require("4_dealers_session_data.php"); 
                        
$sql=$conn->prepare("SELECT * FROM product_details,dealers_request_details where dealers_request_details.dd_id=? and dealers_request_details.pd_id=product_details.pd_id ");
$sql->bind_param("i",$dealer_id);
$sql->execute();
$result=$sql->get_result();
$sno=1;
while($row=$result->fetch_assoc())
{
?> 
<tr>   
    <td><?php echo $sno++;?></td>    
    <td><?php echo $row['pd_name'];?></td>
    <td><?php echo $row['drd_description'];?></td>
    <td><?php echo $row['drd_qty'];?></td>
    <td><?php echo $row['drd_unit_price'];?></td>
    <td><?php echo $row['drd_total'];?></td>
    <td><?php echo $row['drd_date'];?></td>
    <td><?php echo $row['drd_status'];?></td>
    
</tr>
<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
								</div>
								<!-- Single Tab Content End -->

								
							</div>
						</div>
						<!-- My Account Tab Content End -->
					</div>

				</div>
			</div>
		</div>
    </div>
  
  
<?php require("3_footer.php"); ?>
    
</div>
    <?php require("4_footer_scripts.php"); ?>
</body>
</html>