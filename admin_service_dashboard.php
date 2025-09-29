<?php

// @include 'db.php';

// session_start();

// if( null!=($_SESSION['adminid'])){
//    header('location:login.php');
// }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/dashboard.css">
    <style>
        body{
            background-image: url('images/shuvo.jpg');
/*                background-color: #3d6d83;*/
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



    </style>
    <script>
    function validateAddPersonForm() {
        var name = document.forms["addPersonForm"]["addnames"].value;
        var password = document.forms["addPersonForm"]["addpass"].value;
        var email = document.forms["addPersonForm"]["addemail"].value;

        if (name.trim() == "") {
            alert("Please enter a name.");
            return false;
        }

        if (password.trim() == "") {
            alert("Please enter a password.");
            return false;
        }

        if (email.trim() == "") {
            alert("Please enter an email.");
            return false;
        }
    }

    function validateAddBookForm() {
        var bookName = document.forms["addBookForm"]["bookname"].value;
        var bookDetail = document.forms["addBookForm"]["bookdetail"].value;
        var bookAuthor = document.forms["addBookForm"]["bookaudor"].value;
        var bookPublication = document.forms["addBookForm"]["bookpub"].value;

        if (bookName.trim() == "") {
            alert("Please enter a book name.");
            return false;
        }

        if (bookDetail.trim() == "") {
            alert("Please enter book details.");
            return false;
        }

        if (bookAuthor.trim() == "") {
            alert("Please enter book author.");
            return false;
        }

        if (bookPublication.trim() == "") {
            alert("Please enter book publication.");
            return false;
        }
    }
</script>

</head>

<body>

    <?php
   include("data_class.php");

$msg="";

   if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
 }

