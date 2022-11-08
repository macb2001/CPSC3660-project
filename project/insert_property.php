<html>
	<head><title>Fake Street Realty</title></head>
	<body>
		<h2>Add a Property</h2>
		<form action="insertproperty.php" method=post>
		Address: <input type=text name="address" size=20><br><br>
		Asking: <input type=number name="askingprice" size=20><br><br>
		Is sold?: <input type="checkbox" id="sold" name="sold" value="True"><br><br>
		<input type=submit name="submit" value="Insert"></form>
	</body>
</html>
