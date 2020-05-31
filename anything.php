
<?php
$link = mysqli_connect("localhost", "root", "", "phone2");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM contacts";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table  width='600' cellspacing='0' cellpadding='0' border-spacing='0' border='2'>";
            echo "<tr>";
                echo "<th>First Name</th>";
                echo "<th>last name</th>";
                echo "<th>contact number</th>";
                echo "<th>email</th>";
                echo "<th>dob</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";

                echo "<td>" . $row['First_Name'] . "</td>";
                echo "<td>" . $row['Last_Name'] . "</td>";
                echo "<td>" . $row['Contact_Number'] . "</td>";
                echo "<td>" . $row['Email_ID'] . "</td>";
                echo "<td>" . $row['DOB'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>