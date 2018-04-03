<html>
<head>
	<title>mypetisthebest</title>
	<link rel="stylesheet" type="text/css" href="stylesVotingPage.css">
	<link rel="stylesheet" type="text/css" href="logedinGeneral.css">
	<link rel="stylesheet" type="text/css" href="general.css">

</head>
	<header><title>mypetisthebest</title></header>	
	<body style>
		<div class = "background-top">
			<div class="banner">
				<div class="name">
					My Pet's the Best
					<img src="Untitled.png" class="logo"  alt="logo">\
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
			<h2>Voting</h2>
			<h3>For each enter a number 1 through 5! Ya I'm working on this page</h3>
			<?php
			session_start();
			if(empty($_SESSION["login"])){
				header("Location:login.php");
				session_destroy();
			}
			$presets = array();
     		if (isset($_SESSION['presets'])) {
      			 $presets = array_shift($_SESSION['presets']);
      		}
			if (isset($_SESSION['messages'])) {
      			$sentiment = $_SESSION['sentiment'];
       			foreach($_SESSION['messages'] as $message) {
         			echo "<div class='message $sentiment'>$message</div>";
       			}
       			     unset($_SESSION['messages']);
     		}
     		    unset($_SESSION['presets'])

     	?>
			<div class = "voting">

				<?php
					require_once("./Dao.php");
					$dao = new Dao();
					$images = $dao->getAllPetsPhotos();

					foreach ($images as $image) {
						$pet=$image['petID'];
						print "<div><img id = \"karot\" src='".$image['filepath']."'alt=\"karot\">
				<ul>
					<li class=\"category\">Cuteness:
						<form action=\"cuteHandler.php\" method=\"POST\">
						<input value=\"".(isset($presets['cuteval']) ? $presets['cuteval'] : '')."\"type=\"text\" id=\"cuteval\" name=\"cuteval\">
						<input type=\"hidden\" value=".$pet." id=\"photo\" name=\"photo\"/>
						<button type = \"submit\">Submit</button></form>
 
					</li>
					<li class=\"category\">Elegence:
						<form action=\"elegHandler.php\" method=\"POST\">
						<input value=\"".(isset($presets['elegval']) ? $presets['elegval'] : '')."\"type=\"text\" id=\"elegval\" name=\"elegval\">
						<input type=\"hidden\" value=".$pet." id=\"photo\" name=\"photo\"/>
						<button type = \"submit\">Submit</button></form>
					</li>
					<li class=\"category\">Adorableness:
					<form action=\"adorbHandler.php\" method=\"POST\">
						<input value=\"".(isset($presets['adorbval']) ? $presets['adorbval'] : '')."\"type=\"text\" id=\"adorbval\" name=\"adorbval\">
						<input type=\"hidden\" value=".$pet." id=\"photo\" name=\"photo\"/>
						<button type = \"submit\">Submit</button></form>
					</li>

					<li class=\"category\">Crazy:<form action=\"crazyHandler.php\" method=\"POST\">
						<input value=\"".(isset($presets['crazyval']) ? $presets['crazyval'] : '')."\" type=\"text\" id=\"crazyval\" name=\"crazyval\"></li>
						<input type=\"hidden\" value=".$pet." id=\"photo\" name=\"photo\"/>
						<button type = \"submit\">Submit</button></form>
				</ul>
				</div>";
					}
				?>
			</div>
			<div id="footer">
			<li class ="namefooter">©2018 Anne Brinegar</li>
		</div>
	</body>
</html>