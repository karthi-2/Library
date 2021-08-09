<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<script src="https://kit.fontawesome.com/4c49a00644.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
	<ul>
		<li class="library">&nbsp;<i class="fas fa-book-reader"></i>&nbsp; Softrate Library</li>
		<li class="contact"><a href="contact.php" class="la"><i class="fas fa-address-book"></i>&nbsp;Contact us </a></li>
		<li class="back"><a href="user.php" class="la"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back </a></li>
		<li class="home"><a href="index.php" class="la"><i class="fas fa-power-off"></i>&nbsp;Logout </a></li>
	</ul>
	<div class="main">
	<div class="container">
		<div class="header">
			<h2>Register</h2>
		</div>
		<br>
		<form action="register.php" method="post">
			<div>
				<label for="username">Username : </label>
				<input type="text" name="username" required="" placeholder="Enter Your Name">
			</div>
			<br>

			<div>
				<label for="email">Email : </label>
				<input type="email" name="email" required="" placeholder="Enter Your Email Id">
			</div>
			<br>

			<div>
				<label for="password">Password : </label>
				<input type="password" name="pwd" required="" placeholder="Enter Password">
			</div>
			<br>

			<div>
				<label for="confirmpassword">Confirm Password : </label>
				<input type="password" name="cpwd" required="" placeholder="Re-Enter Password">
			</div>
			<br>

			<div>
				<label for="pin">Phone No : </label>
				<input type="number" name="pno" required="" placeholder="Enter Your Phone Number">
			</div>
			<br>

			<button type="submit" name="submit"> Submit </button>
			<p>Already a user?<a href="user.php" class="re"><b>log in</b></a></p>
		</form>
	</div>
</div>
</body>
</html>
<?php 
$connection=mysqli_connect("remotemysql.com","SD3e56MviP","d2ti4lGteY","SD3e56MviP") or die("no connected");
mysqli_select_db($connection,"SD3e56MviP") or die("no database");
if(isset($_POST['submit']))
{
$name=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['pwd'];
$repassword=$_POST['cpwd'];
$phone=$_POST['pno'];
if($password!=$repassword){
	echo '<script>alert("Incorrect Password")</script>';
	exit();
}
$sql = "SELECT email from user";
$result= $connection-> query($sql);
	if($result-> num_rows > 0){
		while($row = $result-> fetch_assoc()){
			if($row['email']==$email){
				echo '<script>alert("Account Already Exist")';
				exit();
			}
		}
	}
$details="INSERT INTO user_details (Name,email,password,pno) VALUES ('$name','$email','$password','$phone')";
$query=mysqli_query($connection,$details);
$table="INSERT INTO user (email,password) VALUES ('$email','$password')";
$query=mysqli_query($connection,$table);
header("Refresh:0;url=user.php");
}
?>
