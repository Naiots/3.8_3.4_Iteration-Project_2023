<?php
	// Session start
	session_start();
	// If the user isnt't logged in, redirect them to the landing page
	if(!isset($_SESSION['login_user'])){
		header("location: index.php");
	}
	// Otherwise, store their first name into a dedicated variable for later use
	else{
		$User = $_SESSION['login_user'];
	}
?>

<!DOCTYPE html>
<!-- Define document language -->
<html lang="en">
	<head>
		
		<!-- Add a title so the user knows what page they're on even if they're in another page -->
		<title>Graeme's Music | Pop Songs</title>
		
		<!-- Setup Meta Data and let the browser know what charset is being used -->
		<meta charset="UTF-8">
        <meta name="description" content="Welcome to Graeme's Music! Relax, and let us take care of your musical needs.">
        <meta name="keywords" content="Music, Database, Graeme">
        <meta name="author" content="SJeames">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Setup and link all external css stylesheets -->
        <link rel="stylesheet" type="text/css" href="nav_1.css">
		<link rel="stylesheet" type="text/css" href="fonts.css">
		<link rel="stylesheet" type="text/css" href="divs.css">
		<link rel="stylesheet" href="splide/splide-default.min.css">
	</head>

	<body>
		<main>
			<div class = "wrapper">
				<div class = "nav">
					<?php
                        //Pulls the links from the nav.php page and places them in the navigation div
                        require 'nav_1.php'; //'require' is 100% needed for the site to run 
                    ?>
				</div>
				
				<!-- Empty div to space out the next divisions from the top -->
				<div id = "empty4"></div>
				
				<!-- Image and header to indicate what the query is -->
				<img src = "images/download.png" style = "width: 12vw; border: 2px; border-color: green; float: left; padding-left: 7.5vw; padding-right: 2vw; padding-bottom: 1.5vw;" alt = "image"> 
				<h1 style = "text-align: left; padding-top: 2vw;">Lorem Ipsum</h1>
				
				<?php
					// connect.php (tells where to connect servername, username, password, dbaseName)
					require "Music_Database_mysqli.php";
					
					// Calculates the total duration of the songs
					$query = ("SELECT SEC_TO_TIME(SUM(s.Duration)) AS Total_Time FROM song_details AS s");
					
					// Runs the query above
					$result = mysqli_query($conn,$query);
				
					// While loop to output the results				
					while($output=mysqli_fetch_array($result))
					{	
				?>
				
				<!-- Displays the result of the total time query -->
				<p style = "text-align: left;"><?php echo $output['Total_Time']; ?></p>
				
				<?php
					// Close the output while loop
					}
				?>
				
				<!-- "query" holds the page's main content -->
				<div class = "query">
					
					<!-- Each column heading -->
					<heading1>
						<Song_ID1><h3>#</h3></Song_ID1>
						<Title1><h3>TITLE</h3></Title1>
						<Artist1><h3>ARTIST</h3></Artist1>
						<Album1><h3>ALBUM</h3></Album1>
						<Genre1><h3>GENRE</h3></Genre1>
						<Duration1><h3>SECS</h3></Duration1>
						<Size1><h3>SIZE</h3></Size1>
					</heading1>

					<?php
						// connect.php (tells where to connect servername, username, password, dbaseName)
						require "Music_Database_mysqli.php";

						// Selects all available information on pop songs and groups Artists together aswell as Genres to avoid duplicated songs. Then orders the query by Song Title in a descending order (Primary) and then Artist Name in descending order (Secondary)
						$query = ("SELECT SongID, SongTitle, AlbumName, GROUP_CONCAT( DISTINCT ArtistName SEPARATOR ', ') AS ArtistNames, GenreList, Duration, Size
						FROM (
							SELECT DISTINCT song_details.Song_ID AS SongID, song_details.Title AS SongTitle, album_id.Album AS AlbumName, artist_id.Artist AS ArtistName, genre_id.Genre AS GenreList, song_details.Duration AS Duration, song_details.Size AS Size
							FROM song_details, song2artist, artist_id, album_id, genre_id, song2genre
							WHERE song_details.Song_ID = song2artist.Song_ID
							AND song2artist.Artist_ID = artist_id.Artist_ID
							AND song_details.Album_ID = album_id.Album_ID
							AND song_details.Song_ID = song2genre.Song_ID
							AND song2genre.Genre_ID = genre_id.Genre_ID
							AND genre_id.Genre IN ('Brit Pop', 'Dance', 'Goa Trance', 'Indie', 'Soul', 'New Wave', 'New Age', 'Pop', 'R&B')
							GROUP BY song_details.Song_ID, song_details.Title, album_id.Album, artist_id.Artist, genre_id.Genre, song_details.Duration, song_details.Size
						) AS SongList

						GROUP BY SongID, SongTitle, AlbumName, GenreList, Duration, Size
						ORDER BY SongTitle DESC, ArtistNames DESC");

						// Runs the query above
						$result = mysqli_query($conn,$query);

						// While loop to output the results	
						while($output=mysqli_fetch_array($result))
						{	
						?>

						<!-- Displays the output of the above query -->
						<heading2>
							<Song_ID2 style="padding-left: 0.4vw;"><p><?php echo $output['SongID']; ?></p></Song_ID2>
							<Title2><p><?php echo $output['SongTitle']; ?></p></Title2>
							<Artist2><p><?php echo $output['ArtistNames']; ?></p></Artist2>
							<Album2><p><?php echo $output['AlbumName']; ?></p></Album2>
							<Genre2><p><?php echo $output['GenreList']; ?></p></Genre2>
							<Duration2><p><?php echo $output['Duration']; ?></p></Duration2>
							<Size2><p><?php echo $output['Size']; ?></p></Size2>
						</heading2>
						<?php
							// Close the output while loop
							}
						?>
					
				</div>
				<?php
                    //Pulls the links from the nav.php page and places them in the navigation div
                    require 'footer.php'; //'require' is 100% needed for the site to run 
                ?>
			</div>
		</main>
	</body>
</html>
