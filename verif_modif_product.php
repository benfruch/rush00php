<?php
//print_r($_POST);
include('./connect_bdd.php');
function verif_string($str){
	preg_match("/(([A-Za-z0-9\ \'.]))/",$str,$result);
	if (strlen($str) != count($result) || !empty($result))
			return (false);
	else
	  return true;

function verif_num($str){
	preg_match("/^([0-9])$/",$str,$result);
	if(!empty($result)){
		return false;
	}
	return true;
}

if ($_POST['name'] && $_POST['price_eur'] && $_POST['price_cent'] && $_POST['description'])
{
	if (!ctype_alnum($_POST['name']))
		header ("Location: $_SERVER[HTTP_REFERER]" );
	if(!verif_string($_POST['description']))
		header ("Location: $_SERVER[HTTP_REFERER]" );
	if (!verif_num($_POST['price_eur']))
		header ("Location: $_SERVER[HTTP_REFERER]" );
	if (!verif_num($_POST['price_cent']))
		header ("Location: $_SERVER[HTTP_REFERER]" );
	if (!file_exists('./images'))
		mkdir('./images');
	//echo $_POST['image'];
	//$data = telecharger();
	//if ($_POST['image'])
	//	if (!copy($_POST['image'], './images'))
	//		;//header ("Location: $_SERVER[HTTP_REFERER]" );
	//echo $_FILES[$_POST['image']]['name'];
	//echo $_FILES[$_POST['image']]['tmp_name'];
	//echo $_FILES[$_POST['image']]['size'];
	//echo $_FILES[$_POST['image']]['type'];
	//echo $_FILES[$_POST['image']]['error'];
	$name = $_POST['name'];
	$price_eur = $_POST['price_eur'];
	$price_cent = $_POST['price_cent'];
	$description = $_POST['description'];
	$price = $_POST['price_eur'] + ( $_POST['price_cent'] / 100);
	$id = $_GET['id_product'];
	$query = "UPDATE Products SET `name` = '$name', `description`  ='$description', `price` = '$price' WHERE `id`=$id";
	if (!($result = mysqli_query($bdd, $query)))
		echo mysqli_error($bdd);
	$query = "DELETE FROM Categories WHERE `id_products`=$id";
	if (!($result = mysqli_query($bdd, $query)))
		echo mysqli_error($bdd);
	if ($_POST['select0'])
	{
		$select = $_POST['select0'];
		$query = "INSERT INTO Categories(name, id_Products) VALUES ('$select', '$id')";
		if (!($result = mysqli_query($bdd, $query)))
			echo mysqli_error($bdd);
	}
	if ($_POST['select1'])
	{
		$select = $_POST['select1'];
		$query = "INSERT INTO Categories(name, id_Products) VALUES ('$select', '$id')";
		if (!($result = mysqli_query($bdd, $query)))
			echo mysqli_error($bdd);
	}
	if ($_POST['select2'])
	{
		$select = $_POST['select2'];
		$query = "INSERT INTO Categories(name, id_Products) VALUES ('$select', '$id')";
		if (!($result = mysqli_query($bdd, $query)))
			echo mysqli_error($bdd);
	}
	header ("Location: $_SERVER[HTTP_REFERER]" );

}
else
{
	header ("Location: $_SERVER[HTTP_REFERER]" );
}
?>
