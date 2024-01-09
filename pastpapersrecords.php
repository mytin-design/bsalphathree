<?php
//List all registered users

require("./connect.php");

    // Establish database connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Prepare SQL statement with ORDER BY clause for 'name'
    $sql = "SELECT examname, dateuploaded, examtr, examtype, examgrade, examfile FROM exams ORDER BY dateuploaded ASC";
    $stmt = $connect->prepare($sql);

    if (!$stmt) {
        die("Error in SQL query: " . $connect->error);
    }

    // Execute the prepared statement
    $stmt->execute();
    
    // Get result set
    $result = $stmt->get_result();

    // Check for data and display in HTML table
    if ($result->num_rows > 0) {
        echo "<table id='examsDisp' class='examsrecords'>";
        echo "<tr><th>NO</th><th>Exam Title</th> <th>Date Uploaded</th> <th>Teacher</th> <th>Subject</th> <th>Grade</th> <th>File</th> <th>ACTIONS</th></tr>";
        
        $count = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$count."</td>";
        echo "<td>".$row['examname']."</td>";
        echo "<td>".$row['dateuploaded']."</td>";
        echo "<td>".$row['examtr']."</td>";
        echo "<td>".$row['examtype']."</td>";
        echo "<td>".$row['examgrade']."</td>";
        echo "<td>"."<a href='" .$row['examfile']. "'a>".$row['examfile']."</a>"."</td>";

        
        echo "<td id='editbtnbox'><button class='streceditbtn' onclick='editRow(\"".$row['examname']."\")'>Edit</button> <button class='streceditbtn' onclick='deleteRow(\"".$row['examname']."\")'>Delete</button></td>";
        echo "</tr>";
        $count++;
    }

        echo "</table>";
    } else {
        echo "There are currently no exam.";
    }

    // Close prepared statement and database connection
    $stmt->close();
    $connect->close();



?>

<script>
    function editRow(examname) {
        // Implement edit action using username (registration number)
        // Redirect to an edit page or perform AJAX to edit data
        alert("Editing exam with Title: " + examname);
    }

    function deleteRow(examname) {
        if (confirm("Are you sure you want to delete these exam with Title Name: " + examname + "?")) {
            // AJAX request to delete the row from the database
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // event.preventDefault();
                    alert("exam with Title Name: " + examname + " deleted successfully.");
                    // Refresh the page after successful deletion
                    location.reload(); // Reload the current page
                }
            };
            xhr.open("POST", "./deleteexam.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("examname=" + examname);
        }
    }

</script>
