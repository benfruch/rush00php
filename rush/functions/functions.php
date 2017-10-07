<?PHP

$con = mysqli_connect("localhost", "root", "", "42shop");

function getcategories(){
	
	global $con;

	$get_categories = "select * from categories";

	$run_categories = mysqli_query($con, $get_categories);
	while ($row_categories=mysqli_fetch_array($run_categories))
	{
		$categories_id = $row_categories['categorie_id'];
		$categories_title = $row_categories['categorie_title'];
		echo "<li><a href='#'>$categories_title</a></li>";
	}
}

?>
