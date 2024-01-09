<?php
//List all registered users

require("./connect.php");

    // Establish database connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Prepare SQL statement with ORDER BY clause for 'name'
    $sql = "SELECT assignname, dateuploaded, assigntr, assigntype, assigngrade, assignduedate, assigninstructs, assignfile FROM assignments ORDER BY dateuploaded ASC";
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
        echo "<table id='assignDisp' class='aassignrecords'>";
        echo "<tr><th>NO</th><th>Assignment Title</th> <th>Date Uploaded</th> <th>Teacher</th> <th>Subject</th> <th>Grade</th> <th>Due Date</th> <th>Instructions</th> <th>File</th> <th>ACTIONS</th></tr>";
        
        $count = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr style='padding: .5pc;'>";
        echo "<td>".$count."</td>";
        echo "<td>".$row['assignname']."</td>";
        echo "<td>".$row['dateuploaded']."</td>";
        echo "<td>".$row['assigntr']."</td>";
        echo "<td>".$row['assigntype']."</td>";
        echo "<td>".$row['assigngrade']."</td>";
        echo "<td>".$row['assignduedate']."</td>";
        echo "<td>".$row['assigninstructs']."</td>";
        echo "<td>"."<a href='" .$row['assignfile']. "'a>".$row['assignfile']."</a>"."</td>";
        
        echo "<td id='editbtnbox'><button class='streceditbtn' onclick='editRow(\"".$row['assignname']."\")'>Edit</button> <button class='streceditbtn' onclick='deleteRow(\"".$row['assignname']."\")'>Delete</button></td>";
        echo "</tr>";
        $count++;
    }

        echo "</table>";
    } else {
        echo "There are currently no Assignments.";
    }

    // Close prepared statement and database connection
    $stmt->close();
    $connect->close();



?>

<script>
    function editRow(assignname) {
        // Implement edit action using username (registration number)
        // Redirect to an edit page or perform AJAX to edit data
        alert("Editing Assignment with Title: " + assignname);
    }

    function deleteRow(assignname) {
        if (confirm("Are you sure you want to delete these Assignment with Title Name: " + assignname + "?")) {
            // AJAX request to delete the row from the database
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // event.preventDefault();
                    alert("Assignment with Title Name: " + assignname + " deleted successfully.");
                    // Refresh the page after successful deletion
                    location.reload(); // Reload the current page
                }
            };
            xhr.open("POST", "./deleteAssignments.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("assignname=" + assignname);
        }
    }

</script>
