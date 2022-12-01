<html>

<head>
  <title>Updating Client</title>
</head>
<style>
  button {
    height: 50px;
    width: 300px;
    font-size: 20px;
    margin: 10px;
    color: black;
    background-color: #1F70C1;
  }

  body {
    background-color: #f5f5dc;
  }
</style>

<body>
  <?php
    if (isset($_COOKIE["username"])) {
      $aid = $_POST['aid'];
      $cid = $_POST['cid'];
      $square_foot = $_POST['sqrft'];
      $askingprice = $_POST['askingprice'];
      $sold = $_POST['sold'];
      $const_date = $_POST['constdate'];
      $bedroom = $_POST['bedrooms'];
      $bathroom = $_POST['bathrooms'];
      $saleprice = $_POST['saleprice'];
      $address = $_POST['address'];

      $gaid = $_POST['gaid'];
      $gcid = $_POST['gcid'];
      $gaddress = $_POST['gaddress'];

      $username = $_COOKIE["username"];
      $password = $_COOKIE["password"];

      $conn = new mysqli("vconroy.cs.uleth.ca", $username, $password, $username);
      if ($mysqli->connect_errno) {
        echo "Connection Issue!";
        exit;
      }

      $sql = "UPDATE PROPERTY
    SET a_id = '$aid',
        c_id = '$cid',
        address = '$address',
        square_foot = '$square_foot',
        asking_price = '$askingprice',
        sold = '$sold',
        const_date = '$const_date',
        bedroom = '$bedroom',
        sale_price = '$saleprice',
        bathroom = '$bathroom'
    WHERE a_id = '$gaid'
    AND c_id = '$gcid'
    AND address = '$gaddress';";

      if ($conn->query($sql)) {
        echo "<p>Record updated successfully.\n</p>";
        echo "<a href='main.php'><button>back</button></a>";
      } else {
        $err = $conn->errno;
        if ($err == 1064) {
          echo "<p>There is an issue with your input.
        Make sure you don't have any apostrophes or other control characters.</p>";
        } else if ($err == 1062) {
          echo "<p>That property already exists.</p>";
        } else {
          echo "<p>MySQL error code $err </p>";
        }
        echo "<button onclick='history.back()'>Back</button>";
      }

    } else {
      echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
    }

    if (isset($conn)) {
      $conn = null;
    }
    ?>
</body>

</html>