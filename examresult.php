<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['stdgrade']) && isset($_POST['stream'])) {
    $stdgrade = filter_input(INPUT_POST, 'stdgrade', FILTER_SANITIZE_STRING);
    $stream = filter_input(INPUT_POST, 'stream', FILTER_SANITIZE_STRING);

    require("./connect.php");

    // Establish database connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Prepare SQL statement with parameters for 'stdgrade' and 'stream'
    $sql = "SELECT * FROM students WHERE stdgrade = ? AND stream = ?";
    $stmt = $connect->prepare($sql);

    if (!$stmt) {
        die("Error in SQL query: " . $connect->error);
    }

    // Bind parameters and execute the prepared statement
    $stmt->bind_param("ss", $stdgrade, $stream);
    $stmt->execute();

    // Get result set
    $result = $stmt->get_result();

    // Check for data and display in HTML table
    if ($result->num_rows > 0) {
        // Display table headers
        echo "<table id='annsDisp' class='annsrecords'>";
        echo "<tr><th>NO</th><th>Assess. No</th> <th>Full Name</th> <th>Grade</th> <th>Stream</th> <th>Maths</th> <th>Eng</th> <th>Kisw</th> <th>Scie & Tech</th> <th>S/S-C.R.E</th> <th>Integrated Scie</th> <th>Pre-Technical</th> <th>Creative Arts</th> <th>Agri/Nutri.</th> <th>ACTIONS</th></tr>";

        $count = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            // Display student information

            echo "<td>".$count."</td>";
        echo "<td>".$row['username']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['stdgrade']."</td>";
        echo "<td>".$row['stream']."</td>";
        echo "<td>"."<input type='text' class='sflex' id='subjmath' name='subjmath'/>"."</td>";
        echo "<td>"."<input type='text' class='sflex' id='subjeng' name='subjeng'/>"."</td>";
        echo "<td>"."<input type='text' class='sflex' id='subjkisw' name='subjkisw'/>"."</td>";
        echo "<td>"."<input type='text' class='sflex' id='subjscie' name='subjscie'/>"."</td>";
        echo "<td>"."<input type='text' class='sflex' id='subjsscre' name='subjsscre'/>"."</td>";
        echo "<td>"."<input type='text' class='sflex' id='subjintscie' name='subjintscie'/>"."</td>";
        echo "<td>"."<input type='text' class='sflex' id='subjpretech' name='subjpretech'/>"."</td>";
        echo "<td>"."<input type='text' class='sflex' id='subjca' name='subjca'/>"."</td>";
        echo "<td>"."<input type='text' class='sflex' id='subjagrinu' name='subjagrinu'/>"."</td>";

        echo "<td id='editbtnbox'><button class='streceditbtn' onclick='editRow(\"".$row['username']."\")'>Edit</button> <button class='streceditbtn' onclick='saveRow( \"".$row['username']."\",\"".$row['name']."\",\"".$row['stdgrade']."\",\"".$row['stream']."\")'>Save</button></td>";

            echo "</tr>";
            $count++;
        }

        echo "</table>";
        
    } else {
        echo "There are currently no Registered students in this class / stream.";
    }

    // Close prepared statement and database connection
    $stmt->close();
    $connect->close();


} else {
    echo "Invalid request.";
}
?>


<script>
    function editRow(username, name, stdgrade, stream) {
        // Implement edit action using username (registration number)
        // Redirect to an edit page or perform AJAX to edit data
        alert("Editing notes with Title: " + username);
    }

    function saveRow(username, name, stdgrade, stream) {
        // Functionality to save data instead of deleting
        // Perform AJAX request or other logic to save the data
        // Example: You can send the updated data to a PHP script to handle the saving process
        
        // Example AJAX request (you might need to modify this based on your requirements)
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                alert("Student with username: " + username + " data saved successfully.");
                // Perform additional actions upon successful save, if needed
                //window.location.href = './savemarks.php';
            }
        };
        xhr.open("POST", "./savemarks.php", true); // Change the URL to your save data endpoint
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("username=" + username + "&name=" + name + "&stdgrade=" + stdgrade + "&stream=" + stream + "&subjmath=" + document.getElementById('subjmath').value + "&subjeng=" + document.getElementById('subjeng').value + '&subjkisw=' + document.getElementById('subjkisw').value + '&subjscie=' + document.getElementById('subjscie').value + '&subjsscre=' + document.getElementById('subjsscre').value + '&subjintscie=' + document.getElementById('subjintscie').value + '&subjpretech=' + document.getElementById('subjpretech').value + '&subjca=' + document.getElementById('subjca').value + '&subjagrinu=' + document.getElementById('subjagrinu').value);
    }

</script>
