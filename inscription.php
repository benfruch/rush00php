<?PHP
session_start();
include('./connect_bdd.php');

if ($_POST['login'] != "" && $_POST['passwd'] != "")
{
	$i = 0;
	$name = $_POST['login'];
	$passwd = hash("whirlpool", $passwd);
	$query = "SELECT `login` FROM Users";
	if (($result = mysqli_query($bdd, $query)))
		echo mysqli_error($bdd);
	$tab_pass = mysqli_fetch_all($result, MYSQLI_ASSOC);
	foreach ($tab_pass as $line) {
		if ($line === $name){
			echo "Ce nom d'utilisateur est deja utilise";
			$i = 1;
	}
}
	$query = "INSERT INTO Users (login, passwd, admin) VALUES ('$name', '$passwd', '0')";
	if (!($result = mysqli_query($bdd, $query)))
		echo mysqli_error($bdd);
}
if ($i === 0){
	header("Location: connect.php");
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
          <h2>Creer un compte</h2>
          <form method="POST" action="inscription.php">
            Identifiant : <input type="text" name="login" placeholder="login" maxlength="9" value=""/>
            <br />
            Mot de passe : <input type="password" name="passwd" maxlength="9" placeholder="passwd" value="" style="required pattern="[a-zA-Z0-9]+";"/>
            <br />
            <input type="submit" name="submit" value="OK" />
          </form>
					</div>

				<div id="footer">© gauffret & bfruchar - 2017</div>

			</div>

		</div>
	</body>
</html>
