<html>
	<head>
		<title>Fake Street Realty</title>
	</head>

	<center>
		<h1>Update Property</h1>
		<body>



						<form action="updateproperty.php" method=post onsubmit="validateSubmission()">

							<?php

							$gcid = $_GET['cid'];
 							$gaid = $_GET['aid'];
							$gaddress = $_GET['address'];

							if (isset($_COOKIE["username"])) {
								$username = $_COOKIE["username"];
								$password = $_COOKIE["password"];
								$conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
								if($mysqli->connect_errno) {
									echo "Connection Issue!";
									exit;
								}
							$sql = "SELECT * FROM PROPERTY WHERE a_id = '$gaid' AND c_id = '$gcid' AND address = '$gaddress';";
							if($conn->query($sql)) {
							$result = $conn->query($sql);
							$row = $result->fetch_assoc();
							$old_askingprice = $row['asking_price'];
							$old_const_date = $row['const_date'];
							$old_bedroom = $row['bedroom'];
							$old_bath = $row['bathroom'];
							
							}

							$sql = "SELECT id, name FROM CLIENT, PERSON WHERE id = c_id;";
							echo "Select a Client <select name='cid' id='cid' value = '$gcid'>";

							if($conn->query($sql)) {
								$result = $conn->query($sql);
								foreach ($result as $data) {
									echo "<option value='{$data['id']}'";
									if($data['id'] == $gcid) {
										echo"selected";
									}
									echo">{$data['name']}</option>";
								}
								echo "</select><br><br>";

								}

								$sql = "SELECT id, name FROM AGENT, PERSON WHERE id = a_id;";
								echo "Select a Agent <select name='aid' id='aid'>";

								if($conn->query($sql)) {
									$result = $conn->query($sql);
									foreach ($result as $data) {
										echo "<option value='{$data['id']}'";
										if($data['id'] == $gaid) {
											echo"selected";
										}
										echo ">{$data['name']}</option>";
									}
									echo "</select><br><br>";

									}


								else {
					 	 		$err = $conn->errno;
					 	 		echo "<p>MySQL error code $err </p>";
					  	}

						} else {
					 			echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
					 		}
								if(isset($conn)) {
									$conn = null;
							}

							echo"
							Address: <input type=text name='address' size=20 value = '$gaddress' required required><br><br>
							Asking Price: $<input type=number name='askingprice' value = '$old_askingprice' size=20 min = '0' required><br><br>
							<div = 'soldBox'>
								<input type='checkbox' id='sold' name='sold' onclick='promptSold(this)''>
									<label for='sold'>Sold</label><br>
							</div><br>
							<div id = 'salepricePrompt' style = 'display: none'>
								Sale Price: $<input type=number name='saleprice' id = 'saleprice' size=20 min = '0'><br><br>
							</div>
							Squarefootage: <input type=number name='sqrft' size=20 min = '0' required>
								<label>sq. ft.</label><br><br>
							Number of Beds: <input type=number name='bedrooms' value = '$old_bedroom'size=20 min = '0' required><br><br>
							Number of Baths: <input type=number name='bathrooms' value = '$old_bath' size=20 min = '0' required><br><br>
							Date constructed: <input type=date name='constdate' size=20 required><br><br>

							<input type=submit name='submit' value='Submit'></form>";

							?>



		</body>
	</center>
</html>
