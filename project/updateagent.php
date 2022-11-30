<html>
<head>
  <title>Updating Agent</title>
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
  $comm = $_POST['commission'];

  $username = $_COOKIE["username"];
  $password = $_COOKIE["password"];

  $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
  if($mysqli->connect_errno) {
    echo "Connection Issue!";
    exit;
  }

  if (isset($_POST['client'])) {
    $cliSql = "INSERT INTO CLIENT (c_id)VALUES ('$id');";
    if ($conn->query($cliSql)) {
      echo "Client record added successfully.<br />";
    } else {
      $err = $conn->errno;
      echo "<p>MySQL error code $err </p>";
    }
  }

  $sql = "UPDATE PERSON
    SET name = '$name', dob = '$dob', address = '$address', phone = '$phone'
    WHERE id = '$id';";
    if($conn->query($sql)) {
      echo "<p>Person record updated successfully.\n</p>";
    } else {
    $err = $conn->errno;
    echo "<p>MySQL error code $err </p>";
  }
  $sql = "UPDATE AGENT SET commission = '$comm' WHERE a_id = '$id';";
    if($conn->query($sql)) {
      echo "<p>Record updated successfully.\n</p>";
      echo "<a href='main.php'><button>back</button></a>";
    } else {
      $err = $conn->errno;
      if ($err == 1064) {
        echo "<p>There is an issue with your input.
        Make sure you don't have any apostrophes or other control characters.</p>";
      } else {
        echo "<p>MySQL error code $err </p>";
      }
      echo "<button onclick='history.back()'>Back</button>";
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
