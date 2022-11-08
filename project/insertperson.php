<html>
<head>
  <title>Inserting Person</title>
</head>
<body>
<?php
if (isset($_COOKIE["username"])) {

  $name = $_POST['name'];
  $dob = $_POST['dob'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];

  $username = $_COOKIE["username"];
  $password = $_COOKIE["password"];

  $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
  if($mysqli->connect_errno) {
    echo "Connection Issue!";
    exit;
  }

  $sql = "INSERT INTO PERSON (name, dob, address, phone)
    VALUES ('$name', '$dob', '$address', '$phone');";
    if($conn->query($sql)) {
      $id = $conn->insert_id;

      if (isset($_POST['client'])) {
        $sql = "INSERT INTO CLIENT VALUES ('$id');";
        $conn->query($sql);
      }
      if (isset($_POST['agent'])) {
        $comm = $_POST['commission'];
        $sql = "INSERT INTO AGENT VALUES ('$id', '$comm');";
        $conn->query($sql);
      }
      echo "<p>Record added successfully.\n</p>";
      echo "<a href='main.php'>back</a>";
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
