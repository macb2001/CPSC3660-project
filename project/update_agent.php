<html>
	<head>
    <title>Fake Street Realty</title>
	  </head>
	<style>
    button {height:50px;width:300px;font-size: 20px; margin: 10px;color: black ;background-color: #1F70C1;}
    body {background-color: #f5f5dc;}
  </style>
	<center>
	<body>
		<h1>Update Agent</h1>
<?php
if (isset($_COOKIE["username"])) {
	$username = $_COOKIE["username"];
	$password = $_COOKIE["password"];

	$conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
	if($mysqli->connect_errno) {
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

	if($conn->query($sql)) {
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
	<!-- Attribute inputs -->
		<form action='updateagent.php' method=post>
      <div id = attributes>
			<input type = hidden name = 'id' id = 'id' value = '$id'>
        <label for='name'>Name:</label>
          <input type = text name = 'name' id = 'name' size = '10' value = '$name' required>
						<label>*</label><br><br>
        <label for='dob'>Date of Birth:</label>
          <input type = date name = 'dob' id = 'dob' size = '10' value = '$dob'><br><br>
        <label for='address'>Address:</label>
          <input type = text name = 'address' id = 'address' size = '10' value = '$address'><br><br>
        <label for='phone'>Phone Number:</label>
          <input type = tel name = 'phone' id = 'phone' size = '10' maxlength = '11' minlength = '7' value = '$phone'><br><br>
        <label for='commission'>Commission:</label>
          <input type = 'number' min = '0' max = '100' id = 'commission' name = 'commission' size = '10' value = '$comm'>
						<label>%</label><br><br>
        </div>
      </div>";

			if ($cliCheck->num_rows == 0) {
				echo "
				<label for='client'>Make this agent a client?</label>
				<input type='checkbox' id='client' name='client'><br />";
			} else {
				echo "This agent is also a client, so updating their information
				here will update their information in the Client table as well.<br />";
			}
      echo "<!-- submission button -->
      <div id = 'submit'>
		     <input type = submit value = 'Submit' name='submit'>
      </div>
		</form>
	";
	} else {
	$err = $conn->errno;
	echo "<p>MySQL error code $err </p>";
	}
}  else {
	echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
}
?>
	</body>
</center>
</html>
