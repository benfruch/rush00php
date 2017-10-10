<?php
session_start();
include('./connect_bdd.php');
$login = $_SESSION['user_logged'];
$query = "SELECT `passwd` FROM Users WHERE `login` = '$login'";
if (!($result = mysqli_query($bdd, $query)))
	echo mysqli_error($bdd);
$tab = mysqli_fetch_all($result, MYSQLI_ASSOC);
$newpass = hash("whirlpool", $_POST['newpw']);
$oldpass = hash("whirlpool", $_POST['oldpw']);
foreach ($tab as $line) {
	if ($line['passwd'] === $oldpass) {
		$query = "UPDATE Users SET `passwd` = '$newpass'";
		if (!($result = mysqli_query($bdd, $query)))
			echo mysqli_error($bdd);
		$_SESSION['mdpc'] = "ok";
		header ("Location: $_SERVER[HTTP_REFERER]" );
	} else {
		$_SESSION['error'] = "error";
		header ("Location: $_SERVER[HTTP_REFERER]" );
	}
}
?>