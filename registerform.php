<?php

@include 'config1.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $email = $_POST['email'];
   $pass = md5($_POST['pass']);
   $cpass = md5($_POST['cpassword']);
   // $id = $_POST['id'];
   $type = $_POST['type'];

  $select = " SELECT * FROM userdata WHERE email = '$email' && pass = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO userdata(id,name, email, pass, type) VALUES('$id','$name','$email','$pass','$type')";
         mysqli_query($conn, $insert);
         header('location:studentform.php');
      }
   }


};



?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>
   <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>


   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/regstyle.css">

</head>
<style type="text/css">
  body{
   background-image: url('images/li13.png') 
}

.bg-dark{
        height: 100px;
        width: 100%;
        background-color: black;
    }
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
                <a class="nav-link" href="studentform.php">LOGIN</a>
              </li>
            </ul>
        </div>
    </nav><br>

   
<div class="form-container">

   <form action="" method="post">
      <h3>Register Now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      
      <input type="text" name="name" required placeholder="Enter your name">
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="pass" required placeholder="Enter your password">
      <input type="password" name="cpassword" required placeholder="Confirm your password">
      <select name="type">
         <option value="user">Select a user_type</option>
         <option value="teacher">teacher</option>
         <option value="student">student</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>Already have an account? <a href="studentform.php">Login now</a></p>
   </form>

</div>

</body>
</html>