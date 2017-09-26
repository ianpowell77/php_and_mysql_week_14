<?php
	require("inc/db_inc.php");

	try {
		$sql = "SELECT DISTINCT color FROM `products`";

		$stmt = $db->query($sql);

		$selectInnerHTML = "";

		while($row = $stmt->fetch()){
			$selectInnerHTML .= '<option value="'
			.$row["color"]
			.'">'
			.$row["color"]."</option>";
		}

	} catch(PDOException $e) {
		echo $e->getMessage();
	}

	if(isset($_POST["color"]) && $_POST["submit"] == "Submit"){
		try{
			$sql = 'SELECT * FROM products WHERE `color` = \'' . $_POST["color"] . '\'';
			$stmt = $db->query($sql);

			while($row = $stmt->fetch()){
				$selectQueriedHTML .= "<li> Product Name: ".$row["product_name"]." Product Description: "
				.$row["description"]." Price: ".$row["price"]."</li>";
			}

		} catch(PDOException $e){
			echo $e->getMessage();
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="POST">
		<select name="color">
			<?= $selectInnerHTML; ?>
		</select>
		<input type="submit" name="submit" value="Submit">
	</form>

	<h2>Results</h2>
	<ul>
		<?= $selectQueriedHTML ?>
	</ul>
</body>
</html>