

SELECT	p.title AS Playlist,
		p.datecreated AS DateCreated,
		(	SELECT SUM(seconds) 
			FROM songs 
			JOIN playlists p ON p.songid = s.songid 
			WHERE p.title = :playlistTitle) AS Playlist_Duration,
		COALESCE(s.title,'') AS Song_Title,
		s.seconds::VARCHAR(4) AS Song_Duration,
		mu.firstname||' '||mu.lastname AS Created_By
FROM 	playlists 			p 
JOIN 	music_users 		mu ON 	mu.userid = p.userid
LEFT JOIN playlists_detail 	pd ON 	pd.playlistid = p.playlistid
LEFT JOIN songs 			s ON	s.songid = pd.songid 
WHERE 	p.isdeleted = 'f' AND
		p.title = :playlistTitle
