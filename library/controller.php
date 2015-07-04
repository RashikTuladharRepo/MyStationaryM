<?php

require_once "getstatic.php";
require_once "systemcontroller.php";

$method=$_REQUEST['method'];
$user_eid=$_REQUEST['user_eid'];
$user_did=$_REQUEST['user_did'];
$user_sid=$_REQUEST['user_sid'];

$gs=new getstatic();
$sc=new systemcontroller();

switch($method)
{
    case 'logout':
        $gs->logout();
        break;
    case 'user_operation':
        if(isset($user_eid))
        {
            $sc->get_application_users_edit_data($user_eid);
        }
        if(isset($user_did))
        {
            $sc->delete_user($user_did);
        }
        if(isset($user_sid))
        {
            $sc->change_user_status($user_sid);
        }
        break;


    default:
        header($gs->base_url());
}

