CREATE TABLE innovations (
	innovation_id 	SERIAL PRIMARY KEY,
	name			VARCHAR(25) NOT NULL,
	description		TEXT,
	date_invented	DATE NOT NULL
);

CREATE TABLE religions (
	religion_id 	SERIAL PRIMARY KEY,
	religion_name 	VARCHAR(20) NOT NULL
);

CREATE TABLE continents (
	continent_id 	SERIAL PRIMARY KEY,
	continent_name	VARCHAR(20)
);

CREATE TABLE countries (
	country_id 		SERIAL PRIMARY KEY,
	country_name	VARCHAR(20) NOT NULL,
	continent_id	INT NOT NULL REFERENCES continents (continent_id)
);

CREATE TABLE races (
	race_id 		SERIAL PRIMARY KEY,
	race_name		VARCHAR(20)
);

CREATE TABLE ethnicities (
	ethnic_id 		SERIAL PRIMARY KEY,
	ethnic_name		VARCHAR(20)
);

CREATE TABLE innovators (
	innovator_id	SERIAL PRIMARY KEY,
	firstname		VARCHAR(20) NOT NULL,
	lastname		VARCHAR(20) NOT NULL,
	country_id		INT NOT NULL REFERENCES countries (country_id),
	ethnic_id		INT REFERENCES ethnicities (ethnic_id),
	race_id 		INT NOT NULL REFERENCES races (race_id),
	religion_id		INT REFERENCES religions (religion_id),
	birth_year		INT NOT NULL,
	death_year		INT NOT NULL
);

CREATE TABLE innovator_innovations (
	innovator_id 	INT NOT NULL,
	innovation_id 	INT NOT NULL
);

-- INSERTS...










