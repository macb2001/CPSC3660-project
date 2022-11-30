<html>
<head>
  <title>Deleting Agent</title>
</head>
<style>
  button {height:50px;width:300px;font-size: 20px; margin: 10px;color: black ;background-color: #1F70C1;}
  body {background-color: #f5f5dc;}
</style>
<body>
<?php
if (isset($_COOKIE["username"])) {

  $id = $_POST['id'];

  $choice = 1;
  if (isset($_POST['choice'])) {
    if($_POST['choice'] == 'both') {
      $choice = 2;
    } else {
      $choice = 0;
    }
  }

  $username = $_COOKIE["username"];
  $password = $_COOKIE["password"];

  $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
  if($mysqli->connect_errno) {
    echo "Connection Issue!";
    exit;
  }

  $sql = "DELETE FROM AGENT WHERE a_id = '$id';";
    if($conn->query($sql)) {
      echo "<p>Agent record deleted successfully.</p>";
    } else {
    $err = $conn->errno;
    echo "<p>MySQL error code $err </p>";
  }
  if ($choice > 0) {
    if ($choice == 2) {
      $sql = "DELETE FROM CLIENT WHERE c_id = '$id';";
        if($conn->query($sql)) {
          echo "<p>Client record deleted successfully.</p>";
        } else {
        $err = $conn->errno;
        echo "<p>MySQL error code $err </p>";
      }
    }
    $sql = "DELETE FROM PERSON WHERE id = '$id';";
      if($conn->query($sql)) {
        echo "<p>Person record deleted successfully.</p>";
      } else {
      $err = $conn->errno;
      echo "<p>MySQL error code $err </p>";
    }
  }
  echo "<a href='main.php'>back</a>";
} else {
  echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
}

if(isset($conn)) {
  $conn = null;
}
?>
</body>
</html>
