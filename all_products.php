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
					<div id="left_title">Categories</div>
					<ul id="categories">
						<?php
						$query = "SELECT DISTINCT name FROM Categories";
						if (!($result = mysqli_query($bdd, $query)))
							echo mysqli_error($bdd);
						$tab_categorie = mysqli_fetch_all($result, MYSQLI_ASSOC);
						foreach ($tab_categorie as $line) {
							echo '<li><a href="all_products.php?categorie='.$line["name"].'">'.$line["name"].'</a></li>';
						}
						?>
					</ul>
				</div>

				<div id="products_area">
					<div>
					</div>
					<div id="products">
						<?php
						$query = "SELECT `Products`.`id`, `Products`.`name`, `Products`.`price`, `Products`.`image`, `Products`.`description`  FROM Products, Categories WHERE '$categorie' = `Categories`.`name` AND `Categories`.`id_Products` = `Products`.`id`";
						if (!($result = mysqli_query($bdd, $query)))
							echo mysqli_error($bdd);
						$tab = mysqli_fetch_all($result, MYSQLI_ASSOC);
						foreach ($tab as $line) {
							echo '
							<div id="product_b">
								<h3>'.$line["name"].'</h3>
								<img src="'.$line["image"].'" alt="'.$line["name"].'" title="'.$line["description"].'">
								<p class="price">'.$line["price"].' €</p>
								<a href="add_panier.php?id_product='.$line["id"].'"><button class="button">Ajouter au panier</button></a>
								<a class="plus_infos" href="#">Plus d\'infos</a>
						</div>';
						}
						?>
					</div>

				</div>

				<div id="footer">© gauffret & bfruchar - 2017</div>

			</div>

		</div>
	</body>
</html>
