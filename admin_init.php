<?php
session_start();
include('./connect_bdd.php');
$login = $_SESSION['user_logged'];
$query = "SELECT `admin` FROM Users WHERE `login` = '$login'";
if (!($result = mysqli_query($bdd, $query)))
	echo mysqli_error($bdd);
$tab = mysqli_fetch_all($result, MYSQLI_ASSOC);
$admin = 0;
foreach ($tab as $line) {
	if ($line['admin'] == 1) {
		$admin = 1;
	}
}
if ($admin != 1)
	header("Location: forbidden_access.php");
?>