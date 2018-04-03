<?php

class Dao{
	
	require_once(createTables.php);

	private $host =  "us-cdbr-iron-east-05.cleardb.net";
	private $db = "heroku_90f00bf5032685b";
	private $user = "bb4c1b8f2fe7e3";
	private $pass = "3d85b42e";

	// private $host = "localhost";
 //  	private $db = "mypetsthebestdatabase";
 //  	private $user = "root";
 //  	private $pass = "";

	public function __construct(){
		$cT = new createTable();
		$cT->createAllTables();
	}

	public function getConnection(){
		try{
			$conn = new PDO("mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_90f00bf5032685b", 'bb4c1b8f2fe7e3', '3d85b42e');
			return $conn;
		}catch(Exception $e){
			echo "connection failed: " . $e->getMessage();
		}
	}

	public function getUser($username, $password){
		$conn=$this->getConnection();
		$query = $conn->prepare("SELECT numPets FROM users WHERE username = :username AND password= :password");
		$query->bindParam(':username', $username);
		$query->bindParam(':password', $password);
		$query->setFetchMode(PDO::FETCH_ASSOC);
    	$query->execute();
    	$results = $query->fetchAll();
    	return $results;
	}

	public function addUser($username, $password){
		$conn = $this->getConnection();
		$query = $conn->prepare("insert into users (username, password, numPets) values (:username,:password,:numPets)");
		 $num=0;
		 $query->bindParam(':username', $username);
		 $query->bindParam(':password', $password);
		 $query->bindParam(':numPets', $num);
		$query->execute();
	}

	public function deleteUser($username, $password){
	}

	public function getPet($petID){
		$conn=$this->getConnection();
		$query = $conn->prepare("SELECT petName FROM pets WHERE petID = :petID");
		$query->bindParam(':petID', $petID);
		$query->setFetchMode(PDO::FETCH_ASSOC);
    	$query->execute();
    	$results = $query->fetch();
    	return $results['petName'];
	}

	public function addPet($petID, $petName, $owner, $age,$species,$gender,$filepath){

		$conn = $this->getConnection();
		$query = $conn->prepare("insert into pets (petID,petName, owner, species, gender, age, cuteRating, adorbRating, eleganceRating, crazyRating,numVotesCute,numVotesE,numVotesA, numVotesCrazy) values (:petID,:petName, :owner, :species, :gender, :age, 0, 0, 0, 0, 0, 0, 0, 0)");
		$query->bindParam(':petID', $petID);
		$query->bindParam(':petName', $petName);
		$query->bindParam(':owner', $owner);
		$query->bindParam(':species', $species);
		$query->bindParam(':gender', $gender);
		$query->bindParam(':age', $age);
		$query->execute();
		$this->addPhoto($petID, $filepath,$owner);
	}

	public function addPhoto($petID, $filepath, $owner){

		$conn = $this->getConnection();
		$query=$conn->prepare("insert into images (petID, filepath,owner) values (:petID, :filepath,:owner)");
		$query->bindParam(':petID', $petID);
		$query->bindParam(':filepath', $filepath);
		$query->bindParam(':owner', $owner);
		$query->execute();

	}
	public function getPetPhotos($owner){
		$conn=$this->getConnection();
		$query=$conn->prepare("select * from images where owner=:owner");
		$query->bindParam(':owner',$owner);

		$query->setFetchMode(PDO::FETCH_ASSOC);
    	$query->execute();
    	$results = $query->fetchAll();
    	return $results;

	}

	public function getPhoto($petID){
		$conn=$this->getConnection();
		$query=$conn->prepare("select filepath from images where petID=:petID");
		$query->bindParam(':petID',$petID);

		$query->setFetchMode(PDO::FETCH_ASSOC);
    	$query->execute();
    	$results = $query->fetch();
    	return $results;

	}

	public function getAllPetsPhotos(){
		$conn=$this->getConnection();
		$query=$conn->prepare("select * from images");
		$query->setFetchMode(PDO::FETCH_ASSOC);
    	$query->execute();
    	$results = $query->fetchAll();
    	return $results;
	}

