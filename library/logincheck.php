<?php
require_once "webconfig.php";

class logincheck extends webconfig {
    function login()
    {
        $user=$this->filterstring($_POST['username']);
        $pass=md5($this->filterstring($_POST['password']));
        $sql="SELECT au.username,au.PASSWORD,au.fullname,sd.value
              FROM RM_ApplicationUsers au INNER JOIN RM_StaticDataValue sd ON au.valueId=sd.rowId
              WHERE BINARY au.username=BINARY '$user'
              AND BINARY au.password=BINARY'$pass'
              AND isActive='Y'";
        $res= $this->mysqli->query($sql);
        $data=$res->fetch_array(MYSQLI_ASSOC);

        if ($res->num_rows>0)
        {
            $_SESSION['loginstatus']="true";
            $_SESSION['username']=$data['fullname'];
            $_SESSION['message']="Login Successfull!!";
            $_SESSION['usertype']=$data['value'];

//            date_default_timezone_set("Asia/Kathmandu");
//            $currentuser=$_SESSION['username'];
//            $datetime=date("Y-m-d H:i:s");
//            $sql1="UPDATE tbl_adminlogin set loggedindate='$datetime' WHERE username='$currentuser'";
//            $res1= $this->mysqli->query($sql1);
            header('location:dashboard.php');
        }
        else
        {
            $_SESSION['loginstatus']="false";
            $_SESSION['message']="Oops!! Please Check Your Credentials!";
            header('location:index.php');
        }
    }
}