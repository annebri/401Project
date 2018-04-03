<?php
  	session_start();
	require_once 'Dao.php';
	$dao = new Dao();
	$username = $_SESSION["username"];
	$pets=$dao->getPetPhotos($username);
	if(empty($_SESSION["login"])){
		header("Location:login.php");
		session_destroy();
	}
?>
<html>
<head>
	<title>mypetisthebest</title>
	<link rel="stylesheet" type="text/css" href="stylesMyHome.css">
	<link rel="stylesheet" type="text/css" href="logedinGeneral.css">
	<link rel="stylesheet" type="text/css" href="general.css">
</head>
	<header><title>mypetisthebest</title></header>	
	<body style>
		<div class = "background-top">
			<div class="banner">
				<div class="name">
					My Pet's the Best
					<img src="Untitled.png" class="logo" alt="logo">
				</div>
			</div>
		</div>
		<div class = "topbar">
			<ul>
				<li class="petcompare">
					<a href="myHomePage.php">My Pets</a>
				</li>
				<li class="petcompare">
					<a href="votingPage.php">Voting</a>
				</li>
				<li class="petcompare">
					<a href="topTenPage.php">Top Pets</a>
				</li>
				<li class="petcompare">
					<a href="logout.php">Logout</a>
				</li>

			</ul>
		</div>
		<div class="leftBlock">
			<h2>My Pets</h2>
			<div class = "MyPets">
				<?php 
					foreach ($pets as $pet) {
						$petID=$pet['petID'];
						$petdata=$dao->getPet($petID);
					 	print "<div><h4>".$petdata."</h4><img src='".$pet['filepath']."'/></div>";
					 
					 } 
				?>
				<form method="POST" action="addpet.php">
				<div>
				<button type="submit">Add Pet</button>
			</div>
			</form>
			</div>
		</div>
			<div id="footer">
			<li class ="namefooter">©2018 Anne Brinegar</li>
		</div>
	</body>
</html>