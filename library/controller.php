<?php

$method=$_REQUEST['method'];
require_once "getstatic.php";
$gs=new getstatic();
switch($method)
{
    case 'logout':
        echo "reached here";
        $gs->logout();
        break;
    default:
        header($gs->base_url());
}

