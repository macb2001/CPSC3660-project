<html>
	<head>
		<title>Fake Street Realty</title>
	</head>
	<body>
		<?php
		if (isset($_COOKIE["username"])) {
			$username = $_COOKIE["username"];
			$password = $_COOKIE["password"];

			$aid = $_GET['aid'];
			$cid = $_GET['cid'];
			$address = $_GET['address'];

			$conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
			if($mysqli->connect_errno) {
				echo "Connection Issue!";
				exit;
			}

				$sql = "DELETE FROM PROPERTY WHERE a_id = '$aid' and c_id = '$cid' and
				address = '$address';";

				echo "<p>record deleted</p>";
				echo "<a href='main.php'>Back</a>";
				if($conn->query($sql)) {
					$id = $conn->insert_id;

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
</html>
