<!DOCTYPE html>
<html>
	<head>
		<title>My Movie Database (MyMDb)</title>
		<meta charset="utf-8" />
		<link href="https://cs293.watzekdi.net/images/kb/favicon.png" type="image/png" rel="shortcut icon" />

		<!-- Link to your CSS file that you should edit -->
		<link href="bacon.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div id="frame">
			<div id="banner">
				<a href="mymdb.php"><img src="https://cs293.watzekdi.net/images/kb/mymdb.png" alt="banner logo" /></a>
				My Movie Database
			</div>

			<div id="main">
				<h1>The One Degree of Kevin Bacon</h1>
				<p>Type in an actor's name to see if he/she was ever in a movie with Kevin Bacon!</p>
				<p><img src="https://cs293.watzekdi.net/images/kb/kevin_bacon.jpg" alt="Kevin Bacon" /></p>

				<!-- form to search for every movie by a given actor -->
				<form action="search-all.php" method="get">
					<fieldset>
						<legend>All movies</legend>
						<div>
							<input name="firstname" type="text" size="12" placeholder="first name" autofocus="autofocus" /> 
							<input name="lastname" type="text" size="12" placeholder="last name" /> 
							<input type="submit" value="go" />
						</div>
					</fieldset>
				</form>

				<!-- form to search for movies where a given actor was with Kevin Bacon -->
				<form action="search-kevin.php" method="get">
					<fieldset>
						<legend>Movies with Kevin Bacon</legend>
						<div>
							<input name="firstname" type="text" size="12" placeholder="first name" /> 
							<input name="lastname" type="text" size="12" placeholder="last name" /> 
							<input type="submit" value="go" />
						</div>
					</fieldset>
				</form>
			</div> <!-- end of #main div -->
		
			<div id="w3c">
				<a href="https://validator.w3.org/"><img src="http://watzek.lclark.edu/cs/293spr2021/ex2/w3c-html.png" alt="Valid HTML5" /></a>
				<a href="https://jigsaw.w3.org/css-validator/"><img src="http://watzek.lclark.edu/cs/293spr2021/ex2/w3c-css.png" alt="Valid CSS" /></a>
			</div>
		</div> <!-- end of #frame div -->
	</body>
</html>
