

SELECT	p.title AS Playlist,
		p.datecreated AS DateCreated,
		COALESCE((	SELECT SUM(seconds) 
					FROM songs 
					JOIN playlists_detail pd ON pd.songid = s.songid 
					JOIN playlists p ON p.playlistid = pd.playlistid
					WHERE p.title = :playlistTitle),0) AS Playlist_Duration,
		COALESCE(s.title,'') AS Song_Title,
		s.seconds::VARCHAR(4) AS Song_Duration,
		mu.firstname||' '||mu.lastname AS Created_By
FROM 	playlists 			p 
JOIN 	music_users 		mu ON 	mu.userid = p.userid
LEFT JOIN playlists_detail 	pd ON 	pd.playlistid = p.playlistid
LEFT JOIN songs 			s ON	s.songid = pd.songid 
WHERE 	p.isdeleted = 'f' AND
		p.title = :playlistTitle;

SELECT	p.title AS Playlist,
		p.datecreated AS DateCreated,
		COALESCE((	SELECT SUM(seconds) 
					FROM songs 
					JOIN playlists_detail pd ON pd.songid = s.songid 
					JOIN playlists p ON p.playlistid = pd.playlistid
					WHERE p.title = 'Revolution Tunes'),0) AS Playlist_Duration,
		COALESCE(s.title,'') AS Song_Title,
		s.seconds::VARCHAR(4) AS Song_Duration,
		mu.firstname||' '||mu.lastname AS Created_By
FROM 	playlists 			p 
JOIN 	music_users 		mu ON 	mu.userid = p.userid
LEFT JOIN playlists_detail 	pd ON 	pd.playlistid = p.playlistid
LEFT JOIN songs 			s ON	s.songid = pd.songid 
WHERE 	p.isdeleted = 'f' AND
		p.title = 'Revolution Tunes';

CREATE TABLE movieGenres (
	genreID 	serial PRIMARY KEY,
	description	VARCHAR(25) NOT NULL
	--movieID 	INT NOT NULL REFERENCES movies (movieID)
);

CREATE TABLE movies (
   movieID 		serial PRIMARY KEY,
   title      	VARCHAR(50) NOT NULL,
   releaseDate 	DATE NOT NULL
   --genreID   	INT NOT NULL REFERENCES movieGenres (genreID)
);

CREATE TABLE listMoviesByGenre (
	genericID	serial PRIMARY KEY,
	movieID 	INT NOT NULL REFERENCES movies (movieID),
	genreID 	INT NOT NULL REFERENCES movieGenres (genreID)
);
