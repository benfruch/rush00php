<?php
session_start();
include('./connect_bdd.php');
if (ctype_alnum($_POST['login']) && ctype_alnum($_POST['passwd'])) {
	$login = $_POST['login'];
	$passwd = $_POST['passwd'];
	$query = "SELECT `passwd` FROM Users WHERE `login` = '$login'";
	if (!($result = mysqli_query($bdd, $query)))
		echo mysqli_error($bdd);
	$tab_pass = mysqli_fetch_all($result, MYSQLI_ASSOC);
	if (!$tab_pass) {
		$_SESSION['error_connect'] = "error";
		header ("Location: $_SERVER[HTTP_REFERER]" );
	} else {
		foreach ($tab_pass as $line) {
			$line['passwd'] = hash("whirlpool", $passwd);
			$_SESSION['user_logged'] = $login;
			header("Location: index.php");
		}
	}
} else {
	$_SESSION['error_connect'] = "error";
	header ("Location: $_SERVER[HTTP_REFERER]" );
}
?>