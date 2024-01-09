<?php
// connect.php - Include your database connection code here if not already included

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['notesname'])) {
    $notesname = $_POST['notesname'];

    // Establish database connection
    require("./connect.php");

    // Prepare a DELETE statement
    $sql = "DELETE FROM notes WHERE notesname = ?";
    $stmt = $connect->prepare($sql);

    if (!$stmt) {
        die("Error in SQL query: " . $connect->error);
    }

    // Bind the parameter and execute the statement
    $stmt->bind_param("s", $notesname);
    if ($stmt->execute()) {
        echo "Notes deleted successfully.";
    } else {
        echo "Error deleting Notes: " . $stmt->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $connect->close();
} else {
    echo "Invalid request.";
}
?>
