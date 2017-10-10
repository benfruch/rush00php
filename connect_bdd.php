<?php
$bdd = mysqli_connect('localhost', 'root', 'pass', 'rush');
if (mysqli_connect_error()) {
echo "Echec lors de la connexion à MySQL : (" . mysqli_connect_errno() . ") " . mysqli_connect_error() . "<br>";
}
?>