<html>
<head>
	<title>mypetisthebest</title>
	<link rel="stylesheet" type="text/css" href="stylesMyHome.css">
	<link rel="stylesheet" type="text/css" href="logedinGeneral.css">
	<link rel="stylesheet" type="text/css" href="general.css">
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
				<li class="petcompare">
					<a href="topTenPage.php">Top Pets</a>
				</li>
				<li class="petcompare">
					<a href="logout.php">Logout</a>
				</li>

			</ul>
		</div>
		<div class="leftBlock">
			<h2>Top Pets</h2>
			<div id = "MyPets">
				<div class ="category">
					<div class="text">Cutest</div>
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

						print "<img id = \"cutepet\" src='".$imageCute['filepath']."' alt=\"karot\">";
					?>
					

				</div>
				<div class ="category">
					<div class="text">Most Elegant</div>
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

						print "<img id = \"elegpet\" src='".$imageEleg['filepath']."' alt=\"karot\">";
					?>
				</div>
				<div class ="category">
					<div class="text">Most Adorable</div>
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

						print "<img id = \"adorbpet\" src='".$imageAdorb['filepath']."' alt=\"karot\">";
					?>
				</div>
				<div class ="category">
					<div class="text">Craziest</div>
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

						print "<img id = \"crazypet\" src='".$imageCrazy['filepath']."' alt=\"karot\">";
					?>
				</div>
			</div>
		</div>
		<div id="footer">
			<li class ="namefooter">©2018 Anne Brinegar</li>
		</div>
	</body>
</html>