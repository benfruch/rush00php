<?php
include('admin_init.php');
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
				  <h2>Supprimer une categorie</h2>
				<form method="POST" action="verif_suppr_cat.php" >
					Quelle categorie souhaitez vous supprimer ? <br />
					<select name="categorie">
					<?php
					$query = "SELECT DISTINCT name FROM Categories";
					if (!($result = mysqli_query($bdd, $query)))
						echo mysqli_error($bdd);
					$tab_categorie = mysqli_fetch_all($result, MYSQLI_ASSOC);

					foreach ($tab_categorie as $line) {
						$cat = $line['name'];
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
