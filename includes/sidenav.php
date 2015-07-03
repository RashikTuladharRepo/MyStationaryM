<?php
$uri= $_SERVER['REQUEST_URI'];
$array=explode("/",$uri);
$count=count($array);
$page=trim(strtolower($array[$count-1]));
//echo $page=trim($page);
?>



<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="<?php echo ($page=="dashboard.php"||$page=="")?"active" :""; ?>"><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="<?php echo ($page=="addstock.php")?"active" :""; ?>"><a href="#"><i class="fa fa-cart-plus"></i> Add Stock</a></li>
        <li class="<?php echo ($page=="viewstock.php")?"active" :""; ?>"><a href="#"><i class="fa fa-eye"></i> View Stock</a></li>
        <li class="<?php echo ($page=="saleitems.php")?"active" :""; ?>"><a href="#"><i class="fa fa-credit-card"></i> Sale Items</a></li>
        <li class="<?php echo ($page=="viewsales.php")?"active" :""; ?>"><a href="#"><i class="fa fa-line-chart"></i> View Sales</a></li>
        <li class="<?php echo ($page=="viewreports.php")?"active" :""; ?>"><a href="#"><i class="fa fa-pie-chart"></i> View Reports</a></li>
        <li class="<?php echo ($page=="usermanagement.php")?"active" :""; ?>"><a href="usermanagement.php"><i class="fa fa-user-plus"></i> User Management</a></li>
        <li class="<?php echo ($page=="logs.php")?"active" :""; ?>"><a href="#"><i class="fa fa-calendar"></i> Logs</a></li>
    </ul>
</div>