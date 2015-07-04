<?php

require_once "library/getstatic.php";
require_once "library/webconfig.php";

$wc=new webconfig();

if($_POST['method']=="checkuserexist")
{
    $user= $_POST['username'];
    $sql="select username from rm_applicationusers where username='$user'";
    $qry=$wc->mysqli->query($sql);
    if ($qry->num_rows>0){
        echo "yes";
    }
    else {
        echo "no";
    }
}