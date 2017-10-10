<?PHP
session_start();
// a modifier si l'utilisateur est log
include('./connect_bdd.php');
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
					<?php echo "Forbidden Access <br />"; ?>

				</div>

				<div id="footer">© gauffret & bfruchar - 2017</div>

			</div>

		</div>
	</body>
</html>
