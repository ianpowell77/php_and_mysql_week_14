<?php
require("inc/db_inc.php");

	if(isset($_POST["name"]) && $_POST["submit"] == "Submit"){
		try{
			$sql = "INSERT INTO products (product_name, description, price, color)";
			$sql .= "VALUES(:name, :description, :price, :color)";
			$stmt = $db->prepare($sql);
			$stmt->execute(array(
		      ':name' => $_POST["name"],
		      ':description' => $_POST["description"],
		      ':price' => $_POST["price"],
		      ':color' => strtolower($_POST["color"]),
		    ));
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Challenge 3 | SQL</title>
</head>
<body>
	<h1>Insert something into the database</h1>
	<form action="#" method="POST">
		<label for="name">Product Name: </label>
		<input type="text" name="name" id="name">
		<label for="description">Description: </label>
		<input type="text" name="description" id="description">
		<label for="price">Price: </label>
		<input type="text" name="price" id="price">
		<label for="color">Color: </label>
		<input type="text" name="color" id="color">
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>