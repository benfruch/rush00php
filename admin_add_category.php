<?php
  include('admin_init.php');

  if ($_POST['submit'] == "Creer" && $_POST['categorie'] != "")
  {
    $categorie = $_POST['categorie'];
    $query = "INSERT INTO Categories (name, id_Products) VALUES ('$categorie', '0');";
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
        <h2>Ajouter une categorie</h2>
				<form method="POST" action="admin_add_category.php" >
					Quelle categorie souhaitez vous ajouter ? <br />
            <input type="text" name="categorie">
					<br>
					<input type="submit" name="submit" value="Creer">
				</form>
			</div>

	<div id="footer">© gauffret & bfruchar - 2017</div>

	</div>

</div>
</body>
</html>
