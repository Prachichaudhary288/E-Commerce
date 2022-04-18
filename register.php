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
	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$student_id=$_POST['student_id'];
	$email=$_POST['email'];
	$branch=$_POST['branch'];
	$campus=$_POST['campus'];
	$password=$_POST['password'];
	$year=$_POST['year'];

	$sql_query="INSERT INTO stundent (name,gender,student_id,email,branch,campus,password,year) VALUES ('$name','$gender','$student_id','$email','$branch','$campus','$password','$year')";

	if(mysqli_query($conn, $sql_query))
	{
		echo '<script>alert("Registered Successfully !!")</script>';
		
		
	}
	else
	{
		echo '<script>alert("!! ERROR !!")</script>'.$sql."".mysqli_error($conn);
	}
	mysqli_close($conn);
}
?>