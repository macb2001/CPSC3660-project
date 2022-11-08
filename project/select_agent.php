<html>
<head>
  <title>Fake Street Realty</title>
</head>
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

    $sql = "SELECT a_id, name, dob, address, phone, commission FROM AGENT, PERSON
      WHERE a_id = id;";

    if($conn->query($sql)) {
      $result = $conn->query($sql);
	     echo "
        <table border='1'>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Commission</th>
          </tr>
       ";

       foreach ($result as $data) {
         echo "
          <tr>
            <td>{$data['a_id']}</td>
            <td>{$data['name']}</td>
            <td>{$data['dob']}</td>
            <td>{$data['address']}</td>
            <td>{$data['phone']}</td>
            <td>{$data['commission']}</td>
            <td><a href='update_agent.php?id={$data['a_id']}'>Update</a></td>
            <td><a href='delete_agent.php?id={$data['a_id']}'>Delete</a></td>
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

</html>
