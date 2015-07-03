<?php
@session_start();

class getstatic
{
    function base_url()
    {
        $url="http://localhost/stationary/";
        return $url;
    }

    function filterstring($data)
    {
        $result = $data;
        if ($result != "")
        {
            $result=str_replace("'","&rsquo;",$data);
            $result=str_replace("script","",$result);
            $result=str_replace("--","",$result);
            $result=str_replace("[","",$result);
            $result=str_replace("]","",$result);
            $result=str_replace("fopen","",$result);
            $result=str_replace("fclose","",$result);
            $result=str_replace("exec","",$result);
            $result=str_replace("<?","",$result);
            $result=str_replace("<?php","",$result);
            $result=str_replace("?>","",$result);
            //$result=str_replace(";","",$result);
            //$result=str_replace("&"," and ",$result);
            return $result;
        }
        return $result;
    }

    function checksession()
    {
        if(isset($_SESSION['loginstatus'])!="true" || $_SESSION['usertype']=="" || $_SESSION['message']=="" ||
            $_SESSION['username']=="")
        {
            $_SESSION['message']="Please Login First";
            header('location:'.$this->base_url().'index.php');
        }
    }

    function logout()
    {
        @session_destroy();
        @session_start();
        $_SESSION['message']="Bye! For Now Will See You Soon";
        header('location:'.$this->base_url().'index.php');
    }


    function getuser()
    {
        return $_SESSION['username'];
    }

    function imagemanipulate($image)
    {
        date_default_timezone_set("Asia/Kathmandu");
        $result=array();
        $explode=explode('.', $image);
        if($explode[1]=="" || $explode[1]=="jpg" || $explode[1]=="JPG" || $explode[1]=="PNG" || $explode[1]=="png") {
            $coverimage = md5(date("Y-d-m H:i:s") . $explode['0']) . "." . $explode['1'];
            $result['errorcode']=0;
            $result['msg']=$coverimage;
            return $result;
        }
        else
        {
            $result['errorcode']=1;
            $result['msg']="invalid image type";
            return $result;
        }
    }

}