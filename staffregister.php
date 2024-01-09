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
    $staffid = isset($_POST['staffid']) ? sanitize_input($_POST['staffid']) : '';
    $staffname = isset($_POST['staffname']) ? sanitize_input($_POST['staffname']) : '';
    $dateofbirth = isset($_POST['dateofbirth']) ? sanitize_input($_POST['dateofbirth']) : '';
    $staffrole = isset($_POST['staffrole']) ? sanitize_input($_POST['staffrole']) : '';
    $basicpay = isset($_POST['basicpay']) ? sanitize_input($_POST['basicpay']) : '';
    //$profileimg = isset($_POST['profileimg']) ? sanitize_input($_POST['profileimg']) : '';
    $department = isset($_POST['department']) ? sanitize_input($_POST['department']) : '';
    $subjects = isset($_POST['subjects']) ? sanitize_input($_POST['subjects']) : '';
    $staffemail = isset($_POST['staffemail']) ? sanitize_input($_POST['staffemail']) : '';
    $staffphone = isset($_POST['staffphone']) ? sanitize_input($_POST['staffphone']) : '';
    $nextofkin = isset($_POST['nextofkin']) ? sanitize_input($_POST['nextofkin']) : '';
    
    $remedialall = isset($_POST['remedialallocation']) ? sanitize_input($_POST['remedialallocation']) : '';
    $maritalstat = isset($_POST['maritalstatus']) ? sanitize_input($_POST['maritalstatus']) : '';
    $yearofemp = isset($_POST['yearofemp']) ? sanitize_input($_POST['yearofemp']) : '';
    $staffstatus = isset($_POST['activestatus']) ? sanitize_input($_POST['activestatus']) : '';
    $staffgender = isset($_POST['staffgender']) ? sanitize_input($_POST['staffgender']) : '';
    $nhifno = isset($_POST['nhifno']) ? sanitize_input($_POST['nhifno']) : '';
    $nssfno = isset($_POST['nssfno']) ? sanitize_input($_POST['nssfno']) : '';
    $tscno = isset($_POST['tscno']) ? sanitize_input($_POST['tscno']) : '';
    $bankname = isset($_POST['bankname']) ? sanitize_input($_POST['bankname']) : '';
    $bankaccno = isset($_POST['bankaccno']) ? sanitize_input($_POST['bankaccno']) : '';
    
    $nationality = isset($_POST['nationality']) ? sanitize_input($_POST['nationality']) : '';
    $password = isset($_POST['password']) ? sanitize_input($_POST['password']) : '';
    $confirmpassword = isset($_POST['confirmpassword']) ? sanitize_input($_POST['confirmpassword']) : '';



    if ($staffid && $staffname &&  $dateofbirth && $staffrole && $basicpay  && $department && $subjects && $staffemail && $staffphone && $nextofkin && $remedialall && $maritalstat && $yearofemp && $staffstatus && $staffgender && $nhifno && $nssfno && $tscno && $bankname && $bankaccno  && $nationality && $password && $confirmpassword) {
        // Add your database connection logic here if it's not already included
        require "./connect.php";

        // Check if the staffid already exists in the database
        $check_query = "SELECT * FROM staff WHERE staffid=?";
        $check_stmt = $connect->prepare($check_query);
        $check_stmt->bind_param('s', $staffid);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>
                    alert('staffid already exists. Please choose a different staffid.');
                  </script>";
        } else {

            // File upload handling
    $targetDirectory = "uploads/"; // Directory to store uploaded files
    $targetFile = $targetDirectory . basename($_FILES["profileimg"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["profileimg"]["tmp_name"]);
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
    if ($_FILES["profileimg"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats (you can adjust this as needed)
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Attempt to upload file
        if (move_uploaded_file($_FILES["profileimg"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars(basename($_FILES["profileimg"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }



    


            // Prepare the SQL statement using a prepared statement to prevent SQL injection
            $insert_stmt = $connect->prepare("INSERT INTO staff (staffid, name, dateofbirth, role,basicpay,profileimg, department, subjects, email, phone, nextofkin, remedialallocation, maritalstatus, yearofemployment, status,gender, nhifno, nssfno,tscno,bankname,bankaccno, nationality, password)  
                                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");

            //possible error - column count does not match row count
            if ($insert_stmt) {
                
                if($password === $confirmpassword) {
                    //has password for secure storage
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Bind parameters and execute the query
                $insert_stmt->bind_param('sssssssssssssssssssssss', $staffid, $staffname, $dateofbirth, $staffrole, $basicpay, $targetFile, $department, $subjects, $staffemail, $staffphone, $nextofkin, $remedialall, $maritalstat, $yearofemp, $staffstatus, $staffgender, $nhifno, $nssfno, $tscno, $bankname, $bankaccno, $nationality, $hashed_password);
                $insert_stmt->execute();

                //possible error - number of bind parameters does not match number of variables passed;

                // Check if the query was successful
                if ($insert_stmt->affected_rows > 0) {
                    echo "<script>
                            alert('Staff Registration Successful!');
                            window.location = 'cpsmarkssystem.php';
                          </script>";
                } else {
                    echo "<script>
                            alert('Kindly try again');
                          </script>";
                }
                }else {
                    echo "<script>
                        alert('Passwords do not match');
                      </script>";
                }
            } else {
                echo "<script>
                        alert('Records do not match');
                      </script>";
            }

            // Close the statement for insertion
            $insert_stmt->close();
        }

        // Close the connection and statement for checking staffid
        $check_stmt->close();
        $connect->close();
    } else {
        echo "<script>
                alert('All fields are required');
                window.location = 'cpsmarkssystem.php';
              </script>";
    }
}


?>