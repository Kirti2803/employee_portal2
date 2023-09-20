<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $date = $_POST["date"];
    $problem = $_POST["problem"];
    $solution = $_POST["solution"];

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

    // Prepare SQL query to insert data into the add_problem table
    $sql = "INSERT INTO add_problem(name, date, problem, solution) VALUES ('$name', '$date', '$problem', '$solution')";

    // Execute the query and check for success
    if ($conn->query($sql) === TRUE) {
        echo "Problem added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
