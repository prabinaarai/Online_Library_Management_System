
<!DOCTYPE html>


<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<style type="text/css">
    
  body{
        height: 630px;
    margin-top: 0px;
        background-image: url('images/b2.jpg')
        
    }
    .row{
       justify-content: center;
    }
    /*#side_bar{
        background-color: whitesmoke;
       text-align: right;
        padding: 50px;
        width: 300px;
        height: 450px;
    }
*/
    .bg-dark{
        height: 100px;
        width: 100%;
/*        background-color: #710a27;*/
    }

</style>

<body>

    <?php
 $emailmsg="";
 $pasdmsg="";
 $msg="";

 $ademailmsg="";
 $adpasdmsg="";


 if(!empty($_REQUEST['ademailmsg'])){
    $ademailmsg=$_REQUEST['ademailmsg'];
 }

 if(!empty($_REQUEST['adpasdmsg'])){
    $adpasdmsg=$_REQUEST['adpasdmsg'];
 }

 if(!empty($_REQUEST['emailmsg'])){
    $emailmsg=$_REQUEST['emailmsg'];
 }

 if(!empty($_REQUEST['pasdmsg'])){
  $pasdmsg=$_REQUEST['pasdmsg'];
}

if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
 }

 ?>
 
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Library Management System (LMS)</a>
            </div>
    
            <ul class="nav navbar-nav navbar-right">
              <li class="nav-item">
                <a class="nav-link" href="index.php">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="registerform.php"></span>REGISTER</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="adminlogin.php">LOGIN</a>
              </li>
            </ul>
        </div>
    </nav><br>
   <!--  <div class="row">
        <div class="col-md-4" id="side_bar">
            <h5>Library Timing</h5>
            <ul>
                <li>Opening: 8:00 AM</li>
                <li>Closing: 8:00 PM</li>
                <li>(Sunday Off)</li>
            </ul>
            <h5>What We provide ?</h5>
            <ul>
                <li>Full furniture</li>
                <li>Free Wi-fi</li>
                <li>News Papers</li>
                <li>Discussion Room</li>
                <li>RO Water</li>
                <li>Peacefull Environment</li>
            </ul>
        </div> --> 



    <div class="container login-container">
        <div class="row">
            <h4><?php echo $msg?></h4>
        </div>
        <div class="row">
            <div class="col-md-6 login-form-2">
                <h1>Admin Login</h1>
                <form action="loginadmin_server_page.php" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="login_email" placeholder="Your Email *"
                            value="" />
                    </div>
                    <Label style="color:red">*<?php echo $ademailmsg?></label>
                    <div class="form-group">
                        <input type="password" class="form-control" name="login_pasword" placeholder="Your Password *"
                            value="" />
                    </div>
                    <Label style="color:red">*<?php echo $adpasdmsg?></label>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                    <!-- <div class="form-group">

                        <a href="user-forgot-password.php" class="ForgetPwd" value="Forget Password?">Forget Password?</a>
                    </div> -->
                </form>
            </div>
        </div>
    </div>







    <script src="" async defer></script>
</body>

</html>
<?php 
include ("footer.php");
?>