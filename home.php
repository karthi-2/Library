<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<script src="https://kit.fontawesome.com/4c49a00644.js" crossorigin="anonymous"></script>
	<style>
		*{
		margin:  0px;
		padding:  0px;
	}
	body{
		background-color: lightblue;
	}
	ul{
		margin: 0;
		padding: 0;
		list-style: none;
		height: 43px;
		width: 100%;
		background-color: black;
		line-height: 43px;
		font-size: 20px;
	}
	.library{
		float: left;
		color: white;
		border-right: none;
		border-left: none;
	}
	.contact{
		border-right: none;
	}
	.home{
		border-left: 2px solid white;
	}
	li{
		float: right;
		border-right: 1px solid white;
		border-left: 1px solid white;
	}
	.la{
		display: block;
		padding: 0 28px;
		color: white;
		text-decoration: none;
	}

	.la:hover{
		background-color: lightblue;
	}
		.user{
			width: 20%;
			height: 20%; 
			margin-left: 30%;
			margin-top: 10%;
		}
		.admin{
			width: 16%;
			height: 16%;
			/*margin-right: 20%;
			margin-top: 10%;*/
			border-left: 2px solid black;
		}
		.u{
			margin-left: 37%;
			font-size: 25px;
			text-decoration: none;
			color: black;
		}
		.a{
			margin-left: 20%;
			font-size: 25px;
			text-decoration: none;
			color: black;
		}
		a{
			text-decoration: none;
		}
		.user:hover{
			transform: scale(1.1);
		}
		.admin:hover{
			transform: scale(1.1);
		}
	</style>
</head>
<body>
	<ul>
		<li class="library">&nbsp;<i class="fas fa-book-reader"></i>&nbsp; Softrate Library</li>
		<li class="contact"><a href="contact.php" class="la"><i class="fas fa-address-book"></i>&nbsp;Contact us </a></li>
		<li class="back"><a href="index.php" class="la"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back </a></li>
		<li class="home"><a href="index.php" class="la"><i class="fas fa-power-off"></i>&nbsp;Logout </a></li>
	</ul>
	<a href="user.php" ><img src="user.png" class="user" ></a>
	<a href="admin.php" ><img src="admin.png" class="admin"></a>
	<br><br>
	<a href="user.php"><span class="u">User</span></a><a href="admin.html"><span class="a">Librarian</span></a>

</body>
</html>