	public function getNumVotesCute($petID){
		$conn=$this->getConnection();
		$query=$conn->prepare("SELECT numVotesCute FROM pets WHERE petID=:petID");
		$query->bindParam(':petID', $petID);
		$query->setFetchMode(PDO::FETCH_ASSOC);
    	$query->execute();
    	$results = $query->fetch();
    	return $results['numVotesCute'];
	}
	public function updateNumVotesCute($petID,$newNum){
		$conn=$this->getConnection();
		$query=$conn->prepare("UPDATE pets SET numVotesCute=:voteAdded WHERE petID=:petID");
		$query->bindParam(':voteAdded', $newNum);
		$query->bindParam(':petID', $petID);
		$query->execute();
	}
	public function updateVoteCute($petID,$voteAdded){
		$conn=$this->getConnection();
		$query=$conn->prepare("UPDATE pets SET cuteRating=:voteAdded WHERE petID=:petID");
		$query->bindParam(':voteAdded', $voteAdded);
		$query->bindParam(':petID', $petID);
		$query->execute();
	}
	public function getCuteVal($petID){
		$conn=$this->getConnection();
		$query=$conn->prepare("SELECT cuteRating FROM pets WHERE petID=:petID");
		$query->bindParam(':petID', $petID);
		$query->setFetchMode(PDO::FETCH_ASSOC);
    	$query->execute();
    	$results = $query->fetch();
    	error_log("cute result: ".print_r($results['cuteRating'],true));
    	return $results['cuteRating'];
	}


public function getNumVotesEleg($petID){
		$conn=$this->getConnection();
		$query=$conn->prepare("SELECT numVotesE FROM pets WHERE petID=:petID");
		$query->bindParam(':petID', $petID);
		$query->setFetchMode(PDO::FETCH_ASSOC);
    	$query->execute();
    	$results = $query->fetch();
    	return $results['numVotesE'];
	}
	public function updateNumVotesEleg($petID,$newNum){
		$conn=$this->getConnection();
		$query=$conn->prepare("UPDATE pets SET numVotesE=:voteAdded WHERE petID=:petID");
		$query->bindParam(':voteAdded', $newNum);
		$query->bindParam(':petID', $petID);
		$query->execute();
	}
	public function updateVoteEleg($petID,$voteAdded){
		$conn=$this->getConnection();
		$query=$conn->prepare("UPDATE pets SET eleganceRating=:voteAdded WHERE petID=:petID");
		$query->bindParam(':voteAdded', $voteAdded);
		$query->bindParam(':petID', $petID);
		$query->execute();
	}
	public function getElegVal($petID){
		$conn=$this->getConnection();
		$query=$conn->prepare("SELECT eleganceRating FROM pets WHERE petID=:petID");
		$query->bindParam(':petID', $petID);
		$query->setFetchMode(PDO::FETCH_ASSOC);
    	$query->execute();
    	$results = $query->fetch();
    	return $results['eleganceRating'];
	}

		public function getNumVotesAdorb($petID){
		$conn=$this->getConnection();
		$query=$conn->prepare("SELECT numVotesA FROM pets WHERE petID=:petID");
		$query->bindParam(':petID', $petID);
		$query->setFetchMode(PDO::FETCH_ASSOC);
    	$query->execute();
    	$results = $query->fetch();
    	return $results['numVotesA'];
	}
	public function updateNumVotesAdorb($petID,$newNum){
		$conn=$this->getConnection();
		$query=$conn->prepare("UPDATE pets SET numVotesA=:voteAdded WHERE petID=:petID");
		$query->bindParam(':voteAdded', $newNum);
		$query->bindParam(':petID', $petID);
		$query->execute();
	}
	public function updateVoteAdorb($petID,$voteAdded){
		$conn=$this->getConnection();
		$query=$conn->prepare("UPDATE pets SET adorbRating=:voteAdded WHERE petID=:petID");
		$query->bindParam(':voteAdded', $voteAdded);
		$query->bindParam(':petID', $petID);
		$query->execute();
	}
	public function getAdorbVal($petID){
		$conn=$this->getConnection();
		$query=$conn->prepare("SELECT adorbRating FROM pets WHERE petID=:petID");
		$query->bindParam(':petID', $petID);
		$query->setFetchMode(PDO::FETCH_ASSOC);
    	$query->execute();
    	$results = $query->fetch();
    	return $results['adorbRating'];
	}


		public function getNumVotesCrazy($petID){
		$conn=$this->getConnection();
		$query=$conn->prepare("SELECT numVotesCrazy FROM pets WHERE petID=:petID");
		$query->bindParam(':petID', $petID);
		$query->setFetchMode(PDO::FETCH_ASSOC);
    	$query->execute();
    	$results = $query->fetch();
    	return $results['numVotesCrazy'];
	}
	public function updateNumVotesCrazy($petID,$newNum){
		$conn=$this->getConnection();
		$query=$conn->prepare("UPDATE pets SET numVotesCrazy=:voteAdded WHERE petID=:petID");
		$query->bindParam(':voteAdded', $newNum);
		$query->bindParam(':petID', $petID);
		$query->execute();
	}
	public function updateVoteCrazy($petID,$voteAdded){
		$conn=$this->getConnection();
		$query=$conn->prepare("UPDATE pets SET crazyRating=:voteAdded WHERE petID=:petID");
		$query->bindParam(':voteAdded', $voteAdded);
		$query->bindParam(':petID', $petID);
		$query->execute();
	}
	public function getCrazyVal($petID){
		$conn=$this->getConnection();
		$query=$conn->prepare("SELECT crazyRating FROM pets WHERE petID=:petID");
		$query->bindParam(':petID', $petID);
		$query->setFetchMode(PDO::FETCH_ASSOC);
    	$query->execute();
    	$results = $query->fetch();
    	return $results['crazyRating'];
	}

	public function getAllPets(){
		$conn=$this->getConnection();
		$query=$conn->prepare("SELECT * FROM pets");
		$query->setFetchMode(PDO::FETCH_ASSOC);
    	$query->execute();
    	$results = $query->fetchAll();
    	return $results;
	}
}
?>