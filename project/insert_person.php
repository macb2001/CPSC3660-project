<html>
	<head>
    <title>Fake Street Realty</title>
    <script type = "text/javascript">
      function promptCommission(cbox) {
        var input = document.getElementById("commissionPrompt");
        input.style.display = agent.checked ? "block" : "none";
      }
    </script>
    <script type = "text/javascript">
      function validateChecks() {
        if (!(document.getElementById("client").checked || document.getElementById("agent").checked)) {
          alert("At least one checkbox must be checked!");
          return false;
        } else {
          return true;
        }
      }
    </script>
  </head>
  <h1>Insert Client/Agent</h1>
	<body>

		<form action="insertperson.php" method=post onsubmit="return validateChecks()">
      <div id = attributes>
        <label for="name">Name:</label>
          <input type = text name = "name" id = "name" size = "10" required><br><br>
        <label for="dob">Date of Birth:</label>
          <input type = date name = "dob" id = "dob" size = "10"><br><br>
        <label for="address">Address:</label>
          <input type = text name = "address" id = "address" size = "10"><br><br>
        <label for="phone">Phone Number:</label>
          <input type = tel name = "phone" id = "phone" size = "10"  pattern="[0-9]{1}[0-9]{3}[0-9]{3}[0-9]{4}"><br><br>
      </div>

      <div = "clientAgentBox">
        <input type="checkbox" id="client" name="client" value="client">
          <label for="client">Client</label><br>
        <input type="checkbox" id="agent" name="agent" value="agent" onclick="promptCommission(this)">
          <label for="agent">Agent</label><br>

        <div id = "commissionPrompt" style = "display: none">
          <label for="commission">Commission:</label>
            <input type = "number" min = "0" max = "100" id = "commission" name = "commission" size = "10" required><br><br>
        </div>
      </div>

      <div id = "submit">
		     <input type = submit value = "Submit" name="submit">
      </div>
		</form>

	</body>
</html>
