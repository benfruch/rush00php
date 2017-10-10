<?PHP
session_start();
// a modifier si l'utilisateur est log
include('./connect_bdd.php');
if (!$_GET['categorie'])
	$categorie = '';
else {
	$query = "SELECT DISTINCT name FROM Categories";
	if (!($result = mysqli_query($bdd, $query)))
		echo mysqli_error($bdd);
	$tab_categorie = mysqli_fetch_all($result, MYSQLI_ASSOC);
	foreach ($tab_categorie as $name) {
		if (strtolower($_GET['categorie']) === strtolower($name['name']))
			$categorie = $name['name'];
	}
	if (!$categorie)
		$categorie = '';
}
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
					if ($_SESSION['mdpc']) {
						echo "Mot de passe modifie <br ?>";
						unset($_SESSION['mdpc']);
					} else if ($_SESSION['error']) {
						echo "Ancien mot de passe incorrect <br />";
						unset($_SESSION['error']);
					}
					?>
					<form method="POST" action="modif_mdp.php">
						Bonjour
						<br>
						Si vous souhaitez modifier votre mot de passe :
						<br>
						Ancien mot de passe :
						<br>
						<input type="password" name="oldpw" value="">
						<br>
						Nouveau mot de passe :
						<br>
						<input type="password" name="newpw" value="">
						<br>
						<input type="submit" value="Ok">
					</form>

				</div>

				<div id="footer">© gauffret & bfruchar - 2017</div>

			</div>

		</div>
	</body>
</html>
