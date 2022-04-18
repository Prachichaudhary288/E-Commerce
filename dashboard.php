<?php
$servername = "localhost";
$username = "username";
$password = "";
$dbname = "united_";

// Create connection
$conn =mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else
{
  echo "Connection was successful";
}

$sql = "SELECT name, student_id, email, branch, campus FROM stundent";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Name: " . $row["name"]. " Student ID: " . $row["student_id"]. "Email" . $row["email"]. "Branch".$row["branch"]."Campus".$row["campus"]."<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>