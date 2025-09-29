<!DOCTYPE html>
<html>
<head>
    <title>Library Feedback Form</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        /* Apply basic styling to the form container */
body {
    font-family: Arial, sans-serif;
    background-image: url('images/li12.jpg');
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    margin-top: 20px;
    color: white;
}
h2 {
    text-align: center;
    margin-top: 20px;
    color: black;
}


/* Style for error messages */
.error {
    color: #ff0000; /* Red text color */
    font-size: 30px; /* Font size */
    margin-bottom: 10px; /* Spacing between error messages */
}


form {
    background-color: #fff;
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style form labels and inputs */
label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

input[type="text"],
input[type="email"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    background: #eee;
    border-radius: 4px;
}

/* Style radio buttons */
input[type="radio"] {
    margin-right: 10px;
}

/* Style submit button */
input[type="submit"] {
    background-color: #833e82;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Adjust spacing and styling for the thank you message */
.thank-you {
    text-align: center;
    margin-top: 20px;
    color: #007BFF;
    font-weight: bold;
}

/* Responsive design for smaller screens */
@media screen and (max-width: 768px) {
    form {
        padding: 10px;
    }
}

    </style>
</head>
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
              <li class="nav-item">
                <a class="nav-link" href="index.php">LOGOUT</a>
              </li>
            </ul>
        </div>
    </nav><br>

    <!-- Add this section for error messages -->
<div id="error-message">
    <?php
    if (isset($_GET['error'])) {
        echo '<p class="error">' . htmlspecialchars($_GET['error']) . '</p>';
    }
    ?>
</div>
    <h1><marquee>Library Management System Feedback Form</marquee></h1>
    <form action="process_feedback.php" method="post">
        <h2>Feedback Form</h2>
        <label for="name"></label>
        <input type="text" name="name" id="name" required placeholder="Name"><br><br>

        <label for="email"></label>
        <input type="email" name="email" id="email" required placeholder="Email" ><br><br>

        <label>1. How satisfied are you with the overall library services?</label><br>
        <input type="radio" name="satisfaction" value="Very Satisfied"> Very Satisfied
        <input type="radio" name="satisfaction" value="Satisfied"> Satisfied
        <input type="radio" name="satisfaction" value="Neutral"> Neutral
        <input type="radio" name="satisfaction" value="Dissatisfied"> Dissatisfied
        <input type="radio" name="satisfaction" value="Very Dissatisfied"> Very Dissatisfied
        <br><br>

        <!-- Include other form fields here -->

        <input type="submit" value="Submit">
    </form>
</body>
</html>
