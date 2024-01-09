<?php
session_start();

require('./connect.php');

// Function to sanitize user inputs
function sanitize_input($input) {
    // Implement your sanitization logic here
    // For example, you can use mysqli_real_escape_string() or other methods
    return htmlspecialchars(trim($input));
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $staffid = isset($_POST['staffid']) ? sanitize_input($_POST['staffid']) : '';
    $password = isset($_POST['password']) ? sanitize_input($_POST['password']) : '';

    if ($staffid && $password) {
        // Add your database connection logic here if it's not already included
        require "./connect.php";

        // Prepare the SQL statement using a prepared statement to prevent SQL injection
        $stmt = $connect->prepare("SELECT password FROM staff WHERE staffid = ?");

        // Bind parameter and execute the query
        $stmt->bind_param('s', $staffid);
        $stmt->execute();

        // Store the result from the query
        $stmt->store_result();

        // If a row with the given staffid exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashed_password);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // Passwords match - authentication successful
                // Start a session and store user information if needed
                $_SESSION['staffid'] = $staffid; // Store staffid in session variable
                header("Location: staffdashboard.php");
                exit();
            } else {
                // Passwords do not match
               // echo "<div class='tlogerbx'><p>Incorrect password</p></div>";
              // echo "<script>displayAlert('Incorrect password');</script>";
              echo "<script>
                        alert('Incorrect password.');
                        window.location.href = './portal-login.php';
                    </script>";
            }
        } else {
            // No user found with the provided staffid
            //echo "<div class='tlogerbx'><p>User not found</p></div>";
            echo "<script>
                alert('No user found with the provided staffid.');
                window.location.href = './portal-login.php';
            </script>;";
        }

        // Close the statement and connection
        $stmt->close();
        $connect->close();
    } else {
        echo 'All fields are required';
    }
}


?>