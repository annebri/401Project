<?php
	session_start();
	require_once 'Dao.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	$valid = true;
	$_SESSION['presets']=array($_POST);
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
	if(1!=preg_match('~[1-9]~', $password)||1!=preg_match('~[A-Z]~', $password)){
		$messages[]="PLEASE ENTER A PASSWORD WITH NUMBER AND CAPITAL LETTER";
		$valid=false;
	}
	if($valid){
		$getuser = $dao->getUser($username, $password);
		if(empty($getuser)){
			$valid=true;
			$_SESSION['sentiment'] = "good";
			$_SESSION['username'] = $username;
			$_SESSION['login']="login";
			$dao->addUser($username, $password);
			header("Location: myHomePage.php");
			exit;
		}
		$messages[]="USERNAME NOT UNIQUE TRY AGAIN";
	}
	$_SESSION['sentiment'] = "bad";
	$_SESSION['messages']=$messages;
	header("Location: createAccount.php");
	exit;
	
?>