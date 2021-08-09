<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Members</title>
	<script src="https://kit.fontawesome.com/4c49a00644.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="members.css">

</head>
<body>
	<ul>
		<li class="library">&nbsp;<i class="fas fa-book-reader"></i>&nbsp; Softrate Library</li>
		<li class="contact"><a href="contact.php"><i class="fas fa-address-book"></i>&nbsp;Contact us </a></li>
		<li class="back"><a href="adminpage.php"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back </a></li>
		<li class="home"><a href="home.php"><i class="fas fa-power-off"></i>&nbsp;Logout </a></li>
	</ul>
	<div class="table">
	<table>
		<tr>
			<th><b>S.No</b></th>
			<th><b>Name</b></th>
			<th><b>Email Id</b></th>
			<th><b>Phone No</b></th>
			<th><b>Remove</b></th>
		</tr>
		<?php
		$connection=mysqli_connect("remotemysql.com","SD3e56MviP","d2ti4lGteY","SD3e56MviP") or die("no connected");
		mysqli_select_db($connection,"SD3e56MviP") or die("no database");
		if($connection-> connect_error){
			die("connection failed:". $connection-> connect_error);
		}
		$sql = "SELECT Name,email,pno from user_details";
		$result= $connection-> query($sql);
		$i=1;
		if($result-> num_rows > 0){
			while($row = $result-> fetch_assoc()){
				?>
				<tr>
					<td><b><?php echo $i; ?> </b></td>
					<td><b><?php echo $row['Name']; ?> </b></td>
					<td><b><?php echo $row['email']; ?> </b></td>
					<td><b><?php echo $row['pno']; ?> </b></td>
					<td><b><a class="transaction" href="members.php?email=<?php echo $row['email'] ?>">Remove</a></b></td>
				</tr>
			<?php
			$i++;
			}
			echo "</table>";
		}
		else{
			echo "0 result";
		}
		if(isset($_GET['email'])){
			$name=$_GET['email'];
			$del="DELETE FROM user WHERE email='$name'";
			$query=mysqli_query($connection,$del);
			$del="DELETE FROM user_details WHERE email='$name'";
			$query=mysqli_query($connection,$del);
			if($query){
				echo '<script>alert("Successfully Removed")</script>';
				header("Refresh:0;url=members.php");

			}
		}
		?>
	</table>
</div>

</body>
</html>
