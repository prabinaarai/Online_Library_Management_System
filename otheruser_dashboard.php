<?php

session_start();

$userloginid=$_SESSION["userid"]= $_GET['userlogid'];
echo $_SESSION["userid"];


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student/Teacher Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/other.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<style>
     body{
            background-image: url('images/li14.jpg');
        }
         .container .content{
   text-align: center;
}

.container .content h3{
   font-size: 30px;
   color:#fff;
}

.container .content h3 span{
   background: purple;
   color:#fff;
   border-radius: 5px;
   padding:0 15px;
}

.container .content h1{
   font-size: 50px;
   color:#fff;
}

.container .content h1 span{
   color:purple;
}

.container .content p{
   font-size: 25px;
   margin-bottom: 20px;
   color: white;
}
.container .content p span{
   font-size: 25px;
   margin-bottom: 20px;
   background: #3d6d83;
}
.btn-primary{
        background-color: #a90981;
}
.bg-dark{
    background-color: #710a27 !important !important !important;
    height: 100px;
    width: 100%;
}

        label {
            margin-left:50px;
            padding-Top:10px;
            /* display: block;
            text-align: left; */
            font-size: 18px;
            /* font-style:bold;
            padding-bottom: 0px; */
            color: rgb(51, 51, 51);
            /* font-weight: 300;
            margin-bottom: 0rem; */
        }
        
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        
        input[type=text]:focus,
        input[type=email]:focus,
        input[type=number]:focus,
        input[type=pasword]:focus,

        select:focus,
        textarea:focus {
            outline: none;
        }
        
        input[type=text],
        input[type=email],
        input[type=number],
        input[type=pasword],
        select,
        textarea {
            
            width: 40%;
            padding: 2px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            margin-top: 2px;
            margin-bottom: 2px;
            resize: vertical;
        }
        


        
        body {
            font-family: 'Roboto';
            /* background-image: url('images/library.jpg'); */
         
        }
        


        
         ::placeholder {
            color: rgb(189, 184, 184);
            font-style: italic;
            font-size: 14px;
        }

    /*.navbar{
        min-height: 100vh;
        padding-top: 60px;
    }*/



</style>

<body>

    <?php
   include("data_class.php");
    ?>


    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="admin_dashboard.php">Library Management System (LMS)</a>
            </div>
            <font style="color: white"><span><strong>HEllO,USER</strong></span></font>
            <ul class="nav navbar-nav navbar-right">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="view_profile.php">View Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="change_password.php">Change Password</a>
                </div>
              </li> -->
            <!--   <li class="nav-item">
                <a class="nav-link" href="studentform.php">Logout</a>
              </li>
            </ul>
        </div>
    </nav><br> --> -->

    <div class="container">
          <div class="content">
      <h3><span>HELLO, USER!</span></h3>
      <h1><marquee>WELCOME TO LIBRARY MANAGEMENT SYSTEM <span><?php echo $_SESSION['userid']; ?></marquee></span></h1>
      <p><span>As you are User(Teacher/Student) you can see how many book you have taken from library with fine and many more.....!<span></p>
      
   </div>
        <div class="innerdiv">
            <!-- <div class="row"><img class="imglogo" src="images/library.png" /></div> -->
            <div class="leftinnerdiv"><br>
                <Button class="greenbtn" onclick="openpart('myaccount')"> <img class="icons" src="images/icon/profile.png" width="30px" height="30px"/>  My Account</Button>
                <Button class="greenbtn" onclick="openpart('requestbook')"><img class="icons" src="images/icon/book.png" width="30px" height="30px"/> Request Book</Button>
                <Button class="greenbtn" onclick="openpart('issuereport')"> <img class="icons" src="images/icon/monitoring.png" width="30px" height="30px"/>  Book Report</Button>
                <a href="index.php"><Button class="greenbtn" ><img class="icons" src="images/icon/logout.png" width="30px" height="30px"/> LOGOUT</Button></a>
            </div>


            <div class="rightinnerdiv">
                <div id="myaccount" class="innerright portion"
                    style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo ""; }?>">
                    <Button class="greenbtn">My Account</Button>

                    <?php

            $u=new data;
            $u->setconnection();
            $u->userdetail($userloginid);
            $recordset=$u->userdetail($userloginid);
            foreach($recordset as $row){

            $id= $row[0];
            $name= $row[1];
            $email= $row[2];
            $pass= $row[3];
            $type= $row[4];
            }               
                ?>

                    <p style="color:black"><b>User Name : </b> &nbsp&nbsp<?php echo $name ?></p>
                    <p style="color:black"><b>User Email : </b> &nbsp&nbsp<?php echo $email ?></p>
                    <p style="color:black"><b>Account Type :</b> &nbsp&nbsp<?php echo $type ?>
                    </p>

                </div>
            </div>






            <div class="rightinnerdiv">
                <div id="issuereport" class="innerright portion"
                    style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo "display:none"; }?>">
                    <Button class="greenbtn">ISSUE RECORD</Button>

                    <?php

            $userloginid=$_SESSION["userid"] = $_GET['userlogid'];
            $u=new data;
            $u->setconnection();
            $u->getissuebook($userloginid);
            $recordset=$u->getissuebook($userloginid);

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Return</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'><button type='button' class='btn btn-primary'>Return</button></a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

                </div>
            </div>


            <div class="rightinnerdiv">
                <div id="return" class="innerright portion"
                    style="<?php  if(!empty($_REQUEST['returnid'])){ $returnid=$_REQUEST['returnid'];} else {echo "display:none"; }?>">
                    <Button class="greenbtn">Return Book</Button>

                    <?php

            $u=new data;
            $u->setconnection();
            $u->returnbook($returnid);
            $recordset=$u->returnbook($returnid);
                ?>

                </div>
            </div>


            <div class="rightinnerdiv">
                <div id="requestbook" class="innerright portion"
                    style="<?php  if(!empty($_REQUEST['returnid'])){ $returnid=$_REQUEST['returnid'];echo "display:none";} else {echo "display:none"; }?>">
                    <Button class="greenbtn">Request Book</Button>

                    <?php
            $u=new data;
            $u->setconnection();
            $u->getbookissue();
            $recordset=$u->getbookissue();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr>
            <th>Image</th><th>Book Name</th><th>Book Authour</th><th>courses</th><th>price</th></th><th>Request Book</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
               $table.="<td><img src='uploads/$row[1]' width='100px' height='100px' style='border:1px solid #333333;'></td>";
               $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td><a href='requestbook.php?bookid=$row[0]&userid=$userloginid'><button type='button' class='btn btn-primary'>Request Book</button></a></td>";
           
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;


                ?>

                </div>
            </div>

        </div>
    </div>


    <script>
    function openpart(portion) {
        var i;
        var x = document.getElementsByClassName("portion");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(portion).style.display = "block";
    }
    </script>
</body>

</html>
