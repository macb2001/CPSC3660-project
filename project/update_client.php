<html>
	<head>
    <title>Fake Street Realty</title>
  </head>

	<body>
		<h1>Update Client</h1>
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
	$sql = "SELECT id, name, dob, address, phone FROM PERSON
		WHERE id = '$id';";

	if($conn->query($sql)) {
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		$name = $row['name'];
		$dob = $row['dob'];
		$address = $row['address'];
		$phone = $row['phone'];

  echo "
	<!-- Attribute inputs -->
		<form action='updateclient.php' method=post>
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
        </div>
      </div>

      <!-- submission button -->
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
</html>
