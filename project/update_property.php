<html>

<head>
	<title>Fake Street Realty</title>
</head>
<style>
	button {
		height: 50px;
		width: 300px;
		font-size: 20px;
		margin: 10px;
		color: black;
		background-color: #1F70C1;
	}

	body {
		background-color: #f5f5dc;
	}
</style>
<center>
	<h1>Fake Street Realty</h1>
	<h3>Update Property</h3>

	<body>



		<form action="updateproperty.php" method=post onsubmit="validateSubmission()">

			<?php

            $gcid = $_GET['cid'];
            $gaid = $_GET['aid'];
            $gaddress = $_GET['address'];

            if (isset($_COOKIE["username"])) {
	            $username = $_COOKIE["username"];
	            $password = $_COOKIE["password"];
	            $conn = new mysqli("vconroy.cs.uleth.ca", $username, $password, $username);
	            if ($mysqli->connect_errno) {
		            echo "Connection Issue!";
		            exit;
	            }
	            $sql = "SELECT * FROM PROPERTY WHERE a_id = '$gaid' AND c_id = '$gcid' AND address = '$gaddress';";
	            if ($conn->query($sql)) {
		            $result = $conn->query($sql);
		            $row = $result->fetch_assoc();
		            $old_askingprice = $row['asking_price'];
		            $old_saleprice = $row['sale_price'];
		            $old_const_date = $row['const_date'];
		            $old_bedroom = $row['bedroom'];
		            $old_bath = $row['bathroom'];
		            $old_squarefoot = $row['square_foot'];
		            $old_sold = $row['sold'];

	            }

	            $sql = "SELECT id, name FROM CLIENT, PERSON WHERE id = c_id;";
	            echo "Select a Client <select name='cid' id='cid' value = '$gcid'>";

	            if ($conn->query($sql)) {
		            $result = $conn->query($sql);
		            foreach ($result as $data) {
			            echo "<option value='{$data['id']}'";
			            if ($data['id'] == $gcid) {
				            echo "selected";
			            }
			            echo ">{$data['name']}</option>";
		            }
		            echo "</select><br><br>";

	            }

	            $sql = "SELECT id, name FROM AGENT, PERSON WHERE id = a_id;";
	            echo "Select a Agent <select name='aid' id='aid'>";

	            if ($conn->query($sql)) {
		            $result = $conn->query($sql);
		            foreach ($result as $data) {
			            echo "<option value='{$data['id']}'";
			            if ($data['id'] == $gaid) {
				            echo "selected";
			            }
			            echo ">{$data['name']}</option>";
		            }
		            echo "</select><br><br>";

	            } else {
		            $err = $conn->errno;
		            echo "<p>MySQL error code $err </p>";
	            }

            } else {
	            echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
            }
            if (isset($conn)) {
	            $conn = null;
            }

            echo "
							Address: <input type=text name='address' size=20 value = '$gaddress' required required><br><br>
							Asking Price: $<input type=number name='askingprice' value = '$old_askingprice' size=20 min = '0' required><br><br>
							<div = 'soldBox'>
								<input type='checkbox' id='sold' name='sold' ";
            if ($old_sold) {
	            echo "checked";
            }
            echo " onclick='promptSold(this)''>
									<label for='sold'>Sold</label><br>


								Sale Price: $<input type=number name='saleprice' id = 'saleprice' value = '$old_saleprice' size=20 min = '0'><br><br>

							Squarefootage: <input type=number name='sqrft'value = '$old_squarefoot' size=20 min = '0' required>
								<label>sq. ft.</label><br><br>
							Number of Beds: <input type=number name='bedrooms' value = '$old_bedroom'size=20 min = '0' required><br><br>
							Number of Baths: <input type=number name='bathrooms' value = '$old_bath' size=20 min = '0' required><br><br>
							Date constructed: <input type=date name='constdate' size=20 value = '$old_const_date' required><br><br>


							<input type=hidden name='gaddress' size=20 value = '$gaddress' required required>
							<input type=hidden name='gaid' size=20 value = '$gaid' required required>
							<input type=hidden name='gcid' size=20 value = '$gcid' required required>


							<button type=submit name='submit'>Submit</button>
							</form>"
            	;

            ?>

			<br><button onclick='history.back()'>Back</button>

	</body>
</center>

</html>