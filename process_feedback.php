<?php
// Database connection configuration (adjust as needed)
$host = 'localhost';
$dbname = 'library_managment';
$username = 'root';
$password = '';

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Extract form data
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $satisfaction = $_POST['satisfaction'] ?? null;

     // Perform form validation
    if (empty($name)) {
        // If the name field is empty, redirect back with an error message
        header("Location: feedback.php?error=Name is required");
        exit;
    }

    // Prepare and execute SQL query to insert data into the feedback table
    $stmt = $pdo->prepare("INSERT INTO feedback (name, email, satisfaction) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $satisfaction]);

    // Close the database connection
    $pdo = null;

    // Redirect to a thank you page or display a confirmation message
    header("Location: thank_you.html");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>
