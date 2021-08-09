<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<script src="https://kit.fontawesome.com/4c49a00644.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="user.css">
</head>
<body>
	<ul>
		<li class="library">&nbsp;<i class="fas fa-book-reader"></i>&nbsp; Softrate Library</li>
		<li class="contact"><a href="contact.php" class="la"><i class="fas fa-address-book"></i>&nbsp;Contact us </a></li>
		<li class="back"><a href="home.php" class="la"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back </a></li>
		<li class="home"><a href="index.php" class="la"><i class="fas fa-power-off"></i>&nbsp;Logout </a></li>
	</ul>
	<div class="main">
	<div class="container">
		<div class="header">
			<h2> User Log In</h2>
		</div>
		<form action="" method="post">
			<div>
				<label for="username">Email Id : </label>
				<input type="text" name="email" required="" placeholder="Enter Email Id">
			</div>
			<br>

			<div>
				<label for="password">Password : </label>
				<input type="password" name="pwd" required="" placeholder="Enter Password">
			</div>
			<br>

			<button type="submit" name="login"> Submit </button>
			<p>new user?<a href="register.php" style="color: red;" class="re"><b>Register Here</b></a></p>
		</form>
	</div>
</div>
</body>
</html>
<?php 
$connection=mysqli_connect("remotemysql.com","SD3e56MviP","d2ti4lGtey","SD3e56MviP") or die("no connected");
mysqli_select_db($connection,"SD3e56MviP") or die("no database");
if(isset($_POST['login']))
{
	session_start();
	$_SESSION['email']=$_POST['email'];
$name=$_POST['email'];
$password=$_POST['pwd'];
$sql = "SELECT email,password from user";
$i=0;
$result= $connection-> query($sql);
	if($result-> num_rows > 0){
		while($row = $result-> fetch_assoc()){
			if($row['email']==$name and $row['password']==$password){
				header("Refresh:0;url=userpage.php");
				$i=1;
			}
		}
		if($i==0){
			echo '<script>alert("Invalid details")</script>';
		}
	}
} 
?>
