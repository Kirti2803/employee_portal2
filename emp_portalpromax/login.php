<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Database connection setup
    $servername = "localhost";
    $dbusername = "root"; // Replace with your MySQL username
    $dbpassword = ""; // Replace with your MySQL password
    $dbname = "technicalform";

    // Create a database connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL query to check if the username and password match
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if a row with the provided username and password exists
    if ($result->num_rows == 1) {
        // Login successful, redirect to add_problem.html
        header("Location: add_problem.html");
        exit();
    } else {
        // Login failed, display an error message
        echo "Login failed. Please check your username and password.";
    }

    // Close the database connection
    $conn->close();
}
?>
