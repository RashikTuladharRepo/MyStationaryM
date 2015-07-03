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
$gs->checkusertype();
$baseurl=$gs->base_url();

$application_users=$sc->get_application_users();




$usertype=$_SESSION['usertype'];
$username=$_SESSION['username'];
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Stationary Management System | User Management</title>
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



            <!--User Management-->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

                <form method="post" action="#">

                    <h1 class="page-header">User Management</h1>

                    <?php if(isset($_SESSION['sys_message']))
                    {
                        ?>
                        <div class="has-error" id="helpBlock" style="background:rgba(0,0,0,0.2); color:#FFF; width:100%; margin-bottom:10px;
                text-align:center;">
                            <div class="input-group">

                                <?php if(isset($_SESSION['error_code'])=="1"){?>
                                <div id="error-block" class="input-group-addon sys-msg"><i class="fa fa-check text-green"></i></div>
                                <?php }else{?>
                                <div id="error-block" class="input-group-addon sys-msg"><i class="fa fa-times"></i></div>
                                <?php
                                }
                                ?>

                                <input type="text" disabled class="form-control sys-msg" placeholder="<?php echo
                                $_SESSION['sys_message']; ?>">

                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="add-user-form">

                        <div class="form-group">

                            <div class="input-group">

                                <div class="input-group-addon"><i class="fa fa-user-plus"></i></div>
                                <input type="text" class="form-control" id="username" name="username"
                                       placeholder="Enter The Username" required>

                            </div>
                            <br>
                            <div class="input-group">

                                <div class="input-group-addon"><i class="fa fa-key"></i></div>

                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Enter The Password" required>

                            </div>
                            <br>
                            <div class="input-group">

                                <div class="input-group-addon"><i class="fa fa-user"></i></div>

                                <input type="text" class="form-control" id="fullname" name="fullname"
                                       placeholder="Enter Full Name" required>

                            </div>
                            <br>
                            <div class="input-group">

                                <div class="input-group-addon"><i class="fa fa-recycle"></i></div>

                                <select name="isactive" id="isactive" class="form-control">
                                    <option value="Y" class="form-control">Yes</option>
                                    <option value="N" class="form-control">No</option>
                                </select>

                            </div>
                            <br>

                                <button type="submit" name="submit" class="btn btn-md btn-success btn-block" value="Login">
                                    <i class="fa fa-thumbs-o-up"></i> Add User</button>
                                <button type="reset" name="submit" class="btn btn-md btn-danger btn-block" value="Login">
                                    <i class="fa fa-thumbs-o-down"></i> Reset</button>

                        </div>

                    </div>

                 </form>


                    <div class="grid">
                        <button type="button" id="add_user_form" class="btn btn-success"><i class="fa fa-plus"></i></button>
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                    foreach($application_users as $au)
                                    {
                                    ?>

                                        <tr>
                                            <td><?php echo $au['rowId'];?></td>
                                            <td><?php echo $au['fullname'];?></td>
                                            <td><?php echo $au['username'];?></td>
                                            <td>
                                                <?php
                                                    if($au['isActive']=="Y")
                                                    {
                                                        echo "&nbsp;&nbsp;&nbsp;<i class='fa fa-check text-success'></i>";
                                                    }
                                                    else
                                                    {
                                                        echo "&nbsp;&nbsp;&nbsp;<i class='fa fa-close text-danger'></i>";
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="library/controller.php?method=user_operation&user_eid=<?php
                                                echo
                                                $au['rowId'];?>" data-toggle="tooltip"
                                                   title="Edit Data!" data-placement="bottom">
                                                    <i class="fa fa-pencil text-success"></i>
                                                </a>
                                                &nbsp;&nbsp;&nbsp;
                                                <a href="library/controller.php?method=user_operation&user_did=<?php echo
                                                $au['rowId'];?>"
                                                   data-toggle="tooltip"
                                                   title="Delete Data!" data-placement="bottom">
                                                    <i class="fa fa-trash text-danger"></i>
                                                </a>
                                                &nbsp;&nbsp;&nbsp;
                                                <a href="library/controller.php?method=user_operation&user_sid=<?php
                                                echo $au['rowId'];?>"
                                                   data-toggle="tooltip"
                                                   title="Change
                                                Status!" data-placement="bottom">
                                                    <i class="fa fa-recycle text-primary"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
            </div>
            <!--User Management-->


        </div>

    </div>

</div>




<footer>
    <?php include "includes/footer.php"; ?>
</footer>


<script src="<?php echo $baseurl ?>scripts/jquery.min.js"></script>
<script src="<?php echo $baseurl ?>scripts/jquery.smoothscroll.js"></script>
<script src="<?php echo $baseurl ?>scripts/bootstrap.min.js"></script>
<script>
    $(document).ready( function() {
        $('#helpBlock').delay(2000).fadeOut();
    });
</script>
<script>

    $(document).ready(function(){

        $('[data-toggle="tooltip"]').tooltip();

        $("#add_user_form").click(function(){
            $(".add-user-form").slideToggle();
        });
    });

</script>
</body>
</html>