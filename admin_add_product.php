<?php
include('admin_init.php');

function verif_string($str){
	preg_match("/(([A-Za-z0-9\ \'.]))/",$str,$result);
	if (strlen($str) != count($result) || !empty($result))
			return (false);
	else
	  return true;
}

if ($_POST['name'] && $_POST['description'])
{
	if (!ctype_alnum($_POST['name']))
		header ("Location: admin_add_product.php" );
	if(!ctype_alnum($_POST['description']))
		header ("Location:admin_add_product.php" );
	}

if ($_POST['name'] != "" && $_POST['price_eur'] != "" && $_POST['submit'] == "Ok")
{
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price_eur'];
	$cat = "Autre";
	if (!($_POST['photo']))
		$photo = 'images/sorry.png';
	else {
		$photo = $_POST['photo'];
	}

	$query = "INSERT INTO Products (name, description, price, image) VALUES ('$name', '$description', '$price', '$photo')";
	if (!($result = mysqli_query($bdd, $query)))
		echo mysqli_error($bdd);
	$id_Products = mysqli_insert_id($bdd);
	$query = "INSERT INTO Categories (name, id_Products) VALUES ('$cat', '$id_Products')";
	if (!($result = mysqli_query($bdd, $query)))
		echo mysqli_error($bdd);
	$query = "INSERT INTO Categories (name, id_Products) VALUES ('$cat', '$id_Products')";
	if (!($result = mysqli_query($bdd, $query)))
		echo mysqli_error($bdd);
	$query = "INSERT INTO Categories (name, id_Products) VALUES ('$cat', '$id_Products')";
		if (!($result = mysqli_query($bdd, $query)))
			echo mysqli_error($bdd);
}
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
				<h2>Ajouter un article</h2>
				<form action="admin_add_product.php" maxlength="10" method="POST">
					Nom de l'article :
					<input type="text" value="" maxlength="15" name="name">
					<br>
					Photo :
					<input type="text" value="" maxlength="20" name="photo">
					<br>

					Prix :
					<input type="number" value="" min="0" max="99999" name="price_eur">
					<br>
					Description :
					<textarea maxlength="15" style="height:60px; width:240px; resize:none;" name="description"></textarea>
					<br>
					<br>
				<input type="submit" name="submit" value="Ok">
				</form>
		</div>


<div id="footer">© gauffret & bfruchar - 2017</div>

</div>

</div>
</body>
</html>
