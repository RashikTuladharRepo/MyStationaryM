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

$products=$sc->get_product_lists();
$vendors=$sc->get_vendor_lists();

if(isset($_POST['add-stock']))
{
    $sc->add_stock();
}

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
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl ?>styles/bootstrap-select.css">
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



                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-tags"></i></div>
                        <select class="selectpicker form-control" name="productcode" id="productcode">

                            <?php foreach($products as $productcode) { ?>
                                <option value="<?php echo $productcode['productCode']; ?>">
                                    <?php echo $productcode['productName']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-shopping-cart"></i></div>
                        <select class="selectpicker form-control" name="vendor" id="vendor">
                            <?php foreach($vendors as $vendorscode) { ?>
                                <option value="<?php echo $vendorscode['rowId']; ?>">
                                    <?php echo $vendorscode['vendorName']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-dollar"></i></div>
                        <input type="number" class="form-control" name="rate" id="rate" placeholder="Enter Rate">
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-check"></i></div>
                        <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Quantity">
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                        <input type="text" class="form-control" name="total" id="total" placeholder="Total Amount">
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-comment"></i></div>
                        <textarea type="text" class="form-control" name="remarks" id="remarks" placeholder="Remarks">
                            </textarea>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success" name="add-stock" id="add-stock" value="Add Stock">
                    <input type="reset" class="btn btn-danger">

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
<script src="<?php echo $baseurl ?>scripts/bootstrap-select.js"></script>



<script>

    $(document).ready(function(){

        $("#quantity").attr('disabled','disabled');
        $("#total").attr('disabled','disabled');

        $('.selectpicker').selectpicker();

        $('#helpBlock').delay(2000).fadeOut();

        $("#rate").keyup(function(){
            var rate=$("#rate").val();
            if(rate.length>0)
            {
                $("#quantity").removeAttr('disabled','disabled');
                $("#quantity").keyup(function(){
                    var quantity=$("#quantity").val();
                    if(quantity.length>0)
                    {
                        var total=$("#quantity").val()*$("#rate").val();
                        $("#total").val(total);
                    }
                });
            }
        });

    });





</script>
</body>
</html>