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
	<h3>Delete Agent</h3>

	<body>
		<?php
        if (isset($_COOKIE["username"])) {
	        $username = $_COOKIE["username"];
	        $password = $_COOKIE["password"];

	        $conn = new mysqli("vconroy.cs.uleth.ca", $username, $password, $username);
	        if ($mysqli->connect_errno) {
		        echo "Connection Issue!";
		        exit;
	        }

	        $name = '';
	        $dob = NULL;
	        $address = '';
	        $phone = '';
	        $comm = 0;
	        $id = $_GET['id'];
	        $sql = "SELECT a_id, name, dob, address, phone, commission FROM AGENT, PERSON
		WHERE a_id = id
		AND a_id = '$id';";

	        if ($conn->query($sql)) {
		        $result = $conn->query($sql);

		        $row = $result->fetch_assoc();

		        $name = $row['name'];
		        $dob = $row['dob'];
		        $address = $row['address'];
		        $phone = $row['phone'];
		        $comm = $row['commission'];

		        $cliCheckSql = "SELECT c_id FROM CLIENT WHERE c_id = '$id';";
		        $cliCheck = $conn->query($cliCheckSql);

		        echo "
		<form action='deleteagent.php' method=post>
      <div id = attributes>
			<input type = hidden name = 'id' id = 'id' value = '$id'>
        <label for='name'>Name:</label>
          <input type = text name = 'name' id = 'name' size = '10' value = '$name' disabled>
						<br><br>
        <label for='dob'>Date of Birth:</label>
          <input type = date name = 'dob' id = 'dob' size = '10' value = '$dob' disabled><br><br>
        <label for='address'>Address:</label>
          <input type = text name = 'address' id = 'address' size = '10' value = '$address' disabled><br><br>
        <label for='phone'>Phone Number:</label>
          <input type = tel name = 'phone' id = 'phone' size = '10' value = '$phone' disabled><br><br>
        <label for='commission'>Commission:</label>
          <input type = 'number' id = 'commission' name = 'commission' size = '10' value = '$comm' disabled>
						<label>%</label><br><br>";
		        if ($cliCheck->num_rows > 0) {
			        echo "
      This agent is also listed as a client.<br />
      Do you want to remove this agent from the list of clients as well?<br />
          <input type='radio' id='agent' name='choice' value='agent' required>
        <label for='agent'>Delete from Agents only</label><br>
          <input type='radio' id='both' name='choice' value='both' required>
        <label for='both'>Delete from both</label><br>";
		        }
		        echo "
        </div>
      </div>

      <!-- submission button -->
      <div id = 'submit'>
		     <button type = submit>Confirm Delete</button>
      </div>
		</form>
		<button onclick='history.back()'>Back</button>
	";
	        } else {
		        $err = $conn->errno;
		        echo "<p>MySQL error code $err </p>";
	        }
        } else {
	        echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
        }
        ?>
	</body>
</center>

</html>