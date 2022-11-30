<html>
	<head>
    <title>Fake Street Realty</title>
    <!-- Javascript method to open commission dialog if box checked -->
    <script type = "text/javascript">
      function promptCommission(cbox) {
        var input = document.getElementById("commissionPrompt");
				if (agent.checked) {
					commission.setAttribute("required", "");
					input.style.display = "block";
				} else {
					if (commission.hasAttribute("required")) {
						commission.removeAttribute("required");
					}
					input.style.display = "none";
				}
      }
    </script>

    <!-- Javscript method to check if at least one box is checked upon submission -->
		<!-- If agent is checked, commission field is required -->
    <script type = "text/javascript">
      function validateSubmission() {
        if (!(document.getElementById("client").checked || document.getElementById("agent").checked)) {
          alert("At least one checkbox must be checked!");
          return false;
        }
        return true;
      }
    </script>
  </head>
	<style>
    button {height:50px;width:300px;font-size: 20px; margin: 10px;color: black ;background-color: #1F70C1;}
    body {background-color: #f5f5dc;}
  </style>
	<center>
		<h1>Fake Street Realty</h1>
	  <h3>Insert Client/Agent</h3>
		<body>
	    <!-- Attribute inputs -->
			<form action="insertperson.php" method=post onsubmit="return validateSubmission()">
	      <div id = attributes>
	        <label for="name">Name:</label>
	          <input type = text name = "name" id = "name" size = "10" required>
							<label>*</label><br><br>
	        <label for="dob">Date of Birth:</label>
	          <input type = date name = "dob" id = "dob" size = "10" required><br><br>
	        <label for="address">Address:</label>
	          <input type = text name = "address" id = "address" size = "10" required><br><br>
	        <label for="phone">Phone Number:</label>
	          <input type = tel name = "phone" id = "phone" size = "10" maxlength = "11" minlength = "7" required><br><br>
	      </div>

	      <!-- Client/agent check boxes -->
	      <div = "clientAgentBox">
	        <input type="checkbox" id="client" name="client" value="client">
	          <label for="client">Client</label><br>
	        <input type="checkbox" id="agent" name="agent" value="agent" onclick="promptCommission(this)">
	          <label for="agent">Agent</label><br>

	        <!-- agent commission input -->
	        <div id = "commissionPrompt" style = "display: none">
	          <label for="commission">Commission:</label>
	            <input type = "number" min = "0" max = "100" id = "commission" name = "commission" size = "10">
								<label>%</label><br><br>
	        </div>
	      </div>

	      <!-- submissio button -->
	      <div id = "submit">
			     <button type = submit value = "Submit"> submit </button>
				 </form>
	      </div>
<<<<<<< HEAD
			</form>
			<button onclick='window.location.href="main.php"'>Back</button>
=======

>>>>>>> c144c6ce55116590c3e84aabef2bb5b6fd727d4b

		</body>
	</center>
</html>
