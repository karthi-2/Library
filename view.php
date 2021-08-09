<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Members</title>
	<script src="https://kit.fontawesome.com/4c49a00644.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="view.css">

</head>
<body style="background-color: lightblue;">
	<ul>
		<li class="library">&nbsp;<i class="fas fa-book-reader"></i>&nbsp; Softrate Library</li>
		<li class="contact"><a href="contact.php"><i class="fas fa-address-book"></i>&nbsp;Contact us </a></li>
		<li class="back"><a href="adminpage.php"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back </a></li>
		<li class="home"><a href="home.php"><i class="fas fa-power-off"></i>&nbsp;Logout </a></li>
	</ul>
	<br>
	<h1 style="text-align: center;">List Of Books</h1>
	<div class="table">
	<table>
		<tr>
			<th><b>S.No</b></th>
			<th><b>Book Id</b></th>
			<th><b>Book Name</b></th>
			<th><b>Author</b></th>
			<th><b>Status</b></th>
			<th><b>Remove</b></th>
		</tr>
		<?php
		$connection=mysqli_connect("remotemysql.com","SD3e56MviP","d2ti4lGtey","SD3e56MviP") or die("no connected");
		mysqli_select_db($connection,"SD3e56MviP") or die("no database");
		if($connection-> connect_error){
			die("connection failed:". $connection-> connect_error);
		}
		$sql = "SELECT id,name,author,status from admin_viewbooks";
		$result= $connection-> query($sql);
		$i=1;
		if($result-> num_rows > 0){
			while($row = $result-> fetch_assoc()){
				?>
				<tr>
					<td><b><?php echo $i; ?> </b></td>
					<td><b><?php echo $row['id']; ?> </b></td>
					<td><b><?php echo $row['name']; ?> </b></td>
					<td><b><?php echo $row['author']; ?> </b></td>
					<td><b><?php echo $row['status']; ?> </b></td>
					<td><b><a class="transaction" href="view.php?id=<?php echo $row['id'] ?>"> Remove </a></b></td>
				</tr>
			<?php
			$i++;
			}
			echo "</table>";
		}
		else{
			echo "0 result";
		}
		?>
	</table>
</div>
<?php 
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$del="DELETE FROM admin_viewbooks WHERE $id=id";
	$query=mysqli_query($connection,$del);
	if($query){
		echo '<script>alert("Successfully Removed")</script>';
		header("Refresh:0;url=view.php");

	}
}
?>

</body>
</html>
