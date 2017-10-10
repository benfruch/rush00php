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
					<h2>Modifier ou supprimer un article</h2>
					<div id="products">
						<?php
						$query = "SELECT `id`, `name`, `price`, `image`, `description` FROM Products";
						if (!($result = mysqli_query($bdd, $query)))
							echo mysqli_error($bdd);
						$tab = mysqli_fetch_all($result, MYSQLI_ASSOC);
						foreach ($tab as $line) {
							echo '
							<div id="product_adm">
								<h3>'.$line["name"].'</h3>
								<img  id="image_article_adm" src="'.$line["image"].'" alt="'.$line["name"].'" title="'.$line["description"].'">
								<p class="price">'.$line["price"].' €</p>
								<p class="price"><a href="admin_modif_product.php?id_product='.$line['id'].'"><img id="image_adm" title="Modifier" src="images/edit.png"></a></p>
								<p class="price"><a href="admin_suppr_product.php?id_product='.$line['id'].'"><img id="image_adm" title="Supprimer" src="images/rubbish-bin.png"></a>
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
