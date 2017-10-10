<?php
  include('admin_init.php');

  if ($_POST['login'] != "" && $_POST['passwd'] != "")
  {
  	$i = 0;
  	$name = $_POST['login'];
  	$passwd = hash("whirlpool", $passwd);
    $admin = $_POST['choix'];
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
  if ($admin == 1){
  	$query = "INSERT INTO Users (login, passwd, admin) VALUES ('$name', '$passwd', '1')";
  }
  else {
    $query = "INSERT INTO Users (login, passwd, admin) VALUES ('$name', '$passwd', '0')";
  }
  	if (!($result = mysqli_query($bdd, $query)))
  		echo mysqli_error($bdd);
  }
  if ($i === 0){
  	header("Location: admin_add_user.php");
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
        <h2>Ajouter un utilisateur</h2>
				<form method="POST" action="admin_add_user.php" >
					Quel est le nom de l'utilisateur ? <br />
            <input type="login" name="login">
					<br>Quel est le mot de passe de l'utilisateur ? <br />
            <input type="password" name="passwd">
					<br>
          <br>L'utilisateur est il administrateur ? <br />
            <INPUT type="checkbox" name="choix" value="1"> oui
            <INPUT type="checkbox" name="choix" value="0"> non

					<br>
					<input type="submit" name="submit" value="Ajouter">
				</form>
			</div>

	<div id="footer">© gauffret & bfruchar - 2017</div>

	</div>

</div>
</body>
</html>
