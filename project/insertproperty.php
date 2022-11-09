<html>
<head>
  <title>Inserting Person</title>
</head>
<body>
<?php
if (isset($_COOKIE["username"])) {

  $cid = $_POST['cid'];
  $aid = $_POST['aid'];
  $address = $_POST['address'];
  $askingprice = $_POST['askingprice'];
  $sold = $_POST['sold'];
  $saleprice = $_POST['saleprice'];
  $sqrft = $_POST['sqrft'];
  $bedrooms = $_POST['bedrooms'];
  $bathrooms = $_POST['bathrooms'];
  $constdate = $_POST['constdate'];

  $username = $_COOKIE["username"];
  $password = $_COOKIE["password"];

  $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
  if($mysqli->connect_errno) {
    echo "Connection Issue!";
    exit;
  }

  $sql = "INSERT INTO PROPERTY
    VALUES ('$address', '$aid', '$cid', '$sqrft', '$askingprice', '$sold',
    '$constdate', '$bedrooms', '$saleprice', '$bthrooms');";
    if($conn->query($sql)) {
      $id = $conn->insert_id;

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
