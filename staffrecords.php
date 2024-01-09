<?php

//List all registered users

require("./connect.php");

    // Establish database connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Prepare SQL statement with ORDER BY clause for 'name'
    $sql = "SELECT staffid, name, dateofbirth, role,basicpay, profileimg,department, subjects, email, phone, nextofkin, remedialallocation, maritalstatus, yearofemployment, status, gender, nhifno, nssfno,tscno,bankname,bankaccno, nationality FROM staff ORDER BY name ASC";
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
        echo "<table id='stafRecords' class='staffrecordtabs'>";
        echo "<tr><th>NO</th><th>STAFF ID</th> <th>NAME</th> <th>DATE OF BIRTH</th> <th>STAFF ROLE</th> <th>BASIC PAY</th> <th>PROFILE IMG</th> <th>DEPARTMENT</th> <th>SUBJECTS</th> <th>EMAIL</th> <th>PHONE</th> <th>NEXT OF KIN</th> <th>REMEDIAL</th> <th>MARITAL STATUS</th> <th>YEAR OF EMPLOYMENT</th> <th>ACTIVE STATUS</th> <th>GENDER</th> <th>NHIF NO</th> <th>NSSF NO</th> <th>TSC NO</th> <th>BANK NAME</th> <th>BANK ACC NO</th> <th>NATIONALITY</th> <th>ACTIONS</th></tr>";
        
        $count = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$count."</td>";
        echo "<td>".$row['staffid']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['dateofbirth']."</td>";
        echo "<td>".$row['role']."</td>";
        echo "<td>".$row['basicpay']."</td>";
        echo "<td>".$row['profileimg']."</td>";
        echo "<td>".$row['department']."</td>";
        echo "<td>".$row['subjects']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['phone']."</td>";
        echo "<td>".$row['nextofkin']."</td>";
        echo "<td>".$row['remedialallocation']."</td>";
        echo "<td>".$row['maritalstatus']."</td>";
        echo "<td>".$row['yearofemployment']."</td>";
        echo "<td>".$row['status']."</td>";
        echo "<td>".$row['gender']."</td>";
        echo "<td>".$row['nhifno']."</td>";
        echo "<td>".$row['nssfno']."</td>";
        echo "<td>".$row['tscno']."</td>";
        echo "<td>".$row['bankname']."</td>";
        echo "<td>".$row['bankaccno']."</td>";
        echo "<td>".$row['nationality']."</td>";



        echo "<td id='editbtnbox'><button class='streceditbtn' onclick='editRow(\"".$row['staffid']."\")'>Edit</button> <button class='streceditbtn' onclick='deleteRow(\"".$row['staffid']."\")'>Delete</button></td>";
        echo "</tr>";
        $count++;
    }

        echo "</table>";
    } else {
        echo "No results found.";
    }

    // Close prepared statement and database connection
    $stmt->close();
    $connect->close();



?>



<script>
    function editRow(staffid) {
        // Implement edit action using username (registration number)
        // Redirect to an edit page or perform AJAX to edit data
        alert("Editing user with Staff Id: " + staffid);
    }

    function deleteRow(staffid) {
        if (confirm("Are you sure you want to delete this user with Staff Id: " + staffid + "?")) {
            // AJAX request to delete the row from the database
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // event.preventDefault();
                    alert("User with Staff Id: " + staffid + " deleted successfully.");
                    // Refresh the page after successful deletion
                    location.reload(); // Reload the current page
                }
            };
            xhr.open("POST", "./delete_student.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("staffid=" + staffid);
        }
    }
</script>
