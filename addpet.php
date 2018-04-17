<html>
<head>
	<title>mypetisthebest</title>
	<link rel="stylesheet" type="text/css" href="stylesAdd.css">
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
				<li id="currentPage" class="petcompare">
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
		<?php
			session_start();
			if(empty($_SESSION["login"])){
				header("Location:login.php");
				session_destroy();
			}
		?>
		<div class="rightBlock">
			<?php
			if(isset($_SESSION['messages'])){
				$sentiment=$_SESSION['sentiment'];
				foreach($_SESSION['messages'] as $message){
					echo "<div class='message $sentiment'>$message</div>";
				}
			}
	
			$presets = array();
			if(isset($_SESSION['presets'])){
				$presets=array_shift($_SESSION['presets']);
			}
			unset($_SESSION['presets']);
			unset($_SESSION['messages']);
			unset($_SESSION['messages']);

		?>
			<h2>Add Pet</h2>
			<form action="addHandler.php" method="POST" enctype="multipart/form-data">
				<h5>Pet name:
				<input value="<?php echo isset($presets['petname']) ? $presets['petname'] : ''; ?>" placeholder="petname here" type="text" id="petname" name="petname"></h5>
				<h5>Age:
				<input value="<?php echo isset($presets['age']) ? $presets['age'] : ''; ?>" placeholder="age" type="text" id="age" name="age"></h5>

				<h5>Species:
				<input value="<?php echo isset($presets['species']) ? $presets['species'] : ''; ?>" placeholder="species" type="text" id="species" name="species"></h5>

				<h5>Gender:
				<input value="<?php echo isset($presets['gender']) ? $presets['gender'] : ''; ?>" placeholder="gender" type="text" id="gender" name="gender"></h5>

				<div><input type="file" name="fileToUpload" id="fileToUpload"></div>

				<div><input type="submit" value="Add pet"></div>
			</form>

		</div>
	</body>
	</html>
