<html>
	<head>
		<title>Fake Street Realty</title>
	</head>

	<center>
		<h1>List Properties By Agent</h1>
		<body>
    <form action="agentproperties.php" method=post>
    	<?php
        if (isset($_COOKIE["username"])) {
          $username = $_COOKIE["username"];
          $password = $_COOKIE["password"];
          $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
        if($mysqli->connect_errno) {
          echo "Connection Issue!";
          exit;
        }
        $sql = "SELECT id, name FROM AGENT, PERSON WHERE id = a_id;";
        echo "Select an Agent <select name='aid' id='aid'>";

        if($conn->query($sql)) {
          $result = $conn->query($sql);
          foreach ($result as $data) {
            echo "<option value='{$data['id']}'>{$data['name']}</option>";
          }
          echo "</select><br><br>";
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
  <input type=submit name="submit" value="List"></form>

</body>
</center>
</html>