if($msg=="done"){
    echo "<div class='alert alert-success' role='alert'>Successfully Executed</div>";
}
elseif($msg=="fail"){
    echo "<div class='alert alert-danger' role='alert'>Fail</div>";
}

    ?>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="admin_dashboard.php">Library Management System (LMS)</a>
            </div>
            <font style="color: white"><span><strong>HEllO,ADMIN!</strong></span></font>
            <ul class="nav navbar-nav navbar-right">
              <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="view_profile.php">View Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="change_password.php">Change Password</a>
                </div>
              </li> -->
              <!-- <li class="nav-item"><a class="nav-link" href="feedback.php"> UserFeedaback</a></li> -->




    <!-- Button to show/hide the feedback table -->
    <button id="showFeedbackBtn">Show Feedback Table</button>

    <!-- Feedback table (hidden by default) -->
    <table id="feedbackTable" style="display: none; font-family: Arial, Helvetica, sans-serif; border-collapse: collapse; width: 100%;">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Satisfaction</th>
            <th>Submission Date</th>
        </tr>
        <!-- Table rows will be populated by PHP as shown below -->
        <?php
        // Step 1: Connect to your MySQL database (modify these parameters with your database credentials)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "library_managment";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Step 2: Execute a SQL query to retrieve feedback data
        $sql = "SELECT * FROM feedback"; // Modify "feedback" with your actual table name
        $result = $conn->query($sql);

        // Step 3: Loop through the data and generate HTML rows
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['satisfaction'] . '</td>';
                echo '<td>' . $row['submission_date'] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="5">No feedback data available.</td></tr>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </table>

    <script>
        // JavaScript to toggle visibility of the feedback table
        document.getElementById('showFeedbackBtn').addEventListener('click', function() {
            var feedbackTable = document.getElementById('feedbackTable');
            if (feedbackTable.style.display === 'none' || feedbackTable.style.display === '') {
                feedbackTable.style.display = 'table'; // Show the table
            } else {
                feedbackTable.style.display = 'none'; // Hide the table
            }
        });
    </script>




              <li class="nav-item">
                <a class="nav-link" href="adminlogin.php">Logout</a>
              </li>
            </ul>
        </div>
    </nav><br>





    <div class="container">
        <div class="content">
      <!-- <h3><span>HELLO, ADMIN!</span></h3> -->
      <h1><marquee>WELCOME TO LIBRARY MANAGEMENT SYSTEM <span></marquee></span></h1>
      <p><span>As you are Admin you can add a book to library,view available book in library,issue books to students.View issed book to students and many more.....!<span></p>
        <p><span>Option Available For You!</span></p>
      
   </div>
        <div class="innerdiv">
            <!-- <div class="row"><img class="imglogo" src="images/logo.png" /></div> -->
            <!-- <div class="row"><img class="imglogo" src="images/library.png" /></div> -->

            <div class="leftinnerdiv">
                <!-- <Button class="greenbtn"> ADMIN</Button> -->
                <Button class="greenbtn" onclick="openpart('addbook')"><img class="icons" src="images/icon/book.png" width="30px" height="30px"/>ADD BOOK</Button>
                <Button class="greenbtn" onclick="openpart('bookreport')"><img class="icons" src="images/icon/open-book.png" width="30px" height="30px"/> BOOK REPORT</Button>
                <Button class="greenbtn" onclick="openpart('bookrequestapprove')"><img class="icons" src="images/icon/interview.png" width="30px" height="30px"/> BOOK REQUESTS</Button>
                <Button class="greenbtn" onclick="openpart('addperson')"><img class="icons" src="images/icon/add-user.png" width="30px" height="30px"/> ADD USER</Button>
                <Button class="greenbtn" onclick="openpart('studentrecord')"><img class="icons" src="images/icon/monitoring.png" width="30px" height="30px"/> USER REPORT</Button>
                <Button class="greenbtn" onclick="openpart('issuebook')"><img class="icons" src="images/icon/test.png" width="30px" height="30px"/> ISSUE BOOK</Button>
                <Button class="greenbtn" onclick="openpart('issuebookreport')"><img class="icons" src="images/icon/checklist.png" width="30px" height="30px"/> ISSUE REPORT</Button>
                <a href="index.php"><Button class="greenbtn"><img class="icons" src="images/icon/logout.png" width="30px" height="30px"/> LOGOUT</Button></a>
            </div>

            <div class="rightinnerdiv">
                <div id="bookrequestapprove" class="innerright portion" style="display:none">
                    <Button class="greenbtn">BOOK REQUEST APPROVE</Button>
                    <?php
            $u=new data;
            $u->setconnection();
            $u->requestbookdata();
            $recordset=$u->requestbookdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Person Name</th><th>person type</th><th>Book name</th><th>Days </th><th>Approve</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
              "<td>$row[1]</td>";
              "<td>$row[2]</td>";

                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
               // $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved BOOK</button></a></td>";
                 $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved</button></a></td>";
                // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

                </div>
            </div>

            <div class="rightinnerdiv">
                <div id="addbook" class="innerright portion"
                    style="<?php  if(!empty($_REQUEST['viewid'])){ echo "display:none";} else {echo ""; }?>">
                    <Button class="greenbtn">ADD NEW BOOK</Button>
                    <!-- <form action="addbookserver_page.php" method="post" enctype="multipart/form-data"> -->
                        <form action="addbookserver_page.php" method="post" enctype="multipart/form-data" name="addBookForm" onsubmit="return validateAddBookForm()">

                        <label>Book Name:</label><input type="text" name="bookname" id="move" />
                        </br>
                        <label>Detail:</label><input type="text" name="bookdetail" id="move" /></br>
                        <label>Author:</label><input type="text" name="bookaudor" id="move" /></br>
                        <label>Publication</label><input type="text" name="bookpub" id="move" /></br>
                        <div class="branch">Courses:<input type="radio" name="courses" value="BCA" id="move" />BCA
                            <input type="radio" name="courses" value="CSIT" id="move" />CSIT
                            <!-- <div style="margin-left:80px"> -->
                            <input type="radio" name="courses" value="BIM" id="move" />BIM
                            <input type="radio" name="courses" value="other" id="move" />OTHERS
                            <!-- </div> -->
                        </div>
                        <label>Price:</label><input type="number" name="bookprice" /></br>
                        <label>Quantity:</label><input type="number" name="bookquantity" /></br>
                        <label>Book Photo</label><input type="file" name="bookphoto" /></br>
                        </br>

                        <input type="submit" value="SUBMIT" />
                        </br>
                        </br>

                    </form>
                </div>
            </div>

<!-- add student -->
            <div class="rightinnerdiv">
                <div id="addperson" class="innerright portion" style="display:none">
                    <Button class="greenbtn">ADD STUDENT</Button>
                    <!-- <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data"> -->
                        <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data" name="addPersonForm" onsubmit="return validateAddPersonForm()">

                        <label>Name:</label><input type="text" name="addnames" />
                        </br>
                        <label>Pasword:</label><input type="pasword" name="addpass" />
                        </br>
                        <label>Email:</label><input type="email" name="addemail" /></br>
                        <label for="typw">Choose type:</label>
                        <select name="type">
                            <option value="student">student</option>
                            <option value="teacher">teacher</option>
                        </select>

                        <input type="submit" value="SUBMIT" />
                    </form>
                </div>
            </div>
