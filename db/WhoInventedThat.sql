CREATE TABLE innovations (
	innovation_id 	SERIAL PRIMARY KEY,
	name			VARCHAR(50) NOT NULL,
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
	death_year		INT, --This remains nullable because some folk aren't dead yet.
);

CREATE TABLE innovator_innovations (
	innovator_id 	INT NOT NULL,
	innovation_id 	INT NOT NULL
);

-- INSERTS...
INSERT INTO innovations (name, date_invented)
VALUES
-- ('PRINTING PRESS', 1439),
-- ('ELECTRICITY',1752),
-- ('ELECTRIC GENERATOR',1831),
-- ('PENICILLIN',1928),
-- ('DNA',1953),
-- ('SEMICONDUCTOR',1874),
-- ('OPTICAL LENSES',1286),
-- ('PAPER',105),
-- ('INTERNAL COMBUSTION ENGINE',1858),
-- ('VACCINATION',1796),
-- ('INTERNET',1973),
-- ('STEAM ENGINE',1712),
-- ('NITROGEN FIXATION',1909),
-- ('SEWAGE SYSTEMS',-800); -- Inserted these on 6/29/20
('',),
...

-- -- Race insert completed 6/29/20...
-- INSERT INTO races (race_name)
-- VALUES
-- ('WHITE'),
-- ('BLACK'),
-- ('ASIAN'),
-- ('AMERICAN INDIAN'),
-- ('PACIFIC ISLANDER'),
-- ('HISPANIC');

-- -- Race insert completed 6/29/20...
-- INSERT INTO continents (continent_name)
-- VALUES
-- ('ASIA'),
-- ('EUROPE'),
-- ('AUSTRALIA'),
-- ('ANTARTICA'),
-- ('AFRICA'),
-- ('NORTH AMERICA'),
-- ('SOUTH AMERICA');

INSERT INTO countries (country_name, continent_id)
VALUES
-- ('AMERICA',6),
-- ('GERMANY',2),
-- ('BELGIUM',2),
-- ('PRUSSIA',2),
-- ('ENGLAND',2),
-- ('NEW ZEALAND',3),
-- ('ROME',2),
-- ('CHINA',1),
-- ('ITALY',2),
-- ('SCOTLAND',2); -- Inserted these on 6/29/20
('',),










