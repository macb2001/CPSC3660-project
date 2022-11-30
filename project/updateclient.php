<html>
<head>
  <title>Updating Client</title>
</head>
<style>
  button {height:50px;width:300px;font-size: 20px; margin: 10px;color: black ;background-color: #1F70C1;}
  body {background-color: #f5f5dc;}
</style>
<body>
<?php
if (isset($_COOKIE["username"])) {

  $id = $_POST['id'];
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

  if (isset($_POST['agent'])) {
    $comm = $_POST['commission'];
    $agSql = "INSERT INTO AGENT (a_id, commission)VALUES ('$id', '$comm');";
    if ($conn->query($agSql)) {
      echo "Agent record added successfully.<br />";
    } else {
      $err = $conn->errno;
      echo "<p>MySQL error code $err </p>";
    }
  }

  $sql = "UPDATE PERSON
    SET name = '$name', dob = '$dob', address = '$address', phone = '$phone'
    WHERE id = '$id';";
    if($conn->query($sql)) {
      echo "<p>Record updated successfully.\n</p>";
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
