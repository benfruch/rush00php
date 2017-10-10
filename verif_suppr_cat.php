<?php
include('./connect_bdd.php');
$name = $_POST['categorie'];
$query = "UPDATE Categories SET `name` = 'Autre' WHERE `name`='$name'";
if (!($result = mysqli_query($bdd, $query)))
	echo mysqli_error($bdd);
header ("Location: $_SERVER[HTTP_REFERER]" );
?>