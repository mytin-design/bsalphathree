<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['staffid'])) {
    // Redirect to the login page if not logged in
    header("Location: portal-login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include your database connection script
    require('./connect.php');

    $staffid = $_SESSION['staffid'];
    $color = isset($_POST['color']) ? $_POST['color'] : '';
    $layout = isset($_POST['layout']) ? $_POST['layout'] : '';

    // Check if preferences exist for the current user
    $stmt = $connect->prepare("SELECT COUNT(*) FROM staffsettings WHERE staffid = ?");
    $stmt->bind_param('s', $staffid);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    // If preferences exist, update them; otherwise, insert new preferences
    if ($count > 0) {
        // Preferences exist, perform an update
        $stmt = $connect->prepare("UPDATE staffsettings SET color = ?, layout = ? WHERE staffid = ?");
        $stmt->bind_param('sss', $color, $layout, $staffid);
        $stmt->execute();
    } else {
        // Preferences don't exist, perform an insert
        $stmt = $connect->prepare("INSERT INTO staffsettings (staffid, color, layout) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $staffid, $color, $layout);
        $stmt->execute();
    }

    // Check for successful execution and handle errors if needed
    if ($stmt->affected_rows > 0) {
        // Preferences saved successfully or updated
        header("Location: staffdashboard.php");
        exit();
    } else {
        // Error occurred while saving preferences
        echo "Error: Unable to save preferences. Please try again.";
    }

    $connect->close();
}

?>