<html>

<head>
  <title>Fake Street Realty</title>
</head>

<style>
  input {
    height: 50px;
    width: 300px;
    font-size: 20px;
    margin: 10px;
    color: black;
    background-color: #1F70C1;
  }

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

<center>
  <h1>Fake Street Realty</h1>
  <h3>List Properties by Client</h3>

  <body>
    <form action="clientproperties.php" method=post>
      <?php
            if (isset($_COOKIE["username"])) {
              $username = $_COOKIE["username"];
              $password = $_COOKIE["password"];
              $conn = new mysqli("vconroy.cs.uleth.ca", $username, $password, $username);
              if ($mysqli->connect_errno) {
                echo "Connection Issue!";
                exit;
              }
              $sql = "SELECT id, name FROM CLIENT, PERSON WHERE id = c_id;";
              echo "Select a Client <select name='cid' id='cid' required>";

              if ($conn->query($sql)) {
                $result = $conn->query($sql);
                foreach ($result as $data) {
                  echo "<option value='{$data['id']}'>{$data['name']}</option>";
                }
                echo "</select><br><br>";
              } else {
                $err = $conn->errno;
                echo "<p>MySQL error code $err </p>";
              }
            } else {
              echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
            }

            if (isset($conn)) {
              $conn = null;
            }
            ?>
      <input type=submit name="submit" value="List">
    </form>
    <button onclick='history.back()'>Back</button>

  </body>
</center>

</html>