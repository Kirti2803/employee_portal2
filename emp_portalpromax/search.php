<?php
// Database connection setup (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "technicalform";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search input
$searchValue = $_GET["searchValue"];

// Prepare the SQL query to search for problems
$sql = "SELECT problem, solution FROM add_problem WHERE problem LIKE '%" . $conn->real_escape_string($searchValue) . "%'";

$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error); // Check for query errors
}

if ($result->num_rows > 0) {
    // Results found, display them in a table
    echo "<table border='1'>
            <tr>
                <th>Problem</th>
                <th>Solution</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["problem"] . "</td>
                <td>" . $row["solution"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    // No results found
    echo "No results found.";
}

$conn->close();
?>
