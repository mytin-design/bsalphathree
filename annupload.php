<?php
require('./connect.php');

// Function to sanitize user inputs
function sanitize_input($input) {
    // Implement your sanitization logic here
    // For example, you can use mysqli_real_escape_string() or other methods
    return htmlspecialchars(trim($input));
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $annsname = isset($_POST['annsname']) ? sanitize_input($_POST['annsname']) : '';
    $dateuploaded = isset($_POST['dateuploaded']) ? sanitize_input($_POST['dateuploaded']) : '';
    $annsauthor = isset($_POST['annsauthor']) ? sanitize_input($_POST['annsauthor']) : '';
    $annstype = isset($_POST['annstype']) ? sanitize_input($_POST['annstype']) : '';
    $annsgrade = isset($_POST['annsgrade']) ? sanitize_input($_POST['annsgrade']) : '';
    $annsdetails = isset($_POST['annsdetails']) ? sanitize_input($_POST['annsdetails']) : '';



    


    if ($annsname && $dateuploaded && $annsauthor && $annstype && $annsgrade && $annsdetails) {
        // Add your database connection logic here if it's not already included
        require "./connect.php";

        // Check if the regno already exists in the database
        $check_query = "SELECT * FROM announcements WHERE annsname=?";
        $check_stmt = $connect->prepare($check_query);
        $check_stmt->bind_param('s', $annsname);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>
                    alert('Announcement already exists. Please choose a different name.');
                    window.location.href = './staffdashboard.php';
                  </script>";
        } else {

                       // File upload handling
                $targetDirectory = "uploads/"; // Directory to store uploaded files
                $targetFile = $targetDirectory . basename($_FILES["annsfile"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["annsfile"]["tmp_name"]);
                    if($check !== false) {
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }

                // Check if file already exists
                if (file_exists($targetFile)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                // Check file size (adjust the size limit as needed)
                if ($_FILES["annsfile"]["size"] > 5000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                } else {
                    // Attempt to upload file
                    if (move_uploaded_file($_FILES["annsfile"]["tmp_name"], $targetFile)) {
                        echo "The file ". htmlspecialchars(basename($_FILES["annsfile"]["name"])). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }





            // Prepare the SQL statement using a prepared statement to prevent SQL injection
            $insert_stmt = $connect->prepare("INSERT INTO announcements (annsname, dateuploaded, annsauthor, annstype, annsgrade, annsdetails, annsfile)  
                                            VALUES (?, ?, ?, ?, ?, ?, ?)");

            
            if ($insert_stmt) {
                
                
                // Bind parameters and execute the query
                $insert_stmt->bind_param('sssssss', $annsname, $dateuploaded, $annsauthor, $annstype, $annsgrade, $annsdetails, $targetFile);
                $insert_stmt->execute();

                // Check if the query was successful
                if ($insert_stmt->affected_rows > 0) {
                    echo "<script>
                            alert('Announcement Uploaded Successful!');
                            window.location.href = './staffdashboard.php';

                          </script>";
                } else {
                    echo "<script>
                            alert('Kindly try again');
                            window.location.href = './staffdashboard.php';

                          </script>";
                
                } 

            // Close the statement for insertion
            $insert_stmt->close();
            }
        }

        // Close the connection and statement for checking regno
        $check_stmt->close();
        $connect->close();
    } else {
        echo "<script>
                alert('All fields are required');
                window.location.href = './staffdashboard.php';

              </script>";
    }
}


?>