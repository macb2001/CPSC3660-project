<html>
<head>
  <title>Inserting Person</title>
</head>
<style>
  button {height:50px;width:300px;font-size: 20px; margin: 10px;color: black ;background-color: #1F70C1;}
  body {background-color: #f5f5dc;}
</style>
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
