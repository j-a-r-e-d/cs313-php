-- Create the playlist database
CREATE DATABASE music;

-- Create the basic tables needed for a playlist creation
CREATE TABLE music_users (
   UserID      SERIAL PRIMARY KEY,
   FirstName   VARCHAR(20) NOT NULL,
   LastName    VARCHAR(20) NOT NULL,
   LoginName   VARCHAR(50) NOT NULL UNIQUE,
   AddressID   INT NOT NULL REFERENCES address (AddressID),
   Email       VARCHAR(50) NOT NULL UNIQUE,
   GenreID     INT NOT NULL REFERENCES genres (GenreID),
   travelMins  INT NOT NULL,
   DateCreated DATE NOT NULL,
   isDeleted   BOOLEAN NOT NULL
);

CREATE TABLE address (
   addressID   SERIAL PRIMARY KEY,
   city        VARCHAR(50) NOT NULL,
   stateID     INT NOT NULL REFERENCES states (stateID),
   DateCreated DATE NOT NULL,
   isDeleted   BOOLEAN NOT NULL
);

CREATE TABLE genres (
   GenreID     SERIAL PRIMARY KEY,
   Description VARCHAR(50) NOT NULL,
   code        VARCHAR(10) NOT NULL,
   DateCreated DATE NOT NULL,
   isDeleted   BOOLEAN NOT NULL
);

CREATE TABLE albums (
   albumID     SERIAL PRIMARY KEY,
   title       VARCHAR(100) NOT NULL,
   releaseDate DATE NOT NULL,
   minutes     INT NOT NULL CHECK (minutes > 0),
   artistID    INT NOT NULL REFERENCES artists (artistID),
   GenreID     INT NOT NULL REFERENCES genres (GenreID),
   DateCreated DATE NOT NULL,
   isDeleted   BOOLEAN NOT NULL
);

CREATE TABLE songs (
   songID      SERIAL PRIMARY KEY,
   title       VARCHAR(100) NOT NULL,
   albumID     INT NOT NULL REFERENCES albums (albumID),
   minutes     INT NOT NULL CHECK (minutes > 0),
   DateCreated DATE NOT NULL,
   isDeleted   BOOLEAN NOT NULL
);

CREATE TABLE artists (
   artistID   SERIAL PRIMARY KEY,
   artistName VARCHAR(50) NOT NULL,
   DateCreated DATE NOT NULL,
   isDeleted   BOOLEAN NOT NULL
);

CREATE TABLE favorites (
   favoriteID  SERIAL PRIMARY KEY,
   songID      INT NOT NULL REFERENCES songs (songID),
   UserID      INT NOT NULL REFERENCES music_users (UserID),
   DateCreated DATE NOT NULL,
   isDeleted   BOOLEAN NOT NULL
);

CREATE TABLE states (
   StateID        SERIAL PRIMARY KEY,
   stateCode      VARCHAR(2) NOT NULL,
   Description    VARCHAR(30) NOT NULL
);

-- Insert values for states
INSERT INTO states (stateCode, Description)
VALUES 
('AL','ALABAMA'),
('AK','ALASKA'),
('AZ','ARIZONA'),
('AR','ARKANSAS'),
('CA','CALIFORNIA'),
('CO','COLORADO'),
('CT','CONNECTICUT'),
('DE','DELAWARE'),
('FL','FLORIDA'),
('GA','GEORGIA'),
('HI','HAWAII'),
('ID','IDAHO'),
('IL','ILLINOIS'),
('IN','INDIANA'),
('IA','IOWA'),
('KS','KANSAS'),
('KY','KENTUCKY'),
('LA','LOUISIANA'),
('ME','MAINE'),
('MD','MARYLAND'),
('MA','MASSACHUSETTS'),
('MI','MICHIGAN'),
('MN','MINNESOTA'),
('MS','MISSISSIPPI'),
('MO','MISSOURI'),
('MT','MONTANA'),
('NE','NEBRASKA'),
('NV','NEVADA'),
('NH','NEW HAMPSHIRE'),
('NJ','NEW JERSEY'),
('NM','NEW MEXICO'),
('NY','NEW YORK'),
('NC','NORTH CAROLINA'),
('ND','NORTH DAKOTA'),
('OH','OHIO'),
('OK','OKLAHOMA'),
('OR','OREGON'),
('PA','PENNSYLVANIA'),
('RI','RHODE ISLAND'),
('SC','SOUTH CAROLINA'),
('SD','SOUTH DAKOTA'),
('TN','TENNESSEE'),
('TX','TEXAS'),
('UT','UTAH'),
('VT','VERMONT'),
('VA','VIRGINIA'),
('WA','WASHINGTON'),
('DC','WASHINGTON, D.C.'),
('WV','WEST VIRGINIA'),
('WI','WISCONSIN'),
('WY','WYOMING');
