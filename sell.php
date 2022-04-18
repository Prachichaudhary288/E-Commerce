<?php

$servername="localhost";
$username="root";
$password="";
$database_name="united_";

$conn=mysqli_connect($servername,$username,$password,$database_name);
if(!$conn)
{
	die("Coonection Failed:".mysqli_connect_error());
}

if(isset($_POST['save']))
{
	$item=$_POST['item'];
	$price=$_POST['price'];
	$name=$_POST['name'];
	$year=$_POST['year'];
	$contact=$_POST['contact'];   
	$sql_query="INSERT INTO sell (Item,Price,Name,Year,Contact) VALUES ('$item','$price','$name','$year','$contact')";

	if(mysqli_query($conn, $sql_query))
	{
		echo '<script>alert("Item added successfully !!")</script>';
		
		
	}
	else
	{
		echo '<script>alert("!! ERROR !!")</script>'.$sql."".mysqli_error($conn);
	}
	mysqli_close($conn);
}
?>