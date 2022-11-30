<html>
	<head>
    <title>Fake Street Realty</title>
		<!-- Javascript method to open commission dialog if box checked -->
		<script type = "text/javascript">
      function promptCommission(cbox) {
				var input = document.getElementById("commissionPrompt");
				if (agent.checked) {
					commission.setAttribute("required", "");
					input.style.display = "block";
				} else {
					if (commission.hasAttribute("required")) {
						commission.removeAttribute("required");
					}
					input.style.display = "none";
				}
      }
    </script>

		<!-- If agent is checked, commission field is required -->
    <script type = "text/javascript">
      function validateSubmission() {
				if (document.getElementById("agent").checked && commission.hasAttribute("required")) {
					commission.removeAttribute("required");
				}
      }
		</script>
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

		$agCheckSql = "SELECT a_id FROM AGENT WHERE a_id = '$id';";
    $agCheck = $conn->query($agCheckSql);

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
          <input type = tel name = 'phone' id = 'phone' size = '10' maxlength = '11' minlength = '7' value = '$phone'><br><br>";

					if ($agCheck->num_rows == 0) {
						echo "
						<label for='agent'>Make this client an agent?</label>
						<input type='checkbox' id='agent' name='agent'
						onclick='promptCommission(this)'><br />";
					} else {
						echo "This client is also an agent, so updating their information
						here will update their information in the Agent table as well.<br />";
					}
			echo "
			<!-- agent commission input -->
			<div id = 'commissionPrompt' style = 'display: none'>
				<label for='commission'>Commission:</label>
					<input type = 'number' min = '0' max = '100' id = 'commission'
						name = 'commission' size = '10'>
						<label>%</label><br><br>
				</div>
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
