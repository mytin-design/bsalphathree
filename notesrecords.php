<?php
//List all registered users

require("./connect.php");

    // Establish database connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Prepare SQL statement with ORDER BY clause for 'name'
    $sql = "SELECT notesname, dateuploaded, notestr, notestype, notesgrade, notesfile FROM notes ORDER BY dateuploaded ASC";
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
        echo "<table id='annsDisp' class='annsrecords'>";
        echo "<tr><th>NO</th><th>Notes Title</th> <th>Date Uploaded</th> <th>Teacher</th> <th>Subject</th> <th>Grade</th> <th>File</th> <th>ACTIONS</th></tr>";
        
        $count = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$count."</td>";
        echo "<td>".$row['notesname']."</td>";
        echo "<td>".$row['dateuploaded']."</td>";
        echo "<td>".$row['notestr']."</td>";
        echo "<td>".$row['notestype']."</td>";
        echo "<td>".$row['notesgrade']."</td>";
        echo "<td>"."<a href='" .$row['notesfile']. "'a>".$row['notesfile']."</a>"."</td>";

        
        echo "<td id='editbtnbox'><button class='streceditbtn' onclick='editRow(\"".$row['notesname']."\")'>Edit</button> <button class='streceditbtn' onclick='deleteRow(\"".$row['notesname']."\")'>Delete</button></td>";
        echo "</tr>";
        $count++;
    }

        echo "</table>";
    } else {
        echo "There are currently no Notes.";
    }

    // Close prepared statement and database connection
    $stmt->close();
    $connect->close();



?>

<script>
    function editRow(notesname) {
        // Implement edit action using username (registration number)
        // Redirect to an edit page or perform AJAX to edit data
        alert("Editing notes with Title: " + notesname);
    }

    function deleteRow(notesname) {
        if (confirm("Are you sure you want to delete these notes with Title Name: " + notesname + "?")) {
            // AJAX request to delete the row from the database
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // event.preventDefault();
                    alert("Notes with Title Name: " + notesname + " deleted successfully.");
                    // Refresh the page after successful deletion
                    location.reload(); // Reload the current page
                }
            };
            xhr.open("POST", "./deleteNotes.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("notesname=" + notesname);
        }
    }

</script>




<!--========================================-->

