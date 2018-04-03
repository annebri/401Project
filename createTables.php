<?php
require_once 'KLogger.php';

	class createTable {

	public function __construct () {
	}

	public function createAllTables() {
		require_once(Dao.php);
    try {
		$conn = getConnection();
		// echo "connected";
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql_users = 
		"CREATE TABLE IF NOT EXISTS `users` (
			`username` VARCHAR (256) PRIMARY KEY,
			`password` VARCHAR (64) NOT NULL,
			`numPets` int (11) NOT NULL, 
			) ";
			
			
		$db->exec($sql_users);
		// print("Created users.\n");
	
		$sql_image =
		"CREATE TABLE IF NOT EXISTS `UserInfo` (
			`petID` VARCHAR (512) PRIMARY KEY,
			`filepath` VARCHAR (256) NOT NULL,
			`owner` VARCHAR (256) NOT NULL,
		);";
		$db->exec($sql_usersinfo);
		// print("Created usersinfo.\n");

		$sql_pet =
		"CREATE TABLE IF NOT EXISTS `UserInfo` (
			`petID` VARCHAR (512) PRIMARY KEY,
			`petName` VARCHAR (256) NOT NULL,
			`owner` VARCHAR (256) NOT NULL,
			`species` VARCHAR(128) NOT NULL,
			`gender` VARCHAR(128) NOT NULL,
			`age` INT (11) NOT NULL,
			`cuteRating` FLOAT (4,2) NOT NULL,
			`eleganceRating` FLOAT (4,2) NOT NULL,
			`adorbRating` FLOAT (4,2) NOT NULL,
			`crazyRating` FLOAT (4,2) NOT NULL,
			`numVotesCute` INT (11) NOT NULL,
			`numVotesA` INT (11) NOT NULL,
			`numVotesE` INT (11) NOT NULL,
			`numVotesCrazy` INT (11) NOT NULL
		);";
		$db->exec($sql_pet);
		// print("Created usersinfo.\n");
	}
	catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
      $this->logger->logFatal("The database connection failed.");
	}
	}
	}
?>