<?php

include("data_class.php");
// include "navbar.php";

$login_email=$_GET['login_email'];
$login_pasword=$_GET['login_pasword'];

if($login_email==null||$login_pasword==null){
    $emailmsg="";
    $pasdmsg="";
    
    if($login_email==null){
        $emailmsg="Email cannot be empty";
    }
    if($login_pasword==null){
        $pasdmsg="Pasword cannot be empty";
    }

    header("Location: adminlogin.php?ademailmsg=$emailmsg&adpasdmsg=$pasdmsg");
}

elseif($login_email!=null&&$login_pasword!=null){
    $obj=new data();
    $obj->setconnection();
    $obj->adminLogin($login_email,$login_pasword);

}




