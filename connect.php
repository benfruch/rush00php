<?PHP
session_start();
// a modifier si l'utilisateur est log
include('./connect_bdd.php');
?>

<html>
	<head>
		<title>Shop 42</title>
		<link rel="stylesheet" href="styles/style.css">
		<link rel="icon" href="images/download.png" />

	</head>
	<body>
		<div class="main">
			<?php include('./menu.php'); ?>
			<div class="center">
				<div id="left">

				</div>

				<div id="products_area">
          <?php
      		if ($_SESSION['error_connect'] === "error")
      			echo "Login ou mot de passe incorrect <br />";
      		$_SESSION['error_connect'] = "";
      		?>
      		<h2>Se connecter</h2>
      		<form method="POST" action="verif_connect.php">
      			Identifiant: <input type="text" name="login" placeholder="login" value=""/>
      			<br />
      			Mot de passe: <input type="password" name="passwd" placeholder="passwd" value=""/>
      			<br />
      			<input type="submit" name="submit" value="OK" />
      		</form>
					</div>

				<div id="footer">© gauffret & bfruchar - 2017</div>

			</div>

		</div>
	</body>
</html>
