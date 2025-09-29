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



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<style type="text/css">
    
  body{
        background-image: url('images/library.jpg')
        
    }

    .row{
       justify-content: center;
    }


    .login-form-3 .btnSubmit {
    font-weight: 600;
    color: #0062cc;
    background-color: #fff;
}

.login-form-3 h3 {
    text-align: center;
    color: #fff;
}

.login-form-1 h3 {
    text-align: center;
    color: #fff;
}
.login-form-3 {
    padding: 5%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.bg-dark{
        height: 100px;
        width: 100%;
    }
   /* .row{
        text-align: center;
    }
    .row p span{
        text-align: center;
       font-size: 25px;
   margin-bottom: 20px;
   color: #fff;
   background: #3d6d83;
   padding-left: 15px;
   padding-right: 15px;

    }*/


</style>

<body>

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

    <!-- <div class="row">
        <p><span>You can access various feature after login!</span></p>
    </div> -->

	<div class="container login-container">
        <div class="row">
            <h4><?php echo $msg?></h4>
        </div>
        <div class="row">
	 <div class="col-md-6 login-form-1">
                    <h3>Student Login</h3>
                    <form action="login_server_page.php" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control" name="login_email" placeholder="Your Email *" value="" />
                        </div>
                        <Label style="color:red">*<?php echo $emailmsg?></Label>
                        <div class="form-group">
                            <input type="password" class="form-control" name="login_pasword"  placeholder="Your Password *" value="" />
                        </div>
                        <Label style="color:red">*<?php echo $pasdmsg?></Label>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                    <div class="form-group">

                        <!-- <a href="registerform.php" class="ForgetPwd" value="Login">Don't have an account? </a> -->
                         <p>Don't have an account? <a href="registerform.php" class="ForgetPwd" value="Login" >Register now</a></p>
                    </div>
                    </form>
                </div>
            </div>
        </div>
            
             <script src="" async defer></script>
</body>
</html> 
<?php 
// include ("footer.php");
?>