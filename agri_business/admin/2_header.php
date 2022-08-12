<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
        <span>
DASHBOARD
</span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">DASHBOARD</span>

        </div>
        <!--<form role="search" class="navbar-form-custom" method="post" action="#">
            <div class="form-group">
                <input type="text" placeholder="Search something special" class="form-control" name="search">
            </div>
        </form>-->



        <div class="mobile-menu">

            <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
            <i class="fa fa-chevron-down"></i>
            </button>


            <div class="collapse mobile-navbar" id="mobile-collapse">

                <ul class="nav navbar-nav">
                    <li>
                        <a class="" href="viewprofile_edit.php">Profile</a>
                    </li>
                    <li>
                        <a class="" href="change_password.php">Change Password</a>
                    </li>
                    <li>
                        <a class="" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav no-borders">
            
            <?php
          require("db_connection.php");
          $status="ORDER PENDING";
          $sql=$conn->prepare("SELECT * FROM customer_invoice WHERE ci_status = ? ");
          $sql->bind_param("s",$status);
          $sql->execute();
          $result=$sql->get_result();
          $count=$result->num_rows;
          
          $sd_status="OUT OF STOCK";
          $sql1=$conn->prepare("SELECT * FROM stock_details WHERE sd_status = ? ");
          $sql1->bind_param("s",$sd_status);
          $sql1->execute();
          $result1=$sql1->get_result();
          $count1=$result1->num_rows;
          
          ?>
          
        <li class="dropdown">
            <a class="dropdown-toggle label-menu-corner" href="stock_details_view.php" >
            <button class="btn btn-danger">OUT OF STOCK</button>
            <span class="label label-success"><?php echo $count1;?></span>
            </a>
        </li>
        
      <li class="dropdown">
        <a class="dropdown-toggle label-menu-corner" href="customer_order_placed.php" >
            <i class="pe-7s-bell"></i>
            <span class="label label-success"><?php echo $count;?></span>
            </a>
        </li>

<!--
                <li class="dropdown">
                    <a class="dropdown-toggle label-menu-corner" href="#" >
<i class="pe-7s-bell"></i>
<span class="label label-success">22</span>
</a>

                </li>
-->

                <li class="dropdown">
                    <a class="dropdown-toggle label-menu-corner" href="#" data-toggle="dropdown">
                        <i class="pe-7s-user"></i>

                    </a>
                    <ul class="dropdown-menu animated flipInX m-t-xs">

                        <li><a href="viewprofile_edit.php">Profile</a></li>
                        <li><a href="change_password.php">Change Password</a></li>


                    </ul>

                </li>
                <!--<li class="dropdown">
                    <a href="login.html">
<i class="pe-7s-upload pe-rotate-90"></i>
</a>
                </li>-->
                <li >
                    <a  href="logout.php" >
                        <i class="pe-7s-upload pe-rotate-90"></i>
                    </a>

                </li>
            </ul>

        </div>
    </nav>
</div>
