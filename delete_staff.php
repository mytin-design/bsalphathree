<?php
// connect.php - Include your database connection code here if not already included

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['staffid'])) {
    $staffid = $_POST['staffid'];

    // Establish database connection
    require("./connect.php");

    // Prepare a DELETE statement
    $sql = "DELETE FROM staff WHERE staffid = ?";
    $stmt = $connect->prepare($sql);

    if (!$stmt) {
        die("Error in SQL query: " . $connect->error);
    }

    // Bind the parameter and execute the statement
    $stmt->bind_param("s", $staffid);
    if ($stmt->execute()) {
        echo "Staff deleted successfully.";
    } else {
        echo "Error deleting Staff: " . $stmt->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $connect->close();
} else {
    echo "Invalid request.";
}
?>