<!-- student record -->
            <div class="rightinnerdiv">
                <div id="studentrecord" class="innerright portion" style="display:none">
                    <Button class="greenbtn">STUDENT RECORD</Button>

                    <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'> Name</th><th>Email</th><th>Type</th><th>Delete</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                // $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'>Delete</a></td>";
                $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'><button type='button' class='btn btn-primary'>Delete</button></a></td>";
                // $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'>Delete</a></td>";
                // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'><button type='button' class='btn btn-primary'>Delete</button></a></td>";

                // $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'>Delete</a></td>";
                // <button type='button' class='btn btn-primary'>View BOOK</button></a></td>
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

                </div>
            </div>
<!-- issue report -->
            <div class="rightinnerdiv">
                <div id="issuebookreport" class="innerright portion" style="display:none">
                    <Button class="greenbtn">Issue Book Record</Button>

                    <?php
            $u=new data;
            $u->setconnection();
            $u->issuereport();
            $recordset=$u->issuereport();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>ID</th><th>Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Due Date</th><th>Return Date</th><th>Fine</th></th><th>Issue Type</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[4]</td>";
                // $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'>Return</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

                </div>
            </div>

            <!--             

issue book -->
            <div class="rightinnerdiv">
                <div id="issuebook" class="innerright portion" style="display:none">
                    <Button class="greenbtn">ISSUE BOOK</Button>
                    <form action="issuebook_server.php" method="post" enctype="multipart/form-data">
                        <label for="book">Choose Book:</label>
                        <select name="book">
                            <?php
            $u=new data;
            $u->setconnection();
            $u->getbookissue();
            $recordset=$u->getbookissue();
            foreach($recordset as $row){

                echo "<option value='". $row[2] ."'>" .$row[2] ."</option>";
        
            }            
            ?>
        </select>
<br>

     <label for="Select Student">Select Student:</label>
                        <select name="userselect">
                            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();
            foreach($recordset as $row){
               $id= $row[0];
               echo "<option value='". $row[0] ."'>" .$row[0] ."</option>";
                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
            }            
            ?>
                        </select>
                        <br>
                        Days<input type="number" name="days" min="1" onkeypress="return(even.charCode!=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" />
                       <!--   <br>
        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" />
        <br> -->

                        <input type="submit" value="SUBMIT" />
                    </form>
                </div>
            </div>

            <div class="rightinnerdiv">
                <div id="bookdetail" class="innerright portion"
                    style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">

                    <Button class="greenbtn">BOOK DETAIL</Button>
                    </br>
                    <?php
            $u=new data;
            $u->setconnection();
            $u->getbookdetail($viewid);
            $recordset=$u->getbookdetail($viewid);
            foreach($recordset as $row){

                $bookid= $row[0];
               $bookimg= $row[1];
               $bookname= $row[2];
               $bookdetail= $row[3];
               $bookauthour= $row[4];
               $bookpub= $row[5];
               $courses= $row[6];
               $bookprice= $row[7];
               $bookquantity= $row[8];
               $bookava= $row[9];
               $bookrent= $row[10];

            }            
?>

                    <img width='150px' height='150px' style='border:1px solid #333333; float:left;margin-left:20px'
                        src="uploads/<?php echo $bookimg?> " />
                    </br>
                    <p style="color:black"><u>Book Name:</u> &nbsp&nbsp<?php echo $bookname ?></p>
                    <p style="color:black"><u>Book Detail:</u> &nbsp&nbsp<?php echo $bookdetail ?></p>
                    <p style="color:black"><u>Book Authour:</u> &nbsp&nbsp<?php echo $bookauthour ?></p>
                    <p style="color:black"><u>Book Publisher:</u> &nbsp&nbsp<?php echo $bookpub ?></p>
                    <p style="color:black"><u>Book Courses:</u> &nbsp&nbsp<?php echo $courses ?></p>
                    <p style="color:black"><u>Book Price:</u> &nbsp&nbsp<?php echo $bookprice ?></p>
                    <p style="color:black"><u>Book Available:</u> &nbsp&nbsp<?php echo $bookava ?></p>
                    <p style="color:black"><u>Book Rent:</u> &nbsp&nbsp<?php echo $bookrent ?></p>


                </div>
            </div>


<!-- book record -->
            <div class="rightinnerdiv">
                <div id="bookreport" class="innerright portion" style="display:none">
                    <Button class="greenbtn">BOOK RECORD</Button>
                    <?php
            $u=new data;
            $u->setconnection();
            $u->getbook();
            $recordset=$u->getbook();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Book Name</th><th>Price</th><th>Qnt</th><th>Available</th><th>Rent</th></th><th>View</th><th>Delete</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[9]</td>";
                $table.="<td>$row[10]</td>";
                $table.="<td><a href='admin_service_dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-primary'>View BOOK</button></a></td>";
                // $table.="<td><a href='admin_service_dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-primary'>Delete BOOK</button></a></td>";
                // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'><button type='button' class='btn btn-primary'>Delete</button></a></td>";
                
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
