CREATE TABLE IF NOT EXISTS users (
			username VARCHAR (256) PRIMARY KEY,
			password VARCHAR (64) NOT NULL,
			numPets int (11) NOT NULL 
			);
            

CREATE TABLE IF NOT EXISTS pets (
			petID VARCHAR (512) PRIMARY KEY,
			petName VARCHAR (256) NOT NULL,
			owner VARCHAR (256) NOT NULL,
			species VARCHAR(128) NOT NULL,
			gender VARCHAR(128) NOT NULL,
			age INT (11) NOT NULL,
			cuteRating FLOAT (4,2) NOT NULL,
			eleganceRating FLOAT (4,2) NOT NULL,
			adorbRating FLOAT (4,2) NOT NULL,
			crazyRating FLOAT (4,2) NOT NULL,
			numVotesCute INT (11) NOT NULL,
			numVotesA INT (11) NOT NULL,
			numVotesE INT (11) NOT NULL,
			numVotesCrazy INT (11) NOT NULL
);
        
CREATE TABLE IF NOT EXISTS images (
			petID VARCHAR (512) PRIMARY KEY,
			filepath VARCHAR (256) NOT NULL,
			owner VARCHAR (256) NOT NULL
);