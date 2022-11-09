<html>
	<head>
		<title>Fake Street Realty</title>
	</head>

	<center>
		<body>
			<?php
			if (isset($_COOKIE["username"])) {
				$username = $_COOKIE["username"];
				$password = $_COOKIE["password"];

				$conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
				if($mysqli->connect_errno) {
					echo "Connection Issue!";
					exit;
				}

				$sql = "SELECT address, a_id, c_id, square_foot, asking_price, sold,
				 const_date, bedroom, sale_price, bathroom FROM PROPERTY;";

				if($conn->query($sql)) {
					$result = $conn->query($sql);
					 echo "
						<table border='1'>
							<tr>
								<th>Address</th>
								<th>a_id</th>
								<th>c_id</th>
								<th>Square foot</th>
								<th>Asking price</th>
								<th>Sold</th>
								<th>Construction date</th>
								<th>Bedrooms</th>
								<th>Sale price</th>
								<th>Bathrooms</th>
							</tr>
					 ";

					 foreach ($result as $data) {
						 echo "
							<tr>
								<td>{$data['address']}</td>
								<td>{$data['a_id']}</td>
								<td>{$data['c_id']}</td>
								<td>{$data['square_foot']}</td>
								<td>{$data['asking_price']}</td>
								<td>{$data['sold']}</td>
								<td>{$data['const_date']}</td>
								<td>{$data['bedroom']}</td>
								<td>{$data['sale_price']}</td>
								<td>{$data['bedroom']}</td>
								<td><a href='update_property.php?aid={$data['a_id']}&cid={$data['c_id']}&address={$data['address']}'>Update</a></td>
								<td><a href='delete_property.php?aid={$data['a_id']}&cid={$data['c_id']}&address={$data['address']}'>Delete</a></td>
							</tr>
						 ";
					 }

					 echo "</table><br /><br />\n";
					 echo "<a href='main.php'>Back</a>";

				 } else {
					 $err = $conn->errno;
					 echo "<p>MySQL error code $err </p>";
				 }



			} else {
				echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
			}

			if(isset($conn)) {
				$conn = null;
			}
			?>
		</body>
	</center>
</html>
