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
				<?php
				$id = $_GET['id_product'];
				$query = "SELECT `name`, `price`, `image`, `description` FROM Products WHERE `id`='$id'";
				if (!($result = mysqli_query($bdd, $query)))
					echo mysqli_error($bdd);
				$tab = mysqli_fetch_all($result, MYSQLI_ASSOC);
				foreach ($tab as $line) {
					$name = $line['name'];
					$price_eur = intval($line['price']);
					$price_cent = substr($line['price'], strpos($line['price'], '.')+1);
					$image = $line['image'];
					$description = $line['description'];
				}
				$query = "SELECT `name` FROM Categories WHERE `id_Products` = '$id'";
				if (!($result = mysqli_query($bdd, $query)))
					echo mysqli_error($bdd);
				$tab = mysqli_fetch_all($result, MYSQLI_ASSOC);
				$categorie = array();
				foreach ($tab as $line) {
					$categorie[] = $line['name'];
				}
				echo '<form method="POST" action="verif_modif_product.php?id_product='.$id.'" >';
				?>
					Nom de l'article :
					<input type="text" value="<?php echo $name; ?>" maxlength="15" name="name">
					<br>
					<img  id="image_article_adm" src='<?php echo $image; ?>' name="image"></img>
					<br />

					Image :
					<input type="file" accept=".jpg, .jpeg, .png" name="image">
					<br>

					Prix :
					<input type="number" value="<?php echo $price_eur; ?>" min="0" max="99999" name="price_eur">.
			<select name="price_cent">
				<?php
				for ($i = 0 ; $i < 100 ; $i++)
				{
					if ($price_cent == $i)
						echo '<option selected value="'.$i.'">'.$i.'</option>';
					else
						echo '<option value="'.$i.'">'.$i.'</option>';
				}
				?>
			</select> €
					<br>
					Description :
					<textarea maxlength="150" style="height:60px; width:240px; resize:none;" name="description"><?php echo $description; ?></textarea>
					<br>
					Categorie :
					<?php
						$query = "SELECT DISTINCT name FROM Categories";
						if (!($result = mysqli_query($bdd, $query)))
							echo mysqli_error($bdd);
						$tab_categorie = mysqli_fetch_all($result, MYSQLI_ASSOC);
						$i = 0;
						while ($i < 3) {
							echo '<select name="select'.$i.'">';
							if (!$categorie[$i])
								echo '<option selected value=""></option>';
							else
								echo '<option value=""></option>';
							foreach ($tab_categorie as $line) {
								$cat = $line['name'];
								if ($categorie[$i] === $cat) {
									echo '<option selected value="'.$cat.'">'.$cat.'</option>';
								} else {
									echo '<option value="'.$cat.'">'.$cat.'</option>';
								}
							}
							echo '</select>';
							$i++;
						}
					?>
					<br>
					<br>
				<input type="submit" value="Ok">
				</form>
		</div>


		</div>

	</div>

<div id="footer">© gauffret & bfruchar - 2017</div>

</div>

</div>
</body>
</html>
