<?php
$query = "SELECT admin FROM Users WHERE login = $_SESSION['user_logged']";
if (!($result = mysqli_query($bdd, $query)))
	echo mysqli_error($connect);
?>