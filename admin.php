<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<script src="https://kit.fontawesome.com/4c49a00644.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="admin.css">
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
			<h2>Admin Log In</h2>
		</div>
		<br>
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
		</form>
	</div>
</div>
</body>
</html>
<?php 
$connection=mysqli_connect("localhost","id17336297_karthi","Karthikarthi123$","id17336297_library") or die("no connected");
mysqli_select_db($connection,"id17336297_library") or die("no database");
if(isset($_POST['login']))
{
$name=$_POST['email'];
$password=$_POST['pwd'];
$sql = "SELECT email,password from admin";
$i=0;
$result= $connection-> query($sql);
	if($result-> num_rows > 0){
		while($row = $result-> fetch_assoc()){
			if($row['email']==$name and $row['password']==$password){
				header("Refresh:0;url=adminpage.php");
				$i=1;
			}
		}
		if($i==0){
			echo '<script>alert("Invalid details")</script>';
		}
	}
}
?>
