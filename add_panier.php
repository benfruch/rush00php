<?php
session_start();
$_SESSION['panier'][] = $_GET['id_product'];
//echo  $_GET['id_product'];
//$_SESSION['panier'] = array();
header ("Location: $_SERVER[HTTP_REFERER]" );
?>