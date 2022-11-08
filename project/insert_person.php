<html>
	<head>
    <title>Fake Street Realty</title>
    <script type = "text/javascript">
      function promptCommission(cbox) {
        var input = document.getElementById("commissionPrompt");
        input.style.display = agent.checked ? "block" : "none";
      }
    </script>
  </head>
  <h1>Insert Client/Agent</h1>
	<body>

		<form action="insertagent.php" method=post>

      <div = "clientAgentBox">
        <input type="checkbox" id="client" name="client" value="client">
          <label for="client">Client</label><br>
        <input type="checkbox" id="agent" name="agent" value="agent" onclick="promptCommission(this)">
          <label for="agent">Agent</label><br>
      </div>

      <div id = "commissionPrompt" style = "display: none">
        Commission Percentage:
        <input type = "number" min = "0" max = "100" name = "commission" size = "8">
      </div>




			<input type=submit name="submit" value="Add Section">
		</form>

	</body>
</html>
