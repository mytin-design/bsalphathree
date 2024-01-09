<?php
// connect.php - Include your database connection code here if not already included

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['assignname'])) {
    $assignname = $_POST['assignname'];

    // Establish database connection
    require("./connect.php");

    // Prepare a DELETE statement
    $sql = "DELETE FROM assignments WHERE assignname = ?";
    $stmt = $connect->prepare($sql);

    if (!$stmt) {
        die("Error in SQL query: " . $connect->error);
    }

    // Bind the parameter and execute the statement
    $stmt->bind_param("s", $assignname);
    if ($stmt->execute()) {
        echo "Assignment deleted successfully.";
    } else {
        echo "Error deleting Assignment: " . $stmt->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $connect->close();
} else {
    echo "Invalid request.";
}
?>
