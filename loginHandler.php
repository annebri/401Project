<?php
	session_start();
	require_once 'Dao.php';

	$username = $_POST["username"];
	$password = $_POST["password"];	

	$valid = true;
	$_SESSION['presets']=array($_POST);
	$_SESSION["username"]=$username;

	$messages = array();
	$dao = new Dao();

	if(empty($username)){
		$messages[]="PLEASE ENTER A USERNAME";
		$valid=false;
	}

	if(empty($password)){
		$messages[]="PLEASE ENTER A PASSWORD";
		$valid=false;
	}
	if($valid){
		$getuser = $dao->getUser($username, $password);
		if(empty($getuser)){
			$messages[]="INCORRECT USERNAME OR PASSWORD";
			$valid=false;
		}
	}
	if(!$valid){
		$_SESSION['sentiment'] = "bad";
		$_SESSION['messages']=$messages;
		header("Location: login.php");
		exit;
	}
	$_SESSION["numPets"]=$getuser;
	$_SESSION["login"] = "logged in";
	header("Location: myHomePage.php");
	$_SESSION['sentiment'] = "good";
	exit;
?>