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

        $sql1="select username from rm_applicationusers where username='$username'";
        $qry1=$this->mysqli->query($sql1);
        if ($qry1->num_rows==0)
        {
            $sql = "INSERT INTO rm_applicationusers (username,password,valueId,fullName,isActive)
              VALUES ('$username','$password',2,'$fullname','$isactive');
             ";
            $qry = $this->mysqli->query($sql);
            if ($qry) {
                $_SESSION['error_code'] = "0";
                $_SESSION['sys_message'] = "Success: User Has Been Registered Successfully!";
                header('location:' . $this->base_url() . 'usermanagement.php');
            } else {
                $_SESSION['error_code'] = "1";
                $_SESSION['sys_message'] = "Error: User Could Not Be Registered!";
                header('location:' . $this->base_url() . 'usermanagement.php');
            }
        }
        else
        {
            $_SESSION['error_code'] = "1";
            $_SESSION['sys_message'] = "Error: Username Already Exists, Please Use Another Username!";
            header('location:' . $this->base_url() . 'usermanagement.php');
        }
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

    //Get User Data For Password Change
    function get_application_users_edit_data($eid)
    {
        $data=array();
        $sql="select * from rm_applicationusers where rowId=".$eid;
        $qry=$this->mysqli->query($sql);
        while ($res = $qry->fetch_array(MYSQLI_ASSOC)) {
            $data[]= $res;
        }
        $_SESSION['edit_users']=$data;
        header('location:../usermanagement.php?edit_users_code=0');
    }

    //change user password
    function change_user_password()
    {
        $newpassword=md5($_POST['new-password']);
        $rowid=$_POST['user-id'];
        $sql="UPDATE rm_applicationusers set password='$newpassword' where rowId='$rowid'";
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
            $_SESSION['error_code']="0";
            $_SESSION['sys_message']="Success: User Password Has Been Change Successfully!";
            header('location:'.$this->base_url().'usermanagement.php');
        }
        else
        {
            $_SESSION['error_code']="1";
            $_SESSION['sys_message']="Error: User Password Could Not Be Changed!";
            header('location:'.$this->base_url().'usermanagement.php');
        }
    }

    //Delete User
    function delete_user($user_did)
    {
        $sql="DELETE FROM rm_applicationusers WHERE rowId='$user_did'";
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
            $_SESSION['error_code']="0";
            $_SESSION['sys_message']="Success: User Has Been Deleted Successfully!";
            header('location:'.$this->base_url().'usermanagement.php');
        }
        else
        {
            $_SESSION['error_code']="1";
            $_SESSION['sys_message']="Error: User Could Not Be Deleted!";
            header('location:'.$this->base_url().'usermanagement.php');
        }
    }
}