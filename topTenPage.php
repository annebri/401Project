<html>
<head>
	<title>mypetisthebest</title>
	<link rel="stylesheet" type="text/css" href="stylesMyHome.css">
	<link rel="stylesheet" type="text/css" href="logedinGeneral.css">
	<link rel="stylesheet" type="text/css" href="general.css">
	<link rel="stylesheet" type="text/css" href="topTenStyles.css">
	<link href="https://fonts.googleapis.com/css?family=Do+Hyeon|Indie+Flower" rel="stylesheet">
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/jsTopTenPage.js"></script>
</head>
	<header><title>mypetisthebest</title></header>	
	<?php
		session_start();
		if(empty($_SESSION["login"])){
			header("Location:login.php");
			session_destroy();
		}
		require_once("./Dao.php");
		$dao=new Dao();
		$pets = $dao->getAllPets();
	?>

	<body style>
		<div class = "background-top">
			<div class="banner">
				<div class="name">
					My Pet's the Best
					<img src="Untitled.png" class="logo" alt="logo">\
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
				<li id="currentPage" class="petcompare">
					<a href="topTenPage.php">Top Pets</a>
				</li>
				<li class="petcompare">
					<a href="logout.php">Logout</a>
				</li>

			</ul>
		</div>
		<div class="leftBlock">
			<h2>Click to Reveal the Top Pets!</h2>
			<div id = "MyPets">
				<div class ="category">
					<?php
						$i=0;
						$idCute=$pets[0]['petID'];	
						$valCute=$pets[0]['cuteRating'];
						foreach ($pets as $val) {
							if($valCute<$pets[$i]['cuteRating']){
								$idCute=$pets[$i]['petID'];	
								$valCute=$pets[$i]['cuteRating'];
							}
							$i++;
						}
						$imageCute=$dao->getPhoto($idCute);
						?>
						<div id="flipCute" class="flip">Cutest Pet!</div>

						<?php
						echo "<img id = \"panelCute\" class = \"panel\"src='".$imageCute['filepath']."' alt=\"karot\">";
					?>
					

				</div>
				<div class ="category">
					<?php
						$i=0;
						$idEleg=$pets[0]['petID'];	
						$valEleg=$pets[0]['eleganceRating'];
						foreach ($pets as $val) {
							if($valEleg<$pets[$i]['eleganceRating']){
								$idEleg=$pets[$i]['petID'];	
								$valEleg=$pets[$i]['eleganceRating'];
							}
							$i++;
						}
						$imageEleg=$dao->getPhoto($idEleg);
						?>
						<div id="elegflip" class="flip">Most Elegant Pet!</div>

						<?php
						echo "<img id = \"elegpanel\" class = \"panel\" src='".$imageEleg['filepath']."' alt=\"karot\">";
						?>
					
				</div>
				<div class ="category">
					<?php
						$i=0;
						$idAdorb=$pets[0]['petID'];	
						$valAdorb=$pets[0]['cuteRating'];
						foreach ($pets as $val) {
							if($valAdorb<$pets[$i]['adorbRating']){
								$idAdorb=$pets[$i]['petID'];	
								$valAdorb=$pets[$i]['adorbRating'];
							}
							$i++;
						}
						$imageAdorb=$dao->getPhoto($idAdorb);
						?>
						<div id="adorbflip" class="flip">Most Adorable Pet!</div>

						<?php
						echo "<img id = \"adorbpanel\" class = \"panel\"  src='".$imageAdorb['filepath']."' alt=\"karot\">";
						?>
					
				</div>
				<div class ="category">
					<?php
						$i=0;
						$idCrazy=$pets[0]['petID'];	
						$valCrazy=$pets[0]['crazyRating'];
						foreach ($pets as $val) {
							if($valCrazy<$pets[$i]['crazyRating']){
								$idCrazy=$pets[$i]['petID'];	
								$valCrazy=$pets[$i]['crazyRating'];
							}
							$i++;
						}
						$imageCrazy=$dao->getPhoto($idCrazy);
						?>
						<div id="flipCrazy" class="flip">Craziest Pet!</div>

						<?php
						echo "<img id = \"panelCrazy\" class = \"panel\"  src='".$imageCrazy['filepath']."' alt=\"karot\">";
						?>
				
				</div>
			</div>
		</div>
		<div id="footer">
			<li class ="namefooter">©2018 Anne Brinegar</li>
		</div>
	</body>
</html>