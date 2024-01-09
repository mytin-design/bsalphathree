<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in (you need to implement your own login logic)
if(isset($_SESSION['username'])) {
    // Connect to the database
    require('./connect.php');

    // Retrieve the image path from the database for the logged-in user
    $loggedInUserId = $_SESSION['username'];
    $getImgQuery = "SELECT profileimg FROM students WHERE username = ?";
    $getImgStmt = $connect->prepare($getImgQuery);
    $getImgStmt->bind_param('i', $loggedInUserId);
    $getImgStmt->execute();
    $getImgResult = $getImgStmt->get_result();

    // Check if the query was successful
    if ($getImgResult->num_rows > 0) {
        $row = $getImgResult->fetch_assoc();
        $imgPath = $row['profileimg'];

        // Display the image in HTML
        echo '<img src="' . $imgPath . '" alt="Profile Image">';
    } else {
        echo 'Image not found.';
    }

    // Close database connection and statement
    $getImgStmt->close();
    $connect->close();
} else {
    echo 'User is not logged in.';
}
?>
