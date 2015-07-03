<?php
@session_start();
require_once "webconfig.php";

class systemcontroller extends webconfig {


    //Application Users Management


    //Add Application Users
    function add_system_user()
    {
        $username=$this->filterstring($_POST['username']);
        $password=md5($_POST['password']);
        $fullname=$this->filterstring($_POST['fullname']);
        $isactive=$this->filterstring($_POST['isactive']);
    }

    //Get Application Users For Grid
    function get_application_users()
    {
        $data=array();
        $sql="select * from rm_applicationusers";
        $qry=$this->mysqli->query($sql);
        while ($res = $qry->fetch_array(MYSQLI_ASSOC)) {
            $data[]= $res;
        }
        return $data;
    }

    //Change User Status i.e Is Active Or Not
    function change_user_status($userId)
    {
        $sql="update rm_applicationusers set isActive=CASE
              WHEN isActive='Y' THEN 'N'
              ELSE 'Y'
              END
              WHERE rowId=".$userId;
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
            $_SESSION['error_code']="0";
            $_SESSION['sys_message']="Success: User Status Has Been Change Successfully!";
            header('location:'.$this->base_url().'usermanagement.php');
        }
        else
        {
            $_SESSION['error_code']="1";
            $_SESSION['sys_message']="Error: User Status Could Not Be Changed!";
            header('location:'.$this->base_url().'usermanagement.php');
        }
    }
}