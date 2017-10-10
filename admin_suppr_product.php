<?php
include('admin_init.php');
$id = $_GET['id_product'];
$query = "DELETE FROM Products WHERE `id` = $id";
if (!($result = mysqli_query($bdd, $query)))
	echo mysqli_error($bdd);
$query = "DELETE FROM Categories WHERE `id_Products` = $id";
if (!($result = mysqli_query($bdd, $query)))
	echo mysqli_error($bdd);
foreach($_SESSION['panier'] as $k => $item) {
	if ($item === $id) {
		unset($_SESSION['panier'][$k]);
	}
}
$_SESSION['panier'] = array_merge(array_filter($_SESSION['panier']));
header ("Location: $_SERVER[HTTP_REFERER]" );
?>