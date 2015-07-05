<?php
@session_start();

//File Includes
include "library/getstatic.php";
include "library/systemcontroller.php";

//Objects
$gs=new getstatic();
$sc=new systemcontroller();

//Function Calls
$gs->checksession();

$baseurl=$gs->base_url();


$usertype=$_SESSION['usertype'];
$username=$_SESSION['username'];
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Stationary Management System | Add Stock</title>
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



            <!--Add Stock/ Products-->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

                <form method="post" action="#">

                    <h1 class="page-header">Add Stock/ Products</h1>


                </form>

            </div>
            <!--Add Stock/ Products-->


        </div>

    </div>

</div>




<footer>
    <?php include "includes/footer.php"; ?>
</footer>


<script src="<?php echo $baseurl ?>scripts/jquery.min.js"></script>
<script src="<?php echo $baseurl ?>scripts/jquery-1.10.2.js"></script>
<script src="<?php echo $baseurl ?>scripts/jquery.smoothscroll.js"></script>
<script src="<?php echo $baseurl ?>scripts/bootstrap.min.js"></script>



<script>

    $(document).ready(function(){

        $('#helpBlock').delay(2000).fadeOut();
        
    });





</script>
</body>
</html>