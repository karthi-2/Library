<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Members</title>
	<script src="https://kit.fontawesome.com/4c49a00644.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="viewuserbooks.css">

</head>
<body>
	<ul>
		<li class="library">&nbsp;<i class="fas fa-book-reader"></i>&nbsp; Softrate Library</li>
		<li class="contact"><a href="contact.php"><i class="fas fa-address-book"></i>&nbsp;Contact us </a></li>
		<li class="back"><a href="userpage.php"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back </a></li>
		<li class="home"><a href="index.php"><i class="fas fa-home"></i>&nbsp;Home </a></li>
	</ul>
	<br><br>
	<h1>List Of Books</h1>
	<div class="table">
	<table>
		<tr>
			<th><b>S.No</b></th>
			<th><b>Book Id</b></th>
			<th><b>Book Name</b></th>
			<th><b>Author</b></th>
			<th><b>Status</b></th>
			<th><b>Borrow</b></th>
		</tr>
		<?php
		$connection=mysqli_connect("remotemysql.com","SD3e56MviP","d2ti4lGteY","SD3e56MviP") or die("no connected");
		mysqli_select_db($connection,"SD3e56MviP") or die("no database");
		if($connection-> connect_error){
			die("connection failed:". $connection-> connect_error);
		}
		$sql = "SELECT id,name,author,status from admin_viewbooks";
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
					<td><b><?php echo $row['status']; ?> </b></td>
					<td><b><a class="transaction" href="viewuserbooks.php?id=<?php echo $row['id'] ?>"> Borrow </a></b></td>
				</tr>
			<?php
			$i++;
			}
			echo "</table>";
		}
		else{
			$f=1;
		}
		?>
	</table>
	<br>
<?php 
session_start();
$clue=$_SESSION['email'];
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$a="SELECT * FROM mycollections";
	$r=$connection->query($a);
	if($r-> num_rows > 0){
		while($ro = $r-> fetch_assoc()){
			if($ro['email']==$clue){
				echo '<script>alert("You already Borrowed a Book!!")';
				exit();
			}
		}
	}
	$borrowed_book="SELECT * FROM admin_viewbooks WHERE $id=id";
	$result=$connection->query($borrowed_book);
	$row=$result->fetch_assoc();
	date_default_timezone_set("Asia/kolkata");
	$date=date("Y-m-d");
	$date=date('Y-m-d', strtotime($date. '+20 days'));
	$name=$row['name'];
	$author=$row['author'];
	$mycollection="INSERT INTO mycollections(id,name,author,duedate,email) VALUES ('$id','$name','$author','$date','$clue')";
	$query1=mysqli_query($connection,$mycollection);
	$del="DELETE FROM admin_viewbooks WHERE $id=id";
	$query=mysqli_query($connection,$del);
	if($query1){
		echo '<script>alert("The Book is added Successfully!!")</script>';
		header("Refresh:0;url=mycollection.php");

	}
}
if($f==1){
	echo "No Books!!!";
}
?>
</div>
</body>
</html>
