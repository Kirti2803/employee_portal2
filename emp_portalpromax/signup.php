<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $staffNumber = $_POST["staffNumber"];
    $department = $_POST["department"];
    $sbu = $_POST["sbu"];
    $programmingLanguages = $_POST["programmingLanguages"];
    $networkLanguages = $_POST["networkLanguages"];
    $networkPlatform = $_POST["networkPlatform"];
    $operationSystem = $_POST["operationSystem"];
    $password = $_POST["password"];
    $retypePassword = $_POST["retypePassword"];

    // Check if username starts with a lowercase letter
    if (!preg_match('#^[a-z]#', $username)) {
        echo "Username should not start with a capital letter.";
    } elseif ($password !== $retypePassword) {
        echo "Password and retype password do not match.";
    }// elseif (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+}{":;<>,.?/~`\\[\]\\\-]).{8,}$#', $password)) {
       // echo "Password should contain at least one lowercase letter, one uppercase letter, one number, and one special character.";
    //} 
       else {
        // Database connection setup
        $servername = "localhost";
        $dbusername = "root"; // Replace with your MySQL username
        $dbpassword = ""; // Replace with your MySQL password
        $dbname = "technicalform";    

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert user details into the database
        $sql = "INSERT INTO users (username, staffNumber, department, sbu, programmingLanguages, networkLanguages, networkPlatform, operationSystem, password,retypePassword )
                VALUES ('$username', '$staffNumber', '$department', '$sbu', '$programmingLanguages', '$networkLanguages', '$networkPlatform', '$operationSystem', '$password','$retypePassword ')";

        if ($conn->query($sql) === TRUE) {
            echo "User registered successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>
