<?php
	require("inc/db_inc.php");

	$selectInnerHTML = 'test';

	try {
		$sql = "SELECT DISTINCT color FROM `products`";

		$stmt = $db->query($sql);

		if($stmt) {
			$selectInnerHTML = "query successful";
		} else {
			$selectInnerHTML = "query failed";
		}

		// while($row = $stmt->fetch()){
		// $selectInnerHTML .= "<option>".$row["color"]."</option>";
		// }

	} catch(PDOexception $e) {
		echo $e->getMessage();
	} 
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php echo $selectInnerHTML ?>
	<form>
		<!-- <select>
		</select> -->
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>