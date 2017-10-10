<?php
session_start();

unset($_SESSION['panier'][$_GET['key_product']]);
$_SESSION['panier'] = array_merge(array_filter($_SESSION['panier']));
//echo  $_GET['id_product'];
//$_SESSION['panier'] = array();
header ("Location: $_SERVER[HTTP_REFERER]" );
?>