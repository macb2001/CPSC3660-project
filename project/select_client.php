<html>
<head>
  <title>Fake Street Realty</title>
</head>
<style>
  button {height:50px;width:300px;font-size: 20px; margin: 10px;color: black ;background-color: #1F70C1;}
  body {background-color: #f5f5dc;}
</style>
<center>
  <h1>Fake Street Realty</h1>
  <h3>List Clients</h3>
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

    $sql = "SELECT c_id, name, dob, address, phone FROM CLIENT, PERSON
      WHERE c_id = id;";

    if($conn->query($sql)) {
      $result = $conn->query($sql);
	     echo "
        <table border='6'>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Address</th>
            <th>Phone Number</th>
          </tr>
       ";

       foreach ($result as $data) {
         echo "
          <tr>
            <td>{$data['c_id']}</td>
            <td>{$data['name']}</td>
            <td>{$data['dob']}</td>
            <td>{$data['address']}</td>
            <td>{$data['phone']}</td>
            <td><a href='update_client.php?id={$data['c_id']}'>Update</a></td>
            <td><a href='delete_client.php?id={$data['c_id']}'>Delete</a></td>
          </tr>
         ";
       }

       echo "</table><br /><br />\n";
       echo "<button onclick='window.location.href=\"main.php\";'>Back</button>";

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
