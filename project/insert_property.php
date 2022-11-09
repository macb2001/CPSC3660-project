<html>
	<head>
		<title>Fake Street Realty</title>
		<script type = "text/javascript">
      function promptSold(cbox) {
        var input = document.getElementById("salepricePrompt");
        input.style.display = sold.checked ? "block" : "none";
      }
    </script>
		<script type = "text/javascript">
				if (document.getElementById("sold").checked) {
					saleprice.setAttribute("required", "");
				} else {
					saleprice.removeAttribute("required");
				}

      }
    </script>
	</head>

	<body>
		<h2>Add a Property</h2>
		<form action="insertproperty.php" method=post onsubmit="validateSubmission()">
			Address: <input type=text name="address" size=20 required required><br><br>
			Asking Price: $<input type=number name="askingprice" size=20 min = "0" required><br><br>

			<div = "soldBox">
				<input type="checkbox" id="sold" name="sold" onclick="promptSold(this)">
					<label for="sold">Sold</label><br>
			</div><br>
			<div id = "salepricePrompt" style = "display: none">
				Sale Price: $<input type=number name="saleprice" id = "saleprice" size=20 min = "0"><br><br>
			</div>

			Squarefootage: <input type=number name="saleprice" size=20 min = "0" required>
				<label>sq. ft.</label><br><br>
			Number of Beds: <input type=number name="bedrooms" size=20 min = "0" required><br><br>
			Number of Baths: <input type=number name="bathrooms" size=20 min = "0" required><br><br>
			Date constructed: <input type=date name="constdate" size=20 required><br><br>

			<input type=submit name="submit" value="Insert"></form>

	</body>
</html>
