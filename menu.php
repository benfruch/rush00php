<?php
$text = $_SERVER['REQUEST_URI'];
$text = substr($text, 1);
$text = explode(".", $text);
$page = $text[0];
?>
<div class="main_header">

	<img id='image_top' src="images/download.png" />
	<img id='image_top' src="images/download.png" />
	<img id='image_top' src="images/download.png" />
	<img id='image_top' src="images/download.png" />
	<img id='image_top' src="images/download.png" />
	<img id='image_top' src="images/download.png" />
	<img id='image_top' src="images/download.png" />
	<img id='image_top' src="images/download.png" />
	<img id='image_top' src="images/download.png" />
	<img id='image_top' src="images/download.png" />

	<div class="page_menu">
		<ul id="menu_d">
			<li><a href="index.php" <?php if ($page === "index") { echo 'class="actual_page"';} ?> >Home</a></li>
			<li><a href="all_products.php" <?php if ($page === "all_products") { echo 'class="actual_page"';} ?> >Tous les produits</a></li>
			<?php
			$total = 0;
			if ($_SESSION['panier']) {
				foreach ($_SESSION['panier'] as $k => $v) {
					$query = "SELECT `price` FROM Products WHERE `id` = '$v'";
					if (!($result = mysqli_query($bdd, $query)))
						echo mysqli_error($bdd);
					$tab = mysqli_fetch_all($result, MYSQLI_ASSOC);
					foreach ($tab as $line) {
						$total += $line['price'];
					}
				}
			}
			else
				$total = 0;
			echo '<li><a href="panier.php"';
			if ($page === "panier") { echo 'class="actual_page"';}
			echo '>Ma liste: '.$total.' €</a></li>';
			if (!$_SESSION['user_logged']) {
				echo '<li><a href="inscription.php"';
				if ($page === "inscripton") { echo 'class="actual_page"';}
				echo '>Inscription</a></li>';
				echo '<li><a href="connect.php"';
				if ($page === "connect") { echo 'class="actual_page"';}
				echo '>Se connecter</a></li>';
			} else{
				echo '<li><a href="#"';
				$login = $_SESSION['user_logged'];
				if ($page === "account") { echo 'class="actual_page"';}
				echo '<li><a href="account.php"';
				echo '>Mon compte</a></li>';
				$query = "SELECT `admin` FROM Users WHERE `login` = '$login'";
				if (!($result = mysqli_query($bdd, $query)))
					echo mysqli_error($bdd);
				$tab = mysqli_fetch_all($result, MYSQLI_ASSOC);
				foreach ($tab as $line) {
					if ($line['admin'] == 1) {
						echo '<li><a href="admin_index.php"';
						if ($page === "admin_index") { echo 'class="actual_page"';}
						echo '>Administrer</a></li>';
					}
				}
				//ajouter un liens pour rejoindre la page de modif
				echo '<li><a href="deconnect.php"';
				if ($page === "deconnect") { echo 'class="actual_page"';}
				echo '>Deconnexion</a></li>';
			}
			?>
		</ul>
	</div>

</div>
