<?php
	session_start();
	require_once 'Dao.php';
	$username=$_SESSION['username'];
	$petname = $_POST['petname'];
	$petid = $petname.$_SESSION['username'];
	$age = $_POST['age'];
	$species = $_POST['species'];
	$gender = $_POST['gender'];

	$valid = true;
	$_SESSION['presets']=array($_POST);
	$messages = array();
	$dao = new Dao();
	if(empty($petname)){
		$messages[]="PLEASE ENTER A USERNAME";
		$valid=false;
	}

		if($valid){
		$getPet = $dao->getPet($username.$petname);
		if(empty($getuser)){
			$_SESSION['sentiment'] = "good";

			$basePath = "C:\wamp64\www\MyPetsTheBest\\";
			$imagePath="".$_FILES["fileToUpload"]["name"];

			if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$basePath.$imagePath)) {
    			$_SESSION['sentiment'] = "bad";
    			$messages[]="Issue uploading image. Image may be too large.";
				$_SESSION['messages']=$messages;
				header("Location: addpet.php");
				exit;
 	 		}

			// $_SESSION['username'] = $username;
			$dao->addPet($username.$petname,$petname, $username, $age,$species,$gender, $imagePath);
			header("Location: myHomePage.php");
			exit;
		}
		$messages[]="YOU HAVE ALREADY ADDED A PET WITH THIS NAME";
	}
	$_SESSION['sentiment'] = "bad";
	$_SESSION['messages']=$messages;
	header("Location: addpet.php");
	exit;
	
?>