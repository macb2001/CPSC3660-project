<html>
	<head><title>Fake Street Realty</title></head>
	<body>
		<h2>Add a Property</h2>
		<form action="insertproperty.php" method=post>
		Address: <input type=text name="address" size=20><br><br>
		Asking Price: <input type=number name="askingprice" size=20><br><br>
		Is sold?: <input type="checkbox" name="sold" value="True"><br><br>
		Sale Price: <input type=number name="saleprice" size=20><br><br>
		Squarefootage: <input type=number name="saleprice" size=20><br><br>
		Number of Beds: <input type=number name="bedrooms" size=20><br><br>
		Number of Baths: <input type=number name="bathrooms" size=20><br><br>
		Date constructed: <input type=date name="constdate" size=20><br><br>
		<input type=submit name="submit" value="Insert"></form>
	</body>
</html>
