<?php
    @session_start();

    include "library/getstatic.php";
    $gs=new getstatic();
    $gs->checksession();
    $baseurl=$gs->base_url();
    $usertype=$_SESSION['usertype'];
    $username=$_SESSION['username'];
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Stationary Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $baseurl; ?>images/favicon.png">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>styles/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl ?>styles/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl ?>styles/stationarystyles.css">
</head>
<body>

    <div class="dashboard-containers">


    <!--Top Bar Navigation-->
        <nav class="navbar navbar-default navbar-fixed-top background-image">
            <?php include "includes/topnav.php" ?>
        </nav>
    <!--Top Bar Navigation-->



        <div class="container-fluid">

            <div class="row">


<!--Side Bar Navigation-->
                <?php if($usertype=="admin"){?>
                    <?php include "includes/sidenav.php" ?>
                <?php } else { ?>
                    <?php include "includes/sidenav-moderator.php" ?>
                <?php }?>
<!--Side Bar Navigation-->



<!--Dashboard Navigation-->
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Multi Traders Pvt. Ltd</h1>
                        <div class="row">
                            <?php if($usertype=="admin"){?>
                                <?php include "includes/dashboardnav.php" ?>
                            <?php } else { ?>
                                <?php include "includes/dashboardnav-moderator.php" ?>
                            <?php }?>
                        </div>
                </div>
<!--Dashboard Navigation-->


                </div>

        </div>

    </div>




<footer>
    <?php include "includes/footer.php"; ?>
</footer>


<script src="<?php echo $baseurl ?>scripts/jquery.min.js"></script>
<script src="<?php echo $baseurl ?>scripts/jquery.smoothscroll.js"></script>
<script src="<?php echo $baseurl ?>scripts/bootstrap.min.js"></script>
</body>
</html>