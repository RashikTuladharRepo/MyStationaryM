<div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Multi Traders Pvt. Ltd</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
            <li>
                <img src="<?php echo $baseurl; ?>images/user.png">
                <a href="#" id="system-user"><?php echo $_SESSION['username']." (".ucwords($_SESSION['usertype']).")";
                    ?></a>
            </li>
            <li><a href="<?php echo $baseurl; ?>library/controller.php?method=logout" id="btn-logout"><i
                        class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
    </div>
</div>