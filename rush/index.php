<!DOCTYPE>

<?PHP
include("functions/functions.php");
?>

<html>
<head>
<title>Shop 42</title>
<link rel="stylesheet" href="styles/style.css">
</head>

<body>

<div class="main">

<div class="main_header">

<img id='image_top' src="images/download.png" />
<img id='image_top' src="images/download.png" />
<img id='image_top' src="images/download.png" />
<img id='image_top' src="images/download.png" />
<img id='image_top' src="images/download.png" />
<img id='image_top' src="images/download.png" />
<img id='image_top' src="images/download.png" />
<img id='image_top' src="images/download.png" />
<img id='image_top' src="images/download.png" />
<img id='image_top' src="images/download.png" />

	<div class="page_menu">

		<ul id="menu_d">
			<li><a href="#">Home</a></li>
			<li><a href="#">All Products</a></li>
			<li><a href="#">My account</a></li>
			<li><a href="#">Sign up</a></li>
			<li><a href="#">Shopping Cart</a></li>
		</ul>
	</div>

</div>
<div class="center">

	<div id="left">
	
		<div id="left_title">Categories</div>
			
		<ul id="categories">
			
			<?PHP getcategories(); ?>
			
		</ul>
		
		<div id="left_title">Brands</div>
			
		<ul id="categories">
			
			<li><a href="#">Apple</a>"</li>
			<li><a href="#">Total</a>"</li>
			<li><a href="#">42</a>"</li>
			<li><a href="#">Peugeot</a>"</li>
			<li><a href="#">Renault</a>"</li>
		</ul>
	</div>

	<div id="products_area">This is content area</div>

	<div id="footer">This is the footer</div>

</div>

</div>
</body>
</html>
