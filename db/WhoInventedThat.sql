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
-- ('SEWAGE SYSTEMS',-800), -- Inserted these on 6/29/20
-- ('REFRIGERATION',1834),
-- ('GUNPOWDER',808),
-- ('AIRPLANE',1903),
-- ('PERSONAL COMPUTER',1971),
-- ('COMPASS',20),
-- ('AUTOMOBILE',1885),
-- ('INDUSTRIAL STEELMAKING',1856),
-- ('BIRTH CONTROL PILL',1952),
-- ('NUCLEAR FISSION',1938),
-- ('SEXTANT',1730),
-- ('TELEPHONE',1876),
-- ('TELEGRAPH',1828),
-- ('ALPHABETIZATION',-1850),
-- ('MECHANIZED CLOCK',723),
-- ('RADIO',1896),
-- ('PHOTOGRAPHY',1813),
-- ('MOLDBOARD PLOW',1814),
-- ('ARCHIMEDES SCREW',-234),
-- ('COTTON GIN',1794),
-- ('PASTEURIZATION',1864); -- Inserted these on 6/30/20


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

INSERT INTO ethnicities (ethnic_name)
VALUES
-- ('AMERICAN'),
-- ('GERMAN'),
-- ('JEWISH'),
-- ('MUSLIM'),
-- ('IRISH'),
-- ('SCOTTISH'),
-- ('CHINESE'),
-- ('GREEK'),
-- ('FRENCH'),
-- ('BRITISH'),
-- ('BELGIAN')
-- ('EGYPTIAN'); -- INSERTED THESE 6/30/20


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
-- ('SCOTLAND',2), -- Inserted these on 6/29/20
-- ('EGYPT',5),
-- ('FRANCE',2),
-- ('GREECE',2); -- Inserted these on 6/30/20


/********************************************
* When inserting innovators, if the actual inventor
* is not known OR no group is known (ex.Tang Dynasty): 
* FIRSTNAME = 'UNKNOWN' (all caps),
* LASTNAME  = 'name_of_the_innovation' (all lowercase).
*********************************************/
INSERT INTO innovators (
	firstname, 
	lastname, 
	country_id, 
	ethnic_id,
	race_id, 
	birth_year, 
	death_year	
)VALUES 
-- ('JOHANNES','GUTENBERG',2,2,1,1400,1468),
-- ('BENJAMIN','FRANKLIN',1,1,1,1706,1790),
-- ('MICHAEL','FARADAY',5,10,1,1791,1867),
-- ('ALEXANDER','FLEMING',10,6,1,1881,1955),
-- ('JAMES','WATSON',1,1,1,1928,NULL),
-- ('FRANCIS','CRICK',5,10,1,1916,2004),
-- ('MAURICE','WILKINS',6,10,1,1916,2004),
-- ('KARL','BRAUN',2,2,1,1850,1918),
-- ('UNKNOWN','optical lenses',9,13,1,NULL,NULL),
-- ('CAI','LUN',8,7,3,50,121),
-- ('JEAN ETIENNE','LENOIR',3,11,1,1822,1900),
-- ('EDWARD','JENNER',5,10,1,1749,1823),
-- ('ROBERT','KHAN',1,1,1,1938,NULL),
-- ('VINTON','CERF',1,1,1,1943,NULL),
-- ('THOMAS','NEWCOMEN',5,10,1,1664,1729),
-- ('FRITZ','HABER',4,2,1,1868,1934),
-- ('UNKNOWN','sewage systems',7,14,1,NULL,NULL),
-- ('JACOB','PERKINS',1,10,1,1766,1849),
-- ('TANG','DYNASTY',8,7,3,NULL,NULL),
-- ('ORVILLE','WRIGHT',1,1,1,1871,1948),
-- ('WILBUR','WRIGHT',1,1,1,1867,1912),
-- ('JOHN','BLANKENBAKER',1,1,1,1930,NULL),
-- ('HAN','DYNASTY',8,7,3,NULL,NULL),
-- ('KARL','BENZ',2,2,1,1844,1929),
-- ('BESSEMER','HENRY',5,10,1,1813,1898),
-- ('GREGORY','PINCUS',1,1,1,1903,1967),
-- ('OTTO','HAHN',4,2,1,1879,1968),
-- ('THOMAS','GODFREY',1,1,1,1704,1749),
-- ('ALEXANDER GRAHAM','BELL',10,1,1,1847,1922),
-- ('HARRISON','DYAR',1,1,1,1866,1929),
-- ('UNKNOWN','alphabetization',11,12,3,NULL,NULL),
-- ('YI','XING',8,7,3,683,727),
-- ('GUGLIELMO','MARCONI',9,13,1,1874,1937),
-- ('JOSEPH NICEPHORE','NIEPCE',12,9,1,1765,1833),
-- ('JETHRO','WOOD',1,1,1,1774,1834),
-- ('ARCHIMEDES','OF SYRACUSE',13,8,1,-287,-212),
-- ('ELI','WHITNEY',1,1,1,1765,1825),
-- ('LOUIS','PASTEUR',12,9,1,1822,1895), -- INSERTED THESE 6/30/20
-- ('Pope','GREGORY XIII',9,13,1,1502,1585),
-- ('SAMUEL','KIER',1,1,1,1813,1874),
-- ('CHARLES','PARSONS',5,10,1,1854,1931),
-- ('JOSEPH','ASPDIN',5,10,1,1778,1855),
-- ('GREGORY JOHANN','MENDEL',15,15,1,1822,1884),
-- ('EDWIN','DRAKE',1,1,1,1819,1880),
-- ('UNKNOWN','sailboat',16,16,3,NULL,NULL),
-- ('ROBERT','GODDARD',1,1,1,1882,1945),
-- ('SONG','DYNASTY',8,7,3,NULL,NULL),
-- ('UNKNOWN','abacus',16,16,3,NULL,NULL),
-- ('WILLIS','CARRIER',1,1,1,1876,1950),
-- ('JOHN','BAIRD',10,6,1,1888,1946),
-- ('WILLIAM','MORTON',1,1,1,1819,1868),
-- ('UNKNOWN','nail',11,12,3,NULL,NULL),
-- ('UNKNOWN','lever',16,16,3,NULL,NULL),
-- ('RANSOM','OLDS',1,1,1,1864,1950),
-- ('UNKNOWN','pulley',16,16,3,NULL,NULL),
-- ('HIRAM','MOORE',1,1,1,1817,1902),
-- ('EDWARD','DE SMEDT',3,1,1,NULL,NULL),
-- ('ISAAC','NEWTON',5,10,1,1642,1727),
-- ('ROGER','BACON',5,10,1,1219,1292); -- INSERTED THESE 7/4/20
('','',,,,,),
('','',,,,,),










