<?php
// // connect.php - Include your database connection code here if not already included

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
//     $username = $_POST['username'];

//     // Establish database connection
//     require("./connect.php");

//     if ($connect->connect_error) {
//         die("Connection failed: " . $connect->connect_error);
//     }


//     $sql_fetch_student_data = "SELECT * 
//     FROM students 
//     WHERE username = 'username'";
//     $result_student_data = $connect->query($sql_fetch_student_data);


//     if ($result_student_data->num_rows > 0) {
//         $row_student_data = $result_student_data->fetch_assoc();
        
//         // Extracting fetched data
//         $username = $row_student_data['username'];
//         $name = $row_student_data['name'];
//         $stdgrade = $row_student_data['stdgrade'];
//         $stream = $row_student_data['stream'];
        
//         // Other data from the form
//         $subjmath = isset($_POST['subjmath']) ? sanitize_input($_POST['subjmath']) : '';
//         $subjeng = isset($_POST['subjeng']) ? sanitize_input($_POST['subjeng']) : '';
//         $subjkisw = isset($_POST['subjkisw']) ? sanitize_input($_POST['subjkisw']) : '';
//         $subjscie = isset($_POST['subjscie']) ? sanitize_input($_POST['subjscie']) : '';
//         $subjsscre = isset($_POST['subjsscre']) ? sanitize_input($_POST['subjsscre']) : '';
//         $subjintscie = isset($_POST['subjintscie']) ? sanitize_input($_POST['subjintscie']) : '';
//         $subjpretech = isset($_POST['subjpretech']) ? sanitize_input($_POST['subjpretech']) : '';
//         $subjca = isset($_POST['subjca']) ? sanitize_input($_POST['subjca']) : '';
//         $subjagrinu = isset($_POST['subjagrinu']) ? sanitize_input($_POST['subjagrinu']) : '';
        
        
        
//         // Inserting data into the 'grades' table
//         $sql_insert = "INSERT INTO grades (username, name, stdgrade, stream, subjmath, subjeng, subjkisw, subjscie, subjsscre, subjintscie, subjpretech, subjca, subjagrinu)
//         VALUES ('$username', '$name', '$stdgrade', '$stream', '$subjmath', '$subjeng', '$subjkisw', '$subjscie', '$subjsscre', '$subjintscie', '$subjpretech', '$subjca', '$subjagrinu')";
        
//         $insert_stmt = $connect->prepare("INSERT INTO grades (username, subjmath, subjeng, subjkisw, subjscie, subjsscre, subjintscie, subjpretech, subjca, subjagrinu) 
//         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

//         if($insert_stmt) {
//             //Bind parameters and execute query
//             $insert_stmt = $connect->bind_param('ssssssssss', $username, $subjmath, $subjeng, $subjkisw, $subjscie, $subjsscre, $subjintscie, $subjpretech, $subjca, $subjagrinu);
//             $insert_stmt->execute();

//             if($insert_stmt->affected_rows > 0) {
//                 echo "<script>
//                             alert('Marks entered successfully!');
//                             window.location = 'examresult.php';
//                           </script>";
//             }else {
//                 echo "<script>
//                             alert('Kindly try again');
//                           </script>";
//             }
//         } else {
//             echo "<script>
//                         alert('Records do not match');
//                       </script>";
//         }
        

//         //Close the statement for insertion
//         $insert_stmt->close();
//     } else {
//         echo "No data found for this student ID.";
//     }


//     $connect->close();
// } else {
//     echo "Invalid request.";
// }
?>

<!--Revised code-->

<?php
// connect.php - Include your database connection code here if not already included

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['name']) && isset($_POST['stdgrade']) && isset($_POST['stream'])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $stdgrade = $_POST['stdgrade'];
    $stream = $_POST['stream'];


    // Establish database connection
    require("./connect.php");

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    $sql_fetch_student_data = "SELECT * FROM students WHERE username = ?";
    $stmt = $connect->prepare($sql_fetch_student_data);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result_student_data = $stmt->get_result();

    if ($result_student_data->num_rows > 0) {
        $row_student_data = $result_student_data->fetch_assoc();

        // Extracting fetched data
        $username = $row_student_data['username'];
        $name = $row_student_data['name'];
        $stdgrade = $row_student_data['stdgrade'];
        $stream = $row_student_data['stream'];

        // Other data from the form
        $subjmath = isset($_POST['subjmath']) ? sanitize_input($_POST['subjmath']) : '';
        $subjeng = isset($_POST['subjeng']) ? sanitize_input($_POST['subjeng']) : '';
        $subjkisw = isset($_POST['subjkisw']) ? sanitize_input($_POST['subjkisw']) : '';
        $subjscie = isset($_POST['subjscie']) ? sanitize_input($_POST['subjscie']) : '';
        $subjsscre = isset($_POST['subjsscre']) ? sanitize_input($_POST['subjsscre']) : '';
        $subjintscie = isset($_POST['subjintscie']) ? sanitize_input($_POST['subjintscie']) : '';
        $subjpretech = isset($_POST['subjpretech']) ? sanitize_input($_POST['subjpretech']) : '';
        $subjca = isset($_POST['subjca']) ? sanitize_input($_POST['subjca']) : '';
        $subjagrinu = isset($_POST['subjagrinu']) ? sanitize_input($_POST['subjagrinu']) : '';

        // Inserting data into the 'grades' table using prepared statement and binding parameters
        $sql_insert = "INSERT INTO grades (username, name, stdgrade, stream, subjmath, subjeng, subjkisw, subjscie, subjsscre, subjintscie, subjpretech, subjca, subjagrinu) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) WHERE username = 'username'";
        $stmt_insert = $connect->prepare($sql_insert);
        $stmt_insert->bind_param("ssssssssssss", $username, $name, $stdgrade, $stream, $subjmath, $subjeng, $subjkisw, $subjscie, $subjsscre, $subjintscie, $subjpretech, $subjca, $subjagrinu);

        if ($stmt_insert->execute()) {
            echo "Data inserted successfully!";
        } else {
            echo "Error: " . $stmt_insert->error;
        }
    } else {
        echo "No data found for this student ID.";
    }

    // Close statements and connection
    $stmt->close();
    $stmt_insert->close();
    $connect->close();
} else {
    echo "Invalid request.";
}
?>
