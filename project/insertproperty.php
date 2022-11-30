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
    '$constdate', '$bedrooms', '$saleprice', '$bathrooms');";
    if($conn->query($sql)) {
      $id = $conn->insert_id;

      echo "<p>Record added successfully.\n</p>";
      echo "<a href='main.php'><button>back</button></a>";
    } else {
    $err = $conn->errno;
    if ($err == 1064) {
      echo "<p>There is an issue with your input.
      Make sure you don't have any apostrophes or other control characters.</p>";
    } else if ($err == 1062){
        echo "<p>That property already exists.</p>";
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
