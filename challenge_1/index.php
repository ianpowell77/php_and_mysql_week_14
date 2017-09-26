<?php 
require("inc/db_inc.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Challenge 1 | States</title>
</head>
<body>
	<form>
		<select>
			<?php
				try {

					$sql = "SELECT `name` FROM `states`";

					$stmt = $db->query($sql);

					while($state = $stmt->fetch()){
						echo "<option>".$state["name"]."</option>";
					}

				} catch (PDOexception $e) {
					echo $e->getMessage();
				}
			?>
		</select>
	</form>
</body>
</html>