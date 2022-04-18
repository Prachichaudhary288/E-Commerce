<?php
$Item=$_GET['item'];


$conn= new mysqli("localhost","root","","united_");
if($conn->connect_error)
{
	die("Failed to connect : ".$conn->connect_error);
}
else
{
	$stmt=$conn->prepare("select * from sell where Item=?");
	$stmt->bind_param("s",$Item);
	$stmt->execute();
	$stmt_result=$stmt->get_result();
	if($stmt_result->num_rows > 0)
	{
		while($data=$stmt_result->fetch_assoc()){
		echo "<h3>*Item: " . $data["Item"]. " <br>Price: " . $data["Price"]. "<br> Name:" . $data["Name"]. " <br>Year:".$data["Year"]." <br>Contact:".$data["Contact"]."<br>";
		}
     }
    else
    {
    	echo"<h2>Item not found</h2>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style>
		body{
    background-image: linear-gradient(to bottom, #66e0ff, #80aaff)
}
	</style>
</head>
<body>

</body>
</html>