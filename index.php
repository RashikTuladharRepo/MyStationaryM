<?php
    include "library/getstatic.php";
    $gs=new getstatic();
    $baseurl=$gs->base_url();
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
<body class="background-image">

<div class="container">

    <div class="login-form">

        <form method="post" action="#">

            <h2>Administrator Login</h2>

            <div class="form-group">

                <div class="input-group">

                    <div class="input-group-addon"><i class="fa fa-user"></i></div>

                    <input type="text" class="form-control" name="username" placeholder="Enter Your Username">

                </div>

                <br>

                <div class="input-group">

                    <div class="input-group-addon"><i class="fa fa-key"></i></div>

                    <input type="password" class="form-control" name="password" placeholder="Enter Your Password">

                </div>

                <br>

                <div class="input-group pull-left">

                    <button type="submit" class="btn btn-md btn-success btn-block" value="Login"><i class="fa fa-thumbs-o-up"></i> Login</button>

                </div>

            </div>

        </form>

    </div>

</div>

<script src="<?php echo $baseurl ?>scripts/jquery.min.js"></script>
<script src="<?php echo $baseurl ?>scripts/jquery.smoothscroll.js"></script>
<script src="<?php echo $baseurl ?>scripts/bootstrap.min.js"></script>
</body>
</html>