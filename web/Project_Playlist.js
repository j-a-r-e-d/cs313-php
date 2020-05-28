const artists = document.getElementById('artists');
const albums = document.getElementById('albums');
const songs	= document.getElementById('songs');
const genres = document.getElementById('genres');
const playlists = document.getElementById('playlists');

let results = document.getElementById('results');

genres.addEventListener('click', function(){
	results.innerHTML = genre.value;
})

