<?php
// //List all registered users

// require("./connect.php");

//     // Establish database connection
//     if ($connect->connect_error) {
//         die("Connection failed: " . $connect->connect_error);
//     }

//     // Prepare SQL statement with ORDER BY clause for 'name'
//     $sql = "SELECT annsname, dateuploaded, annsauthor, annstype, annsgrade, annsdetails FROM announcements ORDER BY dateuploaded ASC";
//     $stmt = $connect->prepare($sql);

//     if (!$stmt) {
//         die("Error in SQL query: " . $connect->error);
//     }

//     // Execute the prepared statement
//     $stmt->execute();
    
//     // Get result set
//     $result = $stmt->get_result();

//     // Check for data and display in HTML table
//     if ($result->num_rows > 0) {
//         echo "<table id='annsDisp' class='annsrecords'>";
//         echo "<tr><th>NO</th><th>ANNOUNCEMENT TITLE</th> <th>DATE UPLOADED</th> <th>AUTHOR</th> <th>ANNOUNCEMENT FOR:</th> <th>ANNOUNCEMENT FOR GRADE</th> <th>ANNOUNCEMENT DETAILS</th> <th>ACTIONS</th></tr>";
        
//         $count = 1;
//     while ($row = $result->fetch_assoc()) {
//         echo "<tr>";
//         echo "<td>".$count."</td>";
//         echo "<td>".$row['annsname']."</td>";
//         echo "<td>".$row['dateuploaded']."</td>";
//         echo "<td>".$row['annsauthor']."</td>";
//         echo "<td>".$row['annstype']."</td>";
//         echo "<td>".$row['annsgrade']."</td>";
//         echo "<td>".$row['annsdetails']."</td>";
        
//         echo "<td id='editbtnbox'><button class='streceditbtn' onclick='editRow(\"".$row['annsname']."\")'>Edit</button> <button class='streceditbtn' onclick='deleteRow(\"".$row['annsname']."\")'>Delete</button></td>";
//         echo "</tr>";
//         $count++;
//     }

//         echo "</table>";
//     } else {
//         echo "There are currently no Announcements.";
//     }

//     // Close prepared statement and database connection
//     $stmt->close();
//     $connect->close();



?>


<!--========================USING DIVS INSTEAD OF TABLE=======================================-->

<?php

//List all registered users

require("./connect.php");

    // Establish database connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Prepare SQL statement with ORDER BY clause for 'name'
    $sql = "SELECT annsname, dateuploaded, annsauthor, annstype, annsgrade, annsdetails FROM announcements ORDER BY dateuploaded ASC";
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
        echo "<div id='annsDisp' class='annsrecords'>";
        
        $count = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<span style='font-weight: bold;'>Ann. no.:</span>"."<span style='color:#333;'>".$count."</span>";
        echo "<br/>";
        echo "<p style='font-weight: bold;'>Announcement Title:</p>"."<p style='color:#333;'>".$row['annsname']."</p>";
        echo "<br/>";
        echo "<p style='font-weight: bold;'>Date Uploaded:</p>"."<p style='color:#333;'>".$row['dateuploaded']."</p>";
        echo "<br/>";
        echo "<p style='font-weight: bold;'>Author:</p>"."<p style='color:#333;'>".$row['annsauthor']."</p>";
        echo "<br/>";
        echo "<p style='font-weight: bold;'>Announcement For:</p>"."<p style='color:#333;'>".$row['annstype']."</p>";
        echo "<br/>"."<br/>";
        echo "<p style='font-weight: bold;'>Announcement For Grade:</p>"."<p style='color:#333;'>".$row['annsgrade']."</p>";
        echo "<br/>"."<br/>";
        echo "<p style='font-weight: bold;'>Announcement:</p>"."<p style='color:#333;'>".$row['annsdetails']."</p>";
        echo "<br/>";
        echo "<hr class='stuHr'/>";
        echo "<br/>";
        echo "<div style='font-weight: bold;'>ACTIONS</div>";
        
        echo "<div id='editbtnbox'><button class='streceditbtn' onclick='editRow(\"".$row['annsname']."\")'>Edit</button> <button class='streceditbtn' onclick='deleteRow(\"".$row['annsname']."\")'>Delete</button></div>";
        echo "</div>";
        echo "<br/>"."<br/>";

        echo "<hr/>";

        $count++;
    }

        echo "</div>";
    } else {
        echo "There are currently no Announcements.";
    }

    // Close prepared statement and database connection
    $stmt->close();
    $connect->close();



?>



<script>
    function editRow(annsname) {
        // Implement edit action using username (registration number)
        // Redirect to an edit page or perform AJAX to edit data
        alert("Editing announcement with Title: " + annsname);
    }

    function deleteRow(annsname) {
        if (confirm("Are you sure you want to delete this Announcement with Title Name: " + annsname + "?")) {
            // AJAX request to delete the row from the database
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // event.preventDefault();
                    alert("Announcement with Title Name: " + annsname + " deleted successfully.");
                    // Refresh the page after successful deletion
                    location.reload(); // Reload the current page
                }
            };
            xhr.open("POST", "./deleteAnns.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("annsname=" + annsname);
        }
    }

</script>
