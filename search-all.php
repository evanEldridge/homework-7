<!DOCTYPE html>
<html lang="en">
  <head>
		<title>My Movie Database (MyMDb)</title>
		<meta charset="utf-8" />
		<link href="https://cs293.watzekdi.net/images/kb/favicon.png" type="image/png" rel="shortcut icon" />

		<link href="bacon.css" type="text/css" rel="stylesheet" />
	</head>

    <body>
		<div id="frame">
			<div id="banner">
				<a href="mymdb.php"><img src="https://cs293.watzekdi.net/images/kb/mymdb.png" alt="banner logo" /></a>
				My Movie Database
			</div>

			<div id="main">
				<h1>Results for <?=$_GET['firstname']." ".$_GET['lastname'];?></h1>

<?php

include 'common.php';

$first = "'".$_GET['firstname']."%'";
$last = "'".$_GET['lastname']."'";

try {
  $stmt = $db->prepare("SELECT id FROM actors WHERE first_name LIKE $first AND last_name=$last ORDER BY film_count DESC, id");
  $stmt->execute();
  $id = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $identification = $id[0]["id"];

}

catch (Exception $e) {
  echo $e;
}

try {
  $stmt = $db->prepare("SELECT name, year FROM movies m JOIN roles r ON m.id=r.movie_id JOIN actors a ON r.actor_id=a.id WHERE a.id=$identification ORDER BY year DESC, name");
  $stmt->execute([$first]);
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

catch (Exception $e) {
  echo $e;
}

if ($rows == null) {
?>
  <p>Actor <?=$_GET['firstname']." ".$_GET['lastname'];?> not found</p>
<?php 
}
else {
?>
			<p>All Films</p>
      <table>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Year</th>
        </tr>
      <?php
        for ($i = 0; $i < count($rows); $i++) {
      ?>
        <tr>
          <td><?=$i+1?></td>
          <td><?=$rows[$i]["name"]?></td>
          <td><?=$rows[$i]["year"]?></td>
        </tr>
      <?php
        }
      ?>
      </table>
<?php } ?>
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
      </div>
    	<div id="w3c">
				<a href="https://validator.w3.org/"><img src="http://watzek.lclark.edu/cs/293spr2021/ex2/w3c-html.png" alt="Valid HTML5" /></a>
				<a href="https://jigsaw.w3.org/css-validator/"><img src="http://watzek.lclark.edu/cs/293spr2021/ex2/w3c-css.png" alt="Valid CSS" /></a>
		</div>
  </div>
</body>