<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>home page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        nav
        {
            float:right;
            word-spacing: 30px;
            padding: 20px;
        }
        nav li{
            display: inline-block;
            line-height: 80px;

        }
    </style>
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="logo">
                <img src="images/9.png">
                <h1 style="color:white;">LIBRARY MANAGEMENT SYSTEM</h1>
            </div>
                <nav>
                    <ul>
                        <li><a href="index.php">HOME</a></li>
                         <li><a href="adminlogin.php">ADMIN</a></li>
                          <li><a href="studentform.php">LOGIN</a></li>
                          <li><a href="registerform.php">REGISTRATION</a></li>
                           <li><a href="feedback.php">FEEDBACK</a></li>
                       </ul>
                   </nav>

            </header>
            <section>
                <div class="sec_img">
                    <br><br><br>
                    <div class="box">
                        <br><br><br><br>
                        <h1 style="text-align: center; font-size: 35px;">Welcome to Library</h1><br><br>
                        <h1 style="text-align: center; font-size: 20px;">A service dedicated to Admin and Student. We provide online resources,professional support and guidance to all our students wherever,and from whenever they have chosen to study.</h1><br><br>
                        <!-- <h1 style="text-align: center; font-size: 25px;">Closes at:05:00 PM</h1><br><br> -->
                    </div>
                </div>
            </section>
        </div>
        <?php
        include "footer.php";
        ?>

</body>
</html>