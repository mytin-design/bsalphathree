<?php
//This code should be appended where you need the img to display;
//You need another script to upload the new img

// Start the session to access session variables
session_start();

// Check if the user is logged in (you need to implement your own login logic)
if(isset($_SESSION['staffid'])) {
    // Display the image in HTML
    if (isset($_SESSION['profileimg'])) {
        $imgPath = $_SESSION['profileimg'];
        echo '<img style="height:15pc; width: 15pc; border-radius: .4pc;"  src="' . $imgPath . '" alt="Profile Image">';
    } else {
        echo 'Profile image not found.';
    }
} else {
    echo 'User is not logged in.';
}

// After successfully updating the profile picture in the database for the logged-in user
// Update the session variable 'profileimg'
$_SESSION['profileimg'] = $newImagePath; // $newImagePath is the updated image path
?>

