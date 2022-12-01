<html>

<head>
    <title>Fake Street Realty</title>
    <script type="text/javascript">
        function promptSold(cbox) {
            var input = document.getElementById("salepricePrompt");
            if (sold.checked) {
                saleprice.setAttribute("required", "");
                input.style.display = "block";
            } else {
                if (saleprice.hasAttribute("required")) {
                    saleprice.removeAttribute("required");
                }
                input.style.display = "none";
            }
        }
    </script>
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
<center>
    <h1>Fake Street Realty</h1>
    <h3>Insert Property</h3>

    <body>


        <form action="insertproperty.php" method=post>

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

                }

                $sql = "SELECT id, name FROM AGENT, PERSON WHERE id = a_id;";
                echo "Select a Agent <select name='aid' id='aid' required>";

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

            Address: <input type=text name="address" size=20 required required><br><br>
            Asking Price: $<input type=number name="askingprice" size=20 min="0" required><br><br>

            <div="soldBox">
                <input type="checkbox" id="sold" name="sold" onclick="promptSold(this)">
                <label for="sold">Sold</label><br>
                </div><br>
                <div id="salepricePrompt" style="display: none">
                    Sale Price: $<input type=number name="saleprice" id="saleprice" size=20 min="0"><br><br>
                </div>

                Squarefootage: <input type=number name="sqrft" size=20 min="0" required>
                <label>sq. ft.</label><br><br>
                Number of Beds: <input type=number name="bedrooms" size=20 min="0" required><br><br>
                Number of Baths: <input type=number name="bathrooms" size=20 min="0" required><br><br>
                Date constructed: <input type=date name="constdate" size=20 required><br><br>

                <button type=submit>Submit</button>
        </form>
        <br>
        <button onclick='history.back()'>Back</button>
    </body>
</center>

</html>
