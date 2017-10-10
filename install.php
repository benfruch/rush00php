
<?php

$connect = mysqli_connect('localhost', 'root', 'pass');
if (mysqli_connect_error()) {
	echo "Echec lors de la connexion à MySQL : (" . mysqli_connect_errno() . ") " . mysqli_connect_error() . "<br>";
}
else
{
	if (!mysqli_query($connect, "DROP DATABASE IF EXISTS rush"))
		echo mysqli_error($connect)."ERROR DROP DB<br>";
	if (!mysqli_query($connect, "CREATE DATABASE rush"))
		echo mysqli_error($connect)."ERROR CREATE DB<br>";
}
$bdd = mysqli_connect('localhost', 'root', 'pass', 'rush');
if (mysqli_connect_error()) {
	echo "Echec lors de la connexion à MySQL : (" . mysqli_connect_errno() . ") " . mysqli_connect_error() . "<br>";
}
else
{
	if (!mysqli_query($bdd, "DROP TABLE IF EXISTS Users") ||
		!mysqli_query($bdd, "DROP TABLE IF EXISTS Products") ||
		!mysqli_query($bdd, "DROP TABLE IF EXISTS Categories") ||
		!mysqli_query($bdd, "DROP TABLE IF EXISTS Admins"))
	{
		echo mysqli_error($bdd)."Erreur destruction de table<br>";
	}
	if (!mysqli_query($bdd, "CREATE TABLE Users(id INT PRIMARY KEY UNIQUE AUTO_INCREMENT NOT NULL, login VARCHAR(256) NOT NULL, passwd VARCHAR(256) NOT NULL, admin INT DEFAULT '0')"))
		echo "ERROR CREATE TABLE Users ".mysqli_error($bdd)." <br>";
	if (!mysqli_query($bdd, "CREATE TABLE Products(id INT PRIMARY KEY UNIQUE AUTO_INCREMENT NOT NULL, name VARCHAR(256), description VARCHAR(256), price DECIMAL(10, 2), image VARCHAR(256))"))
		echo "ERROR CREATE TABLE Products ".mysqli_error($bdd)." <br>";
	if (!mysqli_query($bdd, "CREATE TABLE Categories(id INT PRIMARY KEY UNIQUE AUTO_INCREMENT NOT NULL, name VARCHAR(256), id_Products INT)"))
		echo "ERROR CREATE TABLE Categories  ".mysqli_error($bdd)." <br>";
}

if (!file_exists('./images'))
	mkdir('./images');
$pass = hash("whirlpool", 'password');
if (!mysqli_query($bdd, "INSERT INTO Users(login, passwd, admin) VALUES ('First', '$pass', '0')"))
	echo mysqli_error($bdd)."<br>";
$pass = hash("whirlpool", 'Admin');
if (!mysqli_query($bdd, "INSERT INTO Users(login, passwd, admin) VALUES ('Admin', '$pass', '1')"))
	echo mysqli_error($bdd)."<br>";
if (!mysqli_query($bdd, "INSERT INTO Categories(name, id_Products) VALUES ('Auto', '0')"))
	echo mysqli_error($bdd)."<br>";
if (!mysqli_query($bdd, "INSERT INTO Categories(name, id_Products) VALUES ('Moto', '0')"))
	echo mysqli_error($bdd)."<br>";
if (!mysqli_query($bdd, "INSERT INTO Products(name, description, price, image) VALUES ('Voiture1', 'Voiture de qualite', 29.99, '/images/car1.jpg')"))
	echo mysqli_error($bdd)."<br>";
$id_Products = mysqli_insert_id($bdd);
if (!mysqli_query($bdd, "INSERT INTO Categories(name, id_Products) VALUES ('Auto', '$id_Products')"))
	echo mysqli_error($bdd)."<br>";
if (!mysqli_query($bdd, "INSERT INTO Products(name, description, price, image) VALUES ('Voiturtre2', 'Voiture de qualite moyenne', 29.99, '/images/car2.jpg')"))
	echo mysqli_error($bdd)."<br>";
$id_Products = mysqli_insert_id($bdd);
if (!mysqli_query($bdd, "INSERT INTO Categories(name, id_Products) VALUES ('Moto', '$id_Products')"))
	echo mysqli_error($bdd)."<br>";
if (!mysqli_query($bdd, "INSERT INTO Products(name, description, price, image) VALUES ('Voiturpre3', 'Voiture de qualite bof', 29.99, '/images/car3.jpg')"))
	echo mysqli_error($bdd)."<br>";
$id_Products = mysqli_insert_id($bdd);
if (!mysqli_query($bdd, "INSERT INTO Categories(name, id_Products) VALUES ('Moto', '$id_Products')"))
	echo mysqli_error($bdd)."<br>";
if (!mysqli_query($bdd, "INSERT INTO Categories(name, id_Products) VALUES ('Auto', '$id_Products')"))
	echo mysqli_error($bdd)."<br>";

echo "CREATION TERMINEE";
?>