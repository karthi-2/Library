<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Collections</title>
	<script src="https://kit.fontawesome.com/4c49a00644.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="viewuserbooks.css">

</head>
<body>
	<ul>
		<li class="library">&nbsp;<i class="fas fa-book-reader"></i>&nbsp; Softrate Library</li>
		<li class="contact"><a href="contact.php"><i class="fas fa-address-book"></i>&nbsp;Contact us </a></li>
		<li class="back"><a href="userpage.php"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back </a></li>
		<li class="home"><a href="index.php"><i class="fas fa-power-off"></i>&nbsp;Logout </a></li>
	</ul>
	<br><br>
	<h1>My Collections</h1>
	<div class="table">
	<table>
		<tr>
			<th><b>S.No</b></th>
			<th><b>Book Id</b></th>
			<th><b>Book Name</b></th>
			<th><b>Author</b></th>
			<th><b>Due Date</b></th>
			<th><b>Return</b></th>
		</tr>
		<?php
		$connection=mysqli_connect("localhost","id17336297_karthi","Karthikarthi123$","id17336297_library") or die("no connected");
		mysqli_select_db($connection,"id17336297_library") or die("no database");
		session_start();
		$clue=$_SESSION['email'];
		if($connection-> connect_error){
			die("connection failed:". $connection-> connect_error);
		}
		$sql = "SELECT id,name,author,duedate from mycollections WHERE email='$clue'";
		$result= $connection-> query($sql);
		$i=1;
		$f=0;
		if($result-> num_rows > 0){
			while($row = $result-> fetch_assoc()){
				?>
				<tr>
					<td><b><?php echo $i; ?> </b></td>
					<td><b><?php echo $row['id']; ?> </b></td>
					<td><b><?php echo $row['name']; ?> </b></td>
					<td><b><?php echo $row['author']; ?> </b></td>
					<td><b><?php echo $row['duedate']; ?> </b></td>
					<td><b><a class="transaction" href="mycollection.php?name=<?php echo $row['name'] ?>"> Return </a></b></td>
				</tr>
			<?php
			$i++;
			}
			echo "</table>";
		}
		else{
			$f=1;
		}
		if(isset($_GET['name'])){
			$name=$_GET['name'];
			$sql = "SELECT id,name,author from mycollections WHERE email='$clue'";
			$result= $connection-> query($sql);
			$row = $result-> fetch_assoc();
			$id=$row['id'];
			$name1=$row['name'];
			$author=$row['author'];
			$status="Available";
			$b="INSERT INTO admin_viewbooks(id,name,author,status) VALUES ('$id','$name1','$author','$status')";
			$query=mysqli_query($connection,$b);
			$del="DELETE FROM mycollections WHERE email='$clue'";
			$query=mysqli_query($connection,$del);
			if($query){
				echo '<script>alert("Successfully Returned")</script>';
				header("Refresh:0;url=mycollection.php");

			}
		}
		?>
	</table>
	<br><br>
	<?php 
	if($f==1){
		echo "No Borrowed Books";
	}
	?>
</div>
</body>
</html>