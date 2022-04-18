<?php
$email=$_POST['email'];
$password=$_POST['psw'];


$conn= new mysqli("localhost","root","","united_");
if($conn->connect_error)
{
	die("Failed to connect : ".$conn->connect_error);
}
else
{
	$stmt=$conn->prepare("select * from stundent where email=?");
	$stmt->bind_param("s",$email);
	$stmt->execute();
	$stmt_result=$stmt->get_result();
	if($stmt_result->num_rows > 0)
	{
		$data=$stmt_result->fetch_assoc();
    if ($data['password']===$password)
      {
        echo "<h1>WELCOME TO DASHBOARD</h1>";
        echo "<!DOCTYPE html>
        <html>
        <head>
        <title></title>
        <style>
          body{
          height: 656px;
          background-image: linear-gradient(to bottom, #DDD,#09606a);
          background-repeat: no-repeat;
          }
          button{
          margin-left:1170px
          }
          button{
          width: 8%
          }
          button:hover{
            color : red;
          }
          button:hover{
            background: var(--main-bg-color)
          }
          h1{
            color :#09606a;
            margin-left: 500px;
            margin-top: 50px;
            font-size: 40px;
          }
          h2{
            color: #001014;
            margin-left: 300px;
            margin-top: -390px;
            font-size: 30px;
          }
          h3{
            color: 004152;
            margin-left: 300px;
            margin-top: 70px;
            font-size: 25px;
          }
          form{
            margin-left:-40px;
            margin-top: 60px;
            width: 120%;
          }
        </style>
        </head>
        <body >
          <br>
          <form method=POST action=buy.html>
          <button href=buy.html>BUY</button>
          </form>
          <form method=POST action=sell.html>
          <button href=sell.html>SELL</button>
          </form>
          <form method=POST action=notes.html>
          <button href=notes.html>NOTES</button>
          </form>
          <form method=POST action=files.html>
          <button href=files.html>FILES</button>
          </form>
          <form method=POST action=index.html>
          <button href=index.html>LOGOUT</button>
          </form>
          <br>
          <br>
          <h2>USER INFORMATION</h2>
        </body>
        </html>";
        echo "<h3>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: " . $data["name"]. " <br>Student ID&nbsp;&nbsp;&nbsp;&nbsp;: " . $data["student_id"]. "<br> Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:" . $data["email"]. " <br>Branch &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:".$data["branch"]." <br>Campus&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:".$data["campus"]."<br>";
      }
      else
      {
      echo'<script>alert("Invalid Username/Password !!")</script>';
      }
  }
  else
	{
		echo '<script>alert("Invalid Username/Password !!")</script>';
	}
}
?>