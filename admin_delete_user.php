<?php
include('admin_init.php');
$name = $_POST['login'];
$query = "DELETE FROM Users WHERE `login`='$name'";
if (!($result = mysqli_query($bdd, $query)))
	echo mysqli_error($bdd);

?>

<html>
	<head>
		<title>Admin</title>
		<link rel="stylesheet" href="styles/style.css">
	</head>

	<body>

		<div class="main">
			<?php
			include('./menu.php');
			include('./admin_menu.php');
			?>



			<div id="products_area">
				  <h2>Supprimer un utilisateur</h2>
				<form method="POST" action="admin_delete_user.php" >
					Quel utilisateur souhaitez vous supprimer ? <br />
					<select name="login">
					<?php
					$query = "SELECT DISTINCT login FROM Users";
					if (!($result = mysqli_query($bdd, $query)))
						echo mysqli_error($bdd);
					$tab_categorie = mysqli_fetch_all($result, MYSQLI_ASSOC);

					foreach ($tab_categorie as $line) {
						$cat = $line['login'];
						echo '<option value="'.$cat.'">'.$cat.'</option>';
					}
					echo '</select>';
					?>
					<br>
					<br>
					<input type="submit" value="Supprimer">
				</form>
			</div>


	<div id="footer">© gauffret & bfruchar - 2017</div>

	</div>

</div>
</body>
</html>
