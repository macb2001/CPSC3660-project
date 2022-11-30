<html>
	<head>
		<title>Fake Street Realty</title>
	</head>

	<style>
    button {height:30px;width:70px;font-size: 10px;color: black ;background-color: #1F70C1;}
    body {background-color: #f5f5dc;}
  </style>

	<center>
		<h1>Fake Street Realty</h1>
	  <h3>List all Properties</h3>
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
						<table border='6'>
							<tr>
								<th>Address</th>
								<th>Agent</th>
								<th>Client</th>
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
						 if ($data['sold']) {
						 	$sold = 'Yes';
							$sp = $data['sale_price'];
						} else {
							$sold = 'No';
							$sp = 'N/A';
						}
						$a_name = '';
						$c_name = '';
						$agSql = "SELECT name FROM PERSON WHERE id = '{$data['a_id']}';";
						if($conn->query($agSql)) {
							$agResult = $conn->query($agSql);
							$row = $agResult->fetch_assoc();
							$a_name = $row['name'];
						}
						$cliSql = "SELECT name FROM PERSON WHERE id = '{$data['c_id']}';";
						if($conn->query($cliSql)) {
							$cliResult = $conn->query($cliSql);
							$row = $cliResult->fetch_assoc();
							$c_name = $row['name'];
						}
						 echo "
							<tr>
								<td>{$data['address']}</td>
								<td>$a_name</td>
								<td>$c_name</td>
								<td>{$data['square_foot']}</td>
								<td>{$data['asking_price']}</td>
								<td>$sold</td>
								<td>{$data['const_date']}</td>
								<td>{$data['bedroom']}</td>
								<td>$sp</td>
								<td>{$data['bathroom']}</td>
								<td><button onclick='window.location.href=\"update_property.php?aid={$data['a_id']}&cid={$data['c_id']}&address={$data['address']}\";'>Update</button></td>
		            <td><button onclick='window.location.href=\"delete_property.php?aid={$data['a_id']}&cid={$data['c_id']}&address={$data['address']}\";'>Delete</button></td>
							</tr>
						 ";
					 }

					 echo "</table><br /><br />\n";
					 echo "<button style = \"height:50px;width:300px;font-size: 20px; margin: 10px;\" onclick='window.location.href=\"main.php\";'>Back</button>";

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
