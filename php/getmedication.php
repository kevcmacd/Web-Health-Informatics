<?php
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "care_activity_mgr";
	
	$id = $_GET['id'];
   
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
   
   $sql = 'SELECT * from medication WHERE patient_id=' . $id;
   
   $result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div id=\"" 
		. $row["id"]. "\" style=\"background-color:white;width:97%;text-align:left;border:2px solid black;\"><img src=\"images/medication.png\"style=\"width:30px;height:30px;\"><br>"
		. $row["adate"]. "<br><b>MEDICATION:</b> " 
		. $row["description"]. " <br><b>STARTS AT:</b> " 
		. $row["start_time"]. " <br></b>ENDS AT:</b> " 
		. $row["end_time"]. " <br><b>SPECIAL CARE:</b> " 
		. $row["special_care"]. " <br><b>INSTRUCTIONS:</b> " 
		. $row["instructions"]. "<br><input type=\"checkbox\">Mark as done</div><br>";
    }
	} else {
		echo "0 medication routines";
	}
   $conn->close();
?>