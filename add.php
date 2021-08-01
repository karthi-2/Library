<!DOCTYPE html>
<html>
<head>
	<title>Add Books</title>
	<script src="https://kit.fontawesome.com/4c49a00644.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="add.css">
</head>
<body>
	<ul>
		<li class="library">&nbsp;<i class="fas fa-book-reader"></i>&nbsp; Softrate Library</li>
		<li class="contact"><a href="contact.php"><i class="fas fa-address-book"></i>&nbsp;Contact us </a></li>
		<li class="back"><a href="adminpage.php"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back </a></li>
		<li class="home"><a href="index.php"><i class="fas fa-power-off"></i>&nbsp;Logout </a></li>
	</ul>
	<div class="main">
	<div class="container">
		<div class="header">
			<h2>Add Books</h2>
		</div>
		<br>
		<form action="add.php" method="post">
			<div>
				<label for="Bookid">Book Id : </label>
				<input type="text" name="id" required="" placeholder="Enter Book Id">
			</div>
			<br>

			<div>
				<label for="bname">Book Name : </label>
				<input type="text" name="name" required="" placeholder="Enter Book Name">
			</div>
			<br>

			<div>
				<label for="author">Author : </label>
				<input type="author" name="author" required="" placeholder="Enter Author Name">
			</div>
			<br>

			<button type="submit" name="submit"> Submit </button>
			<br>
		</form>
	</div>
</div>
</body>
</html>
<?php 
$connection=mysqli_connect("localhost","id17336297_karthi","Karthikarthi123$","id17336297_library") or die("no connected");
mysqli_select_db($connection,"id17336297_library") or die("no database");
if(isset($_POST['submit']))
{
	$bookid=$_POST['id'];
	$name=$_POST['name'];
	$author=$_POST['author'];
	$status="Available";
	$new_book="INSERT INTO admin_viewbooks (id,name,author,status) VALUES ('$bookid','$name','$author','$status')";
	$query=mysqli_query($connection,$new_book);
	if($query){
		echo '<script>alert("Successfully Added")</script>';
		//header("Refresh:0;url=add.php");
	}
}
?>